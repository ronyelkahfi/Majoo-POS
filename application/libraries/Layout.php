<?php

/**
 *
 */
class Layout
{

    private $template;

    function display($view,$data=""){
        $CI =& get_instance();
        // $CI->load->model("main_model");
        $menu = [];
        $data = [
            "title" => !empty($data["title"]) ? $data["title"] : "",
            "activeMenu" => $data["activeMenu"],
            "data_content" => $data,
            "CI" => $CI,
            "externalCSS" => !empty($data['externalCSS']) ? $data['externalCSS'] : '',
            "externalJS"  => !empty($data['externalJS'])  ? $data['externalJS']  : '',
            "sidebarCollapse" => !empty($data['sidebarCollapse'])  ? $data['sidebarCollapse']  : '',
            "view" => $view,
            "arrMenu" => $menu
        ];

        $CI->load->view($this->template,$data);
    }

    function setTemplate($template){
        $this->template = $template;
    }

}
