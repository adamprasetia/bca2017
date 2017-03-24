<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('report_model');
	}
	public function index(){
		$xdata['action'] = 'report/search'.get_query_string();
		$xdata['report_status'] = $this->report_model->status();
		$data['content'] = $this->load->view('report',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect('report'.get_query_string($data));		
	}	
}