<?php
function is_success_flashdata($flashdata) {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'success' ) != false) ? true : false;
}
function is_warning_flashdata($flashdata) {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'warning' ) != false) ? true : false;
}
function is_info_flashdata($flashdata) {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'info' ) != false) ? true : false;
}
function is_error_flashdata($flashdata) {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'error' ) != false) ? true : false;
}
function is_login() {
	$is_logged = $this->session->userdata ( 'loggedin' );
	return (($is_logged) && $is_logged == true) ? true : false;
}
function build_menu() {
	$CI = & get_instance ();
	$CI->load->model ( 'menu_m' );
	$menu = $CI->menu_m->get ();
	$sub = '';
	if (empty ( $menu ))
		return false;
	foreach ( $menu as $key => $value ) {
		$sub .= '<li class="dd-item dd3-item"><span style="float: right"><i class="icon-plus"></i><i class="icon-pencil"></i>';
		$sub .= '<i class="icon-trash"></i>';
		$sub .= '</span>';
		$sub .= '<div class="dd-handle dd3-handle"></div>';
		$sub .= '<div data-menu-id="' . $value ['MenuID'] . '"class="dd3-content">' . $value ['MenuName'] . '</div>';
	}
	return $sub;
}


