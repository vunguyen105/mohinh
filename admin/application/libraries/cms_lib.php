<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class cms_lib {

    var $CI;
    public function __construct(){
    	$this->CI = & get_instance();
    }
    
    public function logined(){
    	$is_logged = $this->CI->session->userdata ( 'loggedin' );
    	return (( $is_logged ) && $is_logged == true)? true:false;
    }
    
    public function test(){
    	echo "cc";
    }

}

// END Cms Class