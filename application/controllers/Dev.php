<?php 
class Dev extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->library("string_manipulation");
        echo $this->string_manipulation->hash_password("admin");
    }
}