<?php 
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->layout->setTemplate("layouts/default");
    }

    function public(){
        $data = ["title"=>"Majoo Teknologi Indonesia - Welcome","activeMenu"=>"home"];
        $this->layout->display("public",$data);
    }
}