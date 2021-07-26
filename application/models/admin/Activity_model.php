<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model{

	public function get_activity_log(){
		$this->db->select('
			hk_activity_log.id,
			hk_activity_log.activity_id,
			hk_activity_log.user_id,
			hk_activity_log.admin_id,
			hk_activity_log.created_at,
			hk_activity_status.description,
			hk_admin.admin_id,
			hk_admin.username as adminname
		');
		$this->db->join('hk_activity_status','hk_activity_status.id=hk_activity_log.activity_id');
		$this->db->join('hk_users','hk_users.id=hk_activity_log.user_id','left');
		$this->db->join('hk_admin','hk_admin.admin_id=hk_activity_log.admin_id','left');
		$this->db->order_by('hk_activity_log.id','desc');
		return $this->db->get('hk_activity_log')->result_array();
	}

	//--------------------------------------------------------------------
	public function add_log($activity){
		$data = array(
			'activity_id' => $activity,
			'user_id' => ($this->session->userdata('user_id') != '') ? $this->session->userdata('user_id') : 0,
			'admin_id' => ($this->session->userdata('admin_id') != '') ? $this->session->userdata('admin_id') : 0,
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('hk_activity_log',$data);
		return true;
	}
	

	
}

?>