<?php

class Home_Controller extends MY_Controller{   
    function __construct() {
        parent::__construct();        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('cms_lib');
        $this->load->library('session');
    }  
    
     public function is_login(){
        $is_logged = $this->session->userdata('loggedin');
        if(isset($is_logged) && $is_logged == true)
            return true;
        else
            return false;
    }
}
?>
