<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {
	public function status(){
		$this->db->select('
			sum(if(A.status=0,1,0)) as proses,
			sum(if(A.status=101,1,0)) as success,
			sum(if(A.status=102,1,0)) as callback,
			sum(if(A.status=103,1,0)) as wrong,
			sum(if(A.status=104,1,0)) as no_smoker,
			sum(if(A.status=105,1,0)) as under_18,
			sum(if(A.status=106,1,0)) as no_callback,
			sum(if(A.status=107,1,0)) as plagiat,
			sum(if(A.status=108,1,0)) as materai,
			sum(if(A.status=109,1,0)) as f2f,
			sum(if(A.status=110,1,0)) as grandprize,
			sum(if(A.status in (101,102,103,104,105,106,107,108,109,110),1,0)) as total_c,
			sum(if(A.status=21,1,0)) as na,
			sum(if(A.status=22,1,0)) as bus,
			sum(if(A.status=23,1,0)) as rej,
			sum(if(A.status in (21,22,23),1,0)) as total_n,
			sum(if(A.id is not null,1,0)) as total
		');
		$this->db->from('candidate A');		
		if($this->input->get('date_from') <> '' && $this->input->get('date_to') <> ''){
			$this->db->where('A.dist_date >=',format_ymd($this->input->get('date_from')));
			$this->db->where('A.dist_date <=',format_ymd($this->input->get('date_to')));
		}		
		return $this->db->get()->result();
	}
}