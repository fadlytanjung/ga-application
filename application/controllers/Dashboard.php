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
        $data['stok_barang'] = $this->Ga_model->getAllData('tbl_ga_stok')->result_array();
        $this->load->view('templates/header');
        $this->load->view('ga_input_barang',$data);
        $this->load->view('templates/footer');
        $this->load->view('barang/input_barang_ajax');
        $this->load->view('barang/input_stok_ajax');
        
    }

    public function input_barang_process()
	{
        header('Content-Type: application/json');
        
        $data = json_decode($this->input->post('sendData'));

        $insert = $this->Ga_model->InsertDataJson("tbl_ga_barang",$data);
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
        $this->load->view('templates/header');
        $this->load->view('ga_penempatan');
        $this->load->view('templates/footer');
	}
}