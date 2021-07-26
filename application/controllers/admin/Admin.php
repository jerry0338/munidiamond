<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }
 
	//-----------------------------------------------------		
	function index($type=''){

		$this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_status','' );
		
		$head['title'] = 'Admin List';
		$head['admin'] = $this->admin->get_user_detail();

		$data['admin_roles'] = $this->admin->get_admin_roles();
		$this->load->view('admin/includes/_header',$head);
		$this->load->view('admin/admin/index', $data);
		$this->load->view('admin/includes/_footer');
	}
 
	//-----------------------------------------------------	
	function adminList(){

		// $data['token'] = $this->security->get_csrf_hash();
	
		$query = '';
        $output = array();
        $query = $this->db->select('*');
        if(isset($_POST["search"]["value"]))
        {
        	$query = $this->db->group_start();
            $query = $this->db->like('firstname	', $_POST["search"]["value"], 'after');
            $query = $this->db->or_like('lastname', $_POST["search"]["value"], 'after');
            $query = $this->db->or_like('email', $_POST["search"]["value"], 'after');
			$query = $this->db->group_end();
        }
        if(isset($_POST["order"]))
        {
            $query = $this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
        }
        else
        {
            $query = $this->db->order_by("id", "DESC");
        }
        if($_POST["length"] != -1)
        {
            $query = $this->db->limit($_POST['length'],$_POST['start']);
        }

        $query = $this->db->get('hk_admin');
        $result = $query->result();

        $data = array();
        $filtered_rows = $query->num_rows();
        $Counter =$_POST['start'] + 1;
        foreach($result as $row)
        {
            // $imageName = $row->co_owner_profile != '' ?  base_url('./uploads/company/'.$row->co_owner_profile) : base_url('./uploads/company/admin.jpg');
            // $image = '<img src="'.$imageName.'" height="60" width="60" style="border-radius:50%" class="box-shadow-3" alt="profile">';
            $sub_array = array();        
            $sub_array[] = $Counter;
            // $sub_array[] = $image;
			$sub_array[] = $row->firstname.' '.$row->lastname;
			$sub_array[] = $row->email;
			$sub_array[] = $row->mobile_no;
			$sub_array[] = $row->mobile_no;
			$sub_array[] = $row->mobile_no;
			$sub_array[] = $row->mobile_no;
            // $sub_array[] = '<button type="button" id='.$row->co_id.' class="btn btn-icon btn-outline-success box-shadow-3 btn-small-size mr-1 update"><b><i class="ft-edit"></i></b></button><button type="button" id='.$row->co_id.' class="btn btn-icon btn-outline-info box-shadow-3 btn-small-size mr-1 view" data-toggle="modal" data-target="#companyDetailsView"><b><i class="ft-eye"></i></b></button><button type="button" id='.$row->co_id.' class="btn btn-icon btn-outline-danger box-shadow-3 btn-small-size mr-1 delete"><b><i class="ft-trash"></i></b></button>';
			
            $data[] = $sub_array;
            $Counter++;
        }
        $totalRow = $this->db->query("select * from hk_admin");
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	$totalRow->num_rows(),
            "data"				=>	$data
        );
        echo json_encode($output);
	}

	//---------------------------------------------------------
	function filterdata(){
		$this->session->set_userdata('filter_type',$this->input->post('type'));
		$this->session->set_userdata('filter_status',$this->input->post('status'));
	}

	//--------------------------------------------------		
	function list_data(){

		$data['info'] = $this->admin->get_all();

		$this->load->view('admin/admin/list',$data);
	}

	//-----------------------------------------------------------
	function change_status(){

		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->change_status();
	}
	
	//--------------------------------------------------
	function add(){

		$this->rbac->check_operation_access(); // check opration permission

		$data['admin_roles']=$this->admin->get_admin_roles();

		if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|is_unique[hk_admin.username]|required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('role', 'Role', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/admin/add'),'refresh');
				}
				else{
					$data = array(
						'department_id' => $this->input->post('role'),
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_active' => 1,
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->admin->add_admin($data);
					if($result){

						// Activity Log 
						$this->activity_model->add_log(4);

						$this->session->set_flashdata('success', 'Admin has been added successfully!');
						redirect(base_url('admin/admin'));
					}
				}
			}
			else
			{
				$this->load->view('admin/includes/_header', $data);
        		$this->load->view('admin/admin/add');
        		$this->load->view('admin/includes/_footer');
			}
	}

	//--------------------------------------------------
	function edit($id=""){

		$this->rbac->check_operation_access(); // check opration permission

		$data['admin_roles'] = $this->admin->get_admin_roles();

		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|required');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]');
			$this->form_validation->set_rules('role', 'Role', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/admin/edit/'.$id),'refresh');
			}
			else{
				$data = array(
					'department_id' => $this->input->post('role'),
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'is_active' => 1,
					'updated_at' => date('Y-m-d : h:m:s'),
				);

				if($this->input->post('password') != '')
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

				$data = $this->security->xss_clean($data);
				$result = $this->admin->edit_admin($data, $id);

				if($result){
					// Activity Log 
					$this->activity_model->add_log(5);

					$this->session->set_flashdata('success', 'Admin has been updated successfully!');
					redirect(base_url('admin/admin'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/admin');
		}
		else{
			$data['admin'] = $this->admin->get_admin_by_id($id);
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/admin/edit', $data);
			$this->load->view('admin/includes/_footer');
		}		
	}

	//--------------------------------------------------
	function check_username($id=0){

		$this->db->from('admin');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('id !='.$id);
		$query=$this->db->get();
		if($query->num_rows() >0)
			echo 'false';
		else 
	    	echo 'true';
    }

    //------------------------------------------------------------
	function delete($id=''){
	   
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->delete($id);

		// Activity Log 
		$this->activity_model->add_log(6);

		$this->session->set_flashdata('success','User has been Deleted Successfully.');	
		redirect('admin/admin');
	}
	
}

?>