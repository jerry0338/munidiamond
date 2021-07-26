<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->rbac->check_module_access();
		if($this->uri->segment(3) != '')
		$this->rbac->check_operation_access();
		$this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('admin/admin_model', 'admin_model');
	}

	//--------------------------------------------------------------------------
	public function index(){
		$head['title'] = 'Dashboard';
		$head['admin'] = $this->admin_model->get_user_detail();
		$this->load->view('admin/includes/_header', $head);
    	$this->load->view('admin/dashboard/view');
    	$this->load->view('admin/includes/_footer');
	}
}
?>	