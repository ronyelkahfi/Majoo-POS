<?php 
class Product extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->layout->setTemplate("layouts/default");
    }

    function index(){
        $data = [
            "title"=>"Product",
            "activeMenu"=>"product",
            "externalCSS" => ["//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"],
            "externalJS" => [
                "//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js",
                base_url("asset/js/product.js")
            ]
        ];
        $this->layout->display("product/view",$data);
    }

    function form_product($id=""){
        $data = [
            "title"=>(!empty($id)?"Edit":"Add")." Product",
            "activeMenu"=>"product",
            "externalCSS" => [],
            "externalJS" => [
                base_url("asset/js/product.js")
            ]
        ];
        $this->load->library("form_validation");
        $this->form_validation->set_rules("product-name","Product Name","required");
        $this->form_validation->set_rules("category","Category","required");
        $this->form_validation->set_rules("price","Price","required");
        $this->form_validation->set_rules("image","Product Image","required");
        $this->form_validation->set_rules("Description","Description","required");
        if($this->form_validation->run()==true){
            
        }
        $this->layout->display("product/form_product",$data);
    }
}