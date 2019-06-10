<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Ga_model');

    }
	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('ga_dashboard');
        $this->load->view('templates/footer');

        
        
    }
    
    public function input_barang()
	{
        $data['barang'] = $this->Ga_model->getAllData('tbl_ga_barang')->result_array();
        $data['stok_barang'] = $this->Ga_model->getUnlocatedStock()->result_array();
    
        $this->load->view('templates/header');
        $this->load->view('ga_input_barang',$data);
        $this->load->view('templates/footer');
        $this->load->view('barang/input_barang_ajax');
    
        
    }

    public function input_barang_create(){

        $data['barang'] = $this->Ga_model->getAllData('tbl_ga_barang')->result_array();

        if($post = $this->input->post()){
            $post = $post['stok'];
            $stok = $this->Ga_model->generateID()->row();
         
            $data_stok = [
                'id_stok' => $stok->id,
                'tanggal_masuk' => $post['tanggal_masuk'],
                'jam' => $post['jam']
            ];
            if(!$this->Ga_model->InsertDataJson("tbl_ga_stok",$data_stok)){
                echo "gagal insert stok";die;
            }
            for ($i=0; $i< count($post['id_barang']); $i++){
                $detail_stok = [
                    'id_stok' => $stok->id,
                    'id_barang' => $post['id_barang'][$i],
                    'jumlah' => $post['jumlah'][$i]
                ];

                if(!$this->Ga_model->InsertDataJson("tbl_ga_stok_detail",$detail_stok)){
                    echo "gagal insert detail stok";die;
                }

            }
         
        }
        $this->load->view('templates/header');
        $this->load->view('ga_input_barang_create', $data);
        $this->load->view('templates/footer');
        $this->load->view('barang/input_stok_ajax');
    }   

    public function input_barang_create_part(){

        $data['barang'] = $this->Ga_model->getAllData('tbl_ga_barang')->result_array();
        $this->load->view('ga_input_barang_create_part', $data);
    } 

    
    public function generate_lokasi_penyimpanan(){

        $types = ['FM', 'SM'];
        $generation = 10;
        foreach($types as $type){

            $stok = $this->Ga_model->getUnlocatedStock2($type)->result_array();
            
            if($stok){
                $availableFmRack = $this->Ga_model->getNewRack($type)->result_array();
                $availableFmRack2 = $this->Ga_model->getAvailRack($type)->result_array();
                $availableFmRack3 = [];
                $population = [];
               
                $all_racks = [];
                foreach($availableFmRack2 as $rack){
                    if($rack['jumlah']-$rack['jumlah_keluar']==0 && !in_array($rack['id_rak'], $all_racks)) {
                       
                        $availableFmRack3[] = [ 
                            'id_rak' => $rack['id_rak'],
                            'panajang' => $rack['panjang'],
                            'lebar' => $rack['lebar'],
                            'tinggi' => $rack['tinggi'],
                            'zona' => $rack['zona']
                        ];
                       
                    } 
                    $all_racks[] = $rack['id_rak'];
                }
                if($availableFmRack3)
                    array_push($availableFmRack,$availableFmRack3);   
              
                for($c=0;$c<$generation;$c++){
                   
                    //random raknya
                    $random_rack = $availableFmRack;
                    shuffle($random_rack);
                   
                    //masukkan barang ke rak
                    $temp_pupulation = [];
                    for($i=0;$i< count($stok);$i++){
                        $fm = $stok[$i];
                     
                        $rack_keys = [];
                       
                        foreach($random_rack as $key => $rack){
                          
                            $x = floor($rack['panjang']/$fm['panjang']);
                            $y = floor($rack['lebar']/$fm['lebar']);
                            $z = floor($rack['tinggi']/$fm['tinggi']);
        
                            if($y){
                                $total = $x*$y*$z;
                               
                                $fm['total']-=$total;
                               
                                $rack_keys[] = 
                                    [
                                     'key' =>   $key,
                                     'jumlah' => $fm['total'] >=0 ? $total : $total+$fm['total']
                                    ];
                                
                                if($fm['total']<=0){                          
                                break;
                                } 
                            
                            }     
                        }
                        $rack_choosen = [];
                        foreach($rack_keys as $key){
                            $rack_choosen[] = [
                                'ids' => $random_rack[$key['key']]['id_rak'],
                                'jumlah' => $key['jumlah']
                            ];
                            unset($random_rack[$key['key']]);
                        }
                        $temp_pupulation[] = [
                            'racks' => $rack_choosen,
                            'id_barang' => $fm['id_barang'],
                        ];
                      
                    }
                    $population[] = $temp_pupulation;
                    
                }

               var_dump($population);
             
            }
        }
        
        


        

        // if($stokSm){
        //     $availableSmRack = $this->Ga_model->getNewRack('SM')->result_array();
        //     $availableSmRack2 = $this->Ga_model->getAvailRack('SM')->result_array();
        //     $availableSmRack3 = [];

          
        //     $all_racks = [];
        //     foreach($availableSmRack2 as $rack){
        //         if($rack['jumlah']-$rack['jumlah_keluar']==0 && !in_array($rack['id_rak'], $all_racks)) {
        //             $availableSmRack3[] = [ 
        //                 'id_rak' => $rack['id_rak'],
        //                 'panajang' => $rack['panjang'],
        //                 'lebar' => $rack['lebar'],
        //                 'tinggi' => $rack['tinggi'],
        //                 'zona' => $rack['zona']
        //             ];       
        //         }
        //         $all_racks[] = $rack['id_rak'];
        //     }  
        //     array_push($availableSmRack,$availableSmRack3);

     
        // }

    }

    public function input_barang_process()
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));

        $stok = $this->Ga_model->generateID()->result();
        $data_stok = [
            'id_stok' => $stok->id,
            'tanggal_masuk' => $data['tanggal_masuk'],
            'jam' => $data['jam']
        ];
        $insert = $this->Ga_model->InsertDataJson("tbl_ga_barang",$data_stok);
        if($insert){
            $detail_stok = [
                
            ];
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di tambah!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di tambah!"
            );
        }

        echo json_encode($response);
        
    }

    public function input_stok_process()
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));

        $insert = $this->Ga_model->InsertDataJson("tbl_ga_stok",$data);
        if($insert){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di tambah!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di tambah!"
            );
        }

        echo json_encode($response);
        
    }

    public function update_barang_process($id)
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));
        
        $update = $this->Ga_model->UpdateDataJson("tbl_ga_barang",$id,"id_barang",$data);
        if($update){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di update!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di update!"
            );
        }

        echo json_encode($response);
        
    }

    public function update_stok_process($id)
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));
        
        $update = $this->Ga_model->UpdateDataJson("tbl_ga_stok",$id,"id_stok",$data);
        if($update){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di update!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di update!"
            );
        }

        echo json_encode($response);
        
    }

    public function hapus_barang_process($id,$type)
	{
        header('Content-Type: application/json');
        
        if($type=='stok'){
            $table = 'tbl_ga_stok';
            $column = 'id_stok';
        }else{
            $table = 'tbl_ga_barang';
            $column = 'id_barang';
        }
        $delete = $this->Ga_model->DeleteData($table,$id,$column);
        if($delete){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di hapus!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di hapus!"
            );
        }

        echo json_encode($response);
        
    }
    
    public function input_rak()
	{
        $data['rak'] = $this->Ga_model->getAllData('tbl_ga_rak')->result_array();
        $this->load->view('templates/header');
        $this->load->view('ga_input_rak',$data);
        $this->load->view('templates/footer');
        $this->load->view('rak/input_rak_ajax');
    }
    

    public function input_rak_process()
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));

        $insert = $this->Ga_model->InsertDataJson("tbl_ga_rak",$data);
        if($insert){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di tambah!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di tambah!"
            );
        }

        echo json_encode($response);
        
    }

    public function update_rak_process($id)
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));
        
        $update = $this->Ga_model->UpdateDataJson("tbl_ga_rak",$id,"id_rak",$data);
        if($update){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di update!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di update!"
            );
        }

        echo json_encode($response);
        
    }

    public function hapus_rak_process($id)
	{
        header('Content-Type: application/json');
        
        $delete = $this->Ga_model->DeleteData("tbl_ga_rak",$id,"id_rak");
        if($delete){
            $response = array(
                "code"=>200,
                "message"=>"Data berhasil di hapus!"
            );
        }else{
            $response = array(
                "code"=>401,
                "message"=>"Data gagal di hapus!"
            );
        }

        echo json_encode($response);
        
    }


    public function penempatan()
	{
        $data['stok_barang'] = $this->Ga_model->getUnlocatedStock()->result_array();
        $this->load->view('templates/header');
        $this->load->view('ga_penempatan', $data);
        $this->load->view('templates/footer');
	}
}