<?php

class Backend_Controller extends Home_Controller{   
    function __construct() {
        parent::__construct();
        $data = array();
        $this->load->library('template');
        $this->template->set_template('backend');
        $this->template->add_doctype();
        
        $this->template->parse_view('header','backend/dashboard/header',$data);
        $this->template->parse_view('content','backend/dashboard/content',$data);
        $this->template->parse_view('siderbar','backend/dashboard/siderbar',$data);
        $this->template->parse_view('footer','backend/dashboard/footer',$data);
    }  
    public function phanquyen()
    {
        echo 'phan quyen';
        
    }
}
?>
