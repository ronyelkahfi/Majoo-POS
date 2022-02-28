<?php 
class Category extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->layout->setTemplate("layouts/default");
        $this->load->model("category_model");
    }
    function index(){
        
        $data = [
            "title"=>"Category",
            "activeMenu"=>"category",
            "externalCSS" => ["//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"],
            "externalJS" => [
                "//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js",
                base_url("asset/js/category.js")
            ]
        ];
        $data["categories"] = $this->category_model->getAll();
        if(!empty($this->session->userdata("msg"))){
            $data["msg"] = $this->session->userdata("msg");
            $this->session->unset_userdata("msg");
        }
        $this->layout->display("category/view",$data);
    }
    function form_category($id=null){
        $data = [
            "title"=>(($id!=null)?"Edit":"Add")." Category",
            "activeMenu"=>"category",
            "externalCSS" => [],
            "externalJS" => [
                base_url("asset/js/category.js")
            ]
        ];
        $this->load->library("form_validation");
        $this->form_validation->set_rules("category-name","Category Name","required");
        if($id==null){
            if($this->form_validation->run()==true){
                $dataInsert = ["category_name" => $this->input->post('category-name')];
                $this->category_model->insert($dataInsert);
                $this->session->set_userdata("msg","Success Add Category");
                redirect("category/form_category");
            }
        }else{
            if($this->form_validation->run()==true){
                $this->updateCategory($id);
            }
            $data["dataCategory"] = $this->category_model->findOne($id);
        }
        if(!empty($this->session->userdata("msg"))){
            $data["msg"] = $this->session->userdata("msg");
            $this->session->unset_userdata("msg");
        }
        $this->layout->display("category/form_category",$data);
    }

    private function updateCategory($id){
        $dataUpdate = ["category_name" => $this->input->post('category-name')];
        $this->category_model->update($dataUpdate,$id);
        $this->session->set_userdata("msg","Success Update Category");
        redirect("category");
    }

    function delete($id){
        $result = $this->category_model->delete($id);
        if($result){
            $this->session->set_userdata("msg","Success Delete Category");
            redirect("category");
        }
    }
}