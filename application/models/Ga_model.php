<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ga_model extends CI_Model {

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

}