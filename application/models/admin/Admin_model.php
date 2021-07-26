<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function get_user_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('hk_admin', array('id' => $id));
		return $result = $query->row_array();
	}
	//--------------------------------------------------------------------
	public function update_user($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('id', $id);
		$this->db->update('hk_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('id', $id);
		$this->db->update('hk_admin', $data);
		return true;
	}
	//------------------------------------------------------
	function get_admin_roles()
	{
		$this->db->from('hk_department');
		$this->db->where('status',1);
		$query=$this->db->get();
		return $query->result_array();
	}
 
	//-----------------------------------------------------
	function get_admin_by_id($id)
	{
		$this->db->from('hk_admin');
		$this->db->join('hk_department','hk_department.id=hk_admin.department_id');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();
	}
 
	//-----------------------------------------------------
	function get_all()
	{

		$this->db->from('hk_admin');

		$this->db->join('hk_department','hk_department.id=hk_admin.department_id');

		if($this->session->userdata('filter_type')!='')

			$this->db->where('hk_admin.department_id',$this->session->userdata('filter_type'));

		if($this->session->userdata('filter_status')!='')

			$this->db->where('hk_admin.is_active',$this->session->userdata('filter_status'));


		$filterData = $this->session->userdata('filter_keyword');

		$this->db->like('hk_department.name',$filterData);
		$this->db->or_like('hk_admin.firstname',$filterData);
		$this->db->or_like('hk_admin.lastname',$filterData);
		$this->db->or_like('hk_admin.email',$filterData);
		$this->db->or_like('hk_admin.mobile_no',$filterData);
		$this->db->or_like('hk_admin.username',$filterData);

		$this->db->where('hk_admin.is_supper !=', 1);

		$this->db->order_by('hk_admin.id','desc');

		$query = $this->db->get();

		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}

		return $module;
	}

	//-----------------------------------------------------
public function add_admin($data){
	$this->db->insert('hk_admin', $data);
	return true;
}

	//---------------------------------------------------
	// Edit Admin Record
public function edit_admin($data, $id){
	$this->db->where('id', $id);
	$this->db->update('hk_admin', $data);
	return true;
}

	//-----------------------------------------------------
function change_status()
{		
	$this->db->set('is_active',$this->input->post('status'));
	$this->db->where('id',$this->input->post('id'));
	$this->db->update('hk_admin');
} 

	//-----------------------------------------------------
function delete($id)
{		
	$this->db->where('id',$id);
	$this->db->delete('hk_admin');
} 

}

?>