<?php
class Department_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_role_by_id($id)
    {
		$this->db->from('hk_department');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();
    }

	//-----------------------------------------------------
	function get_all()
    {
		$this->db->from('hk_department');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	//-----------------------------------------------------
	function insert()
	{		
		$this->db->set('name',$this->input->post('admin_role_title'));
		$this->db->set('admin_role_status',$this->input->post('admin_role_status'));
		$this->db->set('admin_role_created_on',date('Y-m-d h:i:sa'));
		$this->db->insert('hk_department');
	}
	 
	//-----------------------------------------------------
	function update()
	{		
		$this->db->set('admin_role_title',$this->input->post('admin_role_title'));
		$this->db->set('admin_role_status',$this->input->post('admin_role_status'));
		$this->db->set('admin_role_modified_on',date('Y-m-d h:i:sa'));
		$this->db->where('admin_role_id',$this->input->post('admin_role_id'));
		$this->db->update('hk_department');
	} 
	
	//-----------------------------------------------------
	function change_status()
	{		
		$this->db->set('admin_role_status',$this->input->post('status'));
		$this->db->where('admin_role_id',$this->input->post('id'));
		$this->db->update('hk_department');
	} 
	
	//-----------------------------------------------------
	function delete($id)
	{		
		$this->db->where('admin_role_id',$id);
		$this->db->delete('hk_department');
	} 
	
	//-----------------------------------------------------
	function get_modules()
    {
		$this->db->from('module');
		$this->db->order_by('sort_order','asc');
		$query=$this->db->get();
		return $query->result_array();
    }
    
	//-----------------------------------------------------
	function set_access()
	{
		if($this->input->post('status')==1)
		{
			$this->db->set('admin_role_id',$this->input->post('admin_role_id'));
			$this->db->set('module',$this->input->post('module'));
			$this->db->set('operation',$this->input->post('operation'));
			$this->db->insert('hk_module_access');
		}
		else
		{
			$this->db->where('admin_role_id',$this->input->post('admin_role_id'));
			$this->db->where('module',$this->input->post('module'));
			$this->db->where('operation',$this->input->post('operation'));
			$this->db->delete('hk_module_access');
		}
	} 
	//-----------------------------------------------------
	function get_access($admin_role_id)
	{
		$this->db->from('hk_module_access');
		$this->db->where('admin_role_id',$admin_role_id);
		$query=$this->db->get();
		$data=array();
		foreach($query->result_array() as $v)
		{
			$data[]=$v['module'].'/'.$v['operation'];
		}
		return $data;
	} 	

	/* SIDE MENU & SUB MENU */

	//-----------------------------------------------------
	function get_all_module()
    {
		$this->db->select('*');
		$this->db->order_by('sort_order','asc');
		$query = $this->db->get('hk_module');
        return $query->result_array();
    }

    //-----------------------------------------------------
	function add_module($data)
    {
		$this->db->insert('hk_module', $data);
		return true;
    }

    //---------------------------------------------------
	// Edit Module
	public function edit_module($data, $id){
		$this->db->where('module_id', $id);
		$this->db->update('hk_module', $data);
		return true;
	}

	//-----------------------------------------------------
	function delete_module($id)
	{		
		$this->db->where('module_id',$id);
		$this->db->delete('hk_module');
	} 

	//-----------------------------------------------------
	function get_module_by_id($id)
    {
		$this->db->from('hk_module');
		$this->db->where('module_id',$id);
		$query=$this->db->get();
		return $query->row_array();
    }

    /*------------------------------
		Sub Module / Sub Menu  
	------------------------------*/

	//-----------------------------------------------------
	function add_sub_module($data)
    {
		$this->db->insert('hk_sub_module',$data);
		return $this->db->insert_id();
    } 

	//-----------------------------------------------------
	function get_sub_module_by_id($id)
    {
		$this->db->from('hk_sub_module');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();
    } 	

	//-----------------------------------------------------
	function get_sub_module_by_module($id)
    {
		$this->db->select('*');
		$this->db->where('parent',$id);
		$this->db->order_by('sort_order','asc');
		$query = $this->db->get('hk_sub_module');
		return $query->result_array();
    }

    //----------------------------------------------------
    function edit_sub_module($data, $id)
    {
    	$this->db->where('id', $id);
		$this->db->update('hk_sub_module', $data);
		return true;
    }

    //-----------------------------------------------------
	function delete_sub_module($id)
	{		
		$this->db->where('id',$id);
		$this->db->delete('hk_sub_module');
		return true;
	} 

}
?>