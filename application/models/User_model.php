<?php 
class User_model extends CI_Model{
    private $tableName = "user";
    private $tableId = "id";

    function __construct(){
        parent::__construct();
    }
    function insert($data){
        return $this->db->insert($data);
    }
    function update($data,$id){
        $this->db->where($this->tableId,$id);
        return $this->db->update($this->tableName,$data);
    }
    function delete(){
        $this->db->where($this->tableId,$id);
        return $this->db->update($this->tableName);
    }
    function where($arrayWhere){
        foreach($arrayWhere as $key => $value){
            $this->db->where($key,$value);
        }
    }
    function findOne(){
        $this->db->limit(1);
        $sql = $this->db->get($this->tableName);
        if($sql->num_rows()>0){
            return $sql->row();
        }else{
            return false;
        }
    }
}