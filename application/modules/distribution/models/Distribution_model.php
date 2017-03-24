<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution_model extends CI_Model {
	function distribution($interviewer,$total){
		$this->filter();
		$this->db->where('A.interviewer','0');
		$this->db->limit($total);
		$this->db->order_by('co','asc');
		$this->db->update('candidate A',array('A.interviewer'=>$interviewer,'dist_date'=>date('Y-m-d')));
		return $this->db->affected_rows();
	}	
	function get_interviewer(){
		$this->db->where('level','3');
		$this->db->where('status','1');
		$this->db->from('user');
		return $this->db->get()->result();
	}
	function count_ready_distribution(){
		$this->filter();
		$this->db->where('A.interviewer','0');
		$this->db->from('candidate A');
		return $this->db->get()->num_rows();
	}
	function count_by_interviewer_new($id){
		$this->filter();
		$this->db->where('A.status','0');
		$this->db->where('A.audit','0');
		$this->db->from('candidate A');
		$this->db->where('A.interviewer',$id);
		return $this->db->get()->num_rows();
	}
	function count_by_interviewer_onproses($id){
		$this->filter();
		$this->db->where('A.status <>','0');
		$this->db->where('A.audit','0');
		$this->db->from('candidate A');
		$this->db->where('A.interviewer',$id);
		return $this->db->get()->num_rows();
	}
	function count_by_interviewer_complete($id){
		$this->filter();
		$this->db->where('A.audit','1');
		$this->db->where('A.interviewer',$id);
		$this->db->from('candidate A');
		return $this->db->get()->num_rows();
	}
	function clear(){
		$this->filter();
		$this->db->where('A.audit','0');
		$this->db->where('A.valid','0');
		$this->db->update('candidate A',array('A.interviewer'=>'0'));
		return $this->db->affected_rows();
	}
	function clear_by_interviewer($id){
		$this->filter();
		$this->db->where('A.audit','0');
		$this->db->where('A.valid','0');
		$this->db->where('A.interviewer',$id);
		$this->db->update('candidate A',array('A.interviewer'=>'0'));
		return $this->db->affected_rows();
	}	
	function clear_no_answer(){
		$this->filter();
		$this->db->where('A.status in(21,22)');
		$this->db->update('candidate A',array('A.interviewer'=>'0','A.valid'=>'0','A.audit'=>'0'));
		return $this->db->affected_rows();
	}	
	function clear_callback(){
		$this->filter();
		$this->db->where('A.status in(109)');
		$this->db->update('candidate A',array('A.interviewer'=>'0','A.valid'=>'0','A.audit'=>'0'));
		return $this->db->affected_rows();
	}	
	function filter(){
		$event 			= $this->input->get('event');

		$data = array();
		if($event <> ''){
			$data[] = $this->db->where('A.event',$event);			
		}
		return $data;
	}
}