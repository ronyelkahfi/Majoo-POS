<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->layout->setTemplate("layouts/default");
    }

    function index(){
        $data = ["title"=>"Login","activeMenu"=>"login"];
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("email","Email","required");
        $this->form_validation->set_rules("password","Password","required");
        if($this->form_validation->run()==true){
            $this->load->library("string_manipulation");
            $this->load->model("user_model");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $this->user_model->where(array(
                "email" => $email,
                "password" => $this->string_manipulation->hash_password($password)
            ));
            $row = $this->user_model->findOne();
            if($row!=false){
                $this->session->set_userdata("isLogin",true);
                $this->session->set_userdata("userId",$row->id);
                $this->session->set_userdata("name",$row->full_name);
                redirect("product");
            }else{
                $data["error"] = "Unknown username or password";
            }
        }
        
        $this->layout->display("login",$data);
    }
}