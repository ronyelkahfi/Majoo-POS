<?php 
class Order extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->layout->setTemplate("layouts/default");
        $this->load->model("product_model");
    }
    function make(){
        $this->load->library('pagination');
        $data = [
            "title"=>"Order",
            "activeMenu"=>"order",
            "externalCSS" => [],
            "externalJS" => [
                
            ]
        ];
        $jumlah_data = $this->product_model->getCountData();
        $config['reuse_query_string'] = true;
		$config['base_url'] = base_url("order/make/".$this->uri->segment(2));
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 20;
        $config['full_tag_open'] = '<div class="card-tools">
                                    <ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>
                                    </div>';
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        $from = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);	
        $sql   = $this->product_model->getAllWithOffset($config['per_page'],$from);
        $data["dataProducts"] = $sql;
        $this->layout->display("order/view",$data);
    }
}