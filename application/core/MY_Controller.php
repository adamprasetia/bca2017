<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('user_login')==''){
			redirect('login');
		}
		$this->user_login = $this->session->userdata('user_login');
		//var_dump($this->user_login);exit;
	}
}
