<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ga_model extends CI_Model {

    public function generateID(){
        return $this->db->query("SELECT UUID() AS id");
    }
    public function getAllData($table){
        return $this->db->get($table);
    }

    public function InsertDataJson($table,$json_data){
        
        $this->db->insert($table, $json_data);
        return ($this->db->affected_rows() > 0) ? true : false; 
    }

    public function UpdateDataJson($table,$id,$column,$json_data){
        
        $this->db->where($column, $id);
        $this->db->update($table, $json_data);
        return ($this->db->affected_rows() > 0) ? true : false; 
    }

    public function DeleteData($table,$id,$column){
        
        $this->db->where($column, $id);
        $this->db->delete($table);
        return ($this->db->affected_rows() > 0) ? true : false; 
    }

    public function getPenempatan(){
        return $this->db->query("SELECT * FROM tbl_ga_stok_rak LEFT JOIN tbl_ga_stok_detail
        ON tbl_ga_stok_rak.stok_detail_id=tbl_ga_stok_detail.stok_detail_id LEFT JOIN tbl_ga_stok
        ON tbl_ga_stok_detail.id_stok=tbl_ga_stok.id_stok");
    }

    public function getUnlocatedStock(){
        return $this->db->where('id_rak', NULL)
                ->join('tbl_ga_stok_detail tgsd', 'tgs.id_stok=tgsd.id_stok')
                ->join('tbl_ga_stok_rak tgsr', 'tgsd.stok_detail_id=tgsr.stok_detail_id','left')
                ->get('tbl_ga_stok tgs');
    }

    public function getUnlocatedStock2($type){
        return $this->db->select('*, tgsd.stok_detail_id as sd_id')
                    ->from('tbl_ga_barang tgb')
                    ->join('tbl_ga_stok_detail tgsd', 'tgb.id_barang=tgsd.id_barang')
                    ->join('tbl_ga_stok tgs', 'tgsd.id_stok=tgs.id_stok') 
                    ->join('tbl_ga_stok_rak tgsr', 'tgsd.stok_detail_id=tgsr.stok_detail_id', 'left')
                    ->where('id_rak', NULL)
                    ->where('type', $type)
                    ->get();
    }

    public function getNewRack($type){
        return $this->db->query("SELECT * FROM tbl_ga_rak  
        WHERE id_rak NOT IN (SELECT id_rak FROM tbl_ga_stok_rak) AND zona='".$type."'");
    }

    public function getStockDetailId($stok_id){
        return $this->db->query("SELECT stok_detail_id FROM tbl_ga_stok_detail 
        WHERE id_stok='$stok_id'")->row();
    }
    public function getAvailRack($type){
        return $this->db->query("SELECT tgsr.id_rak, tgsr.jumlah  AS jumlah, SUM(tgbk.jumlah) AS jumlah_keluar, panjang, lebar, tinggi, zona FROM tbl_ga_stok_rak tgsr
                                LEFT JOIN tbl_ga_barang_keluar tgbk ON tgsr.stok_rak_id=tgbk.stok_rak_id
                                LEFT JOIN tbl_ga_rak tbr ON tbr.id_rak=tgsr.id_rak
                                GROUP BY tgsr.stok_rak_id ORDER BY tgsr.stok_rak_id DESC");
    }
}