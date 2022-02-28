<?php 
class Product_model extends CI_Model{
    private $tableName = "product";
    private $tableId = "id";

    function __construct(){
        parent::__construct();
    }
    function insert($data){
        return $this->db->insert($this->tableName,$data);
    }
    function update($data,$id){
        $this->db->where($this->tableId,$id);
        return $this->db->update($this->tableName,$data);
    }
    function delete(){
        $this->db->where($this->tableId,$id);
        return $this->db->delete($this->tableName);
    }
    function where($arrayWhere){
        foreach($arrayWhere as $key => $value){
            $this->db->where($key,$value);
        }
    }
    
    function findOne($id=null){
        if($id!=null){
            $this->db->where($this->tableId,$id);
        }
        $this->db->limit(1);
        $sql = $this->db->get($this->tableName);
        if($sql->num_rows()>0){
            return $sql->row();
        }else{
            return false;
        }
    }

    function getCountData(){
        $this->db->select("count(id) as total");
        return $this->db->get($this->tableName)->row()->total;
    }

    function getAllWithOffset($number,$offset){
        
        $this->db->select("product.*");
        $this->db->select("category.category_name");
        $this->db->join("category","category.id = product.category_id","left");
        $sql = $this->db->get($this->tableName,$number,$offset);
        
        return $sql->result();
        
      }
}