<?php 
class Product extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->layout->setTemplate("layouts/default");
        $this->load->model("product_model");
    }

    function index(){
        $this->load->library('pagination');

        $data = [
            "title"=>"Product",
            "activeMenu"=>"product",
            "externalCSS" => ["//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"],
            "externalJS" => [
                "//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js",
                "https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js",
                base_url("asset/js/product.js")
            ]
        ];
        $jumlah_data = $this->product_model->getCountData();
        $config['reuse_query_string'] = true;
		$config['base_url'] = base_url("product/index/".$this->uri->segment(2));
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
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
        $this->layout->display("product/view",$data);
    }

    function form_product($id=null){
        $this->load->model("category_model");
        

        $data = [
            "title"=>(!empty($id)?"Edit":"Add")." Product",
            "activeMenu"=>"product",
            "externalCSS" => [
                "//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css",
                "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
            ],
            "externalJS" => [
                "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js",
                "//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js",
                "https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js",
                base_url("asset/js/product.js")
            ]
        ];
        
        if($id!=null){
            $data["productID"] = $id;
            $data["dataProduct"] = $this->product_model->findOne($id);
        }
        
        $data["categories"] = $this->category_model->getAll();
        $this->layout->display("product/form_product",$data);
    }

    function create(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("product-name","Product Name","required");
        $this->form_validation->set_rules("category","Category","required");
        $this->form_validation->set_rules("price","Price","required");
        // $this->form_validation->set_rules("image","Product Image","required");
        $this->form_validation->set_rules("description","Description","required");
        // usleep(100000000);
        if($this->form_validation->run()==true){
            $resultUpload = $this->uploadImage();
            if($resultUpload["success"]==false){
                $response = [
                    "success" => false,
                    "message" => $resultUpload["message"]
                ];
            }else{
                $name = $this->input->post('product-name');
                $description = htmlentities($this->input->post('description'));
                $price = $this->input->post('price');
                $categoryId = $this->input->post('category');
                $data = [
                    "product_name" => $name,
                    "description" => $description,
                    "price" => $price,
                    "category_id" => $categoryId,
                    "image_name" => $resultUpload["data"]
                ];
                // print_r($resultUpload);
                $this->product_model->insert($data);
                $response = [
                    "success" => true
                ];
            }
            
        }
        if(!empty(validation_errors())){
            $response = [
                "success" => false,
                "message" => validation_errors()
            ];
        }
        
        echo json_encode($response);
    }
    public function uploadImage()
    {
        $config['upload_path']          = './upload/product';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 1000;
        $config["encrypt_name"] = true;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $result = [
                "success" => false,
                "message" => $this->upload->display_errors()
            ];
        }
        else
        {
            $result = [
                "success" => true,
                "data" => $this->upload->data('file_name')
            ];
        }
        return $result;
    }
}