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


    public function getUnlocatedStock(){
        return $this->db->where('id_rak', NULL)
                ->join('tbl_ga_stok_detail tgsd', 'tgs.id_stok=tgsd.id_stok')
                ->join('tbl_ga_stok_rak tgsr', 'tgsd.stok_detail_id=tgsr.stok_detail_id')
                ->get('tbl_ga_stok tgs');
    }

    public function getUnlocatedStock2($type){
        return $this->db->select('*')
                    ->from('tbl_ga_barang tgb')
                    ->join('tbl_ga_stok_detail tgsd', 'tgb.id_barang=tgsd.id_barang')
                    ->join('tbl_ga_stok tgs', 'tgsd.id_stok=tgs.id_stok' )
                    ->where('id_rak', NULL)
                    ->where('type', $type)
                    ->get();
    }

    public function getNewRack($type){
        return $this->db->query("SELECT * FROM tbl_ga_rak  WHERE id_rak NOT IN (SELECT id_rak FROM tbl_ga_stok WHERE id_rak != NULL) AND zona='".$type."'");
    }

}