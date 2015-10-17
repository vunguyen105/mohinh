<?php
class admin extends Backend_Controller {
	public $new_nested_set;
	function __construct() {
		parent::__construct ();
		if(!$this->cms_lib->logined()) redirect('backend/login');
		$this->load->library ( 'session' );
	}
	public function index() {
		$this->template->add_title ( 'Dashboard' );
		//$this->template->write_view ( 'content', 'users/view_user', '', true );
		$this->template->render ();
	}
	
	
}
