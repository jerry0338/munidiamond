<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends MY_Controller {

		public function __construct(){

			parent::__construct();
			$this->load->helper('cookie');
			$this->load->library('mailer');
			$this->load->model('admin/auth_model', 'auth_model');
		}

		//---------------------------------------------------------------
		public function index(){

			if($this->session->has_userdata('is_admin_login')){
				redirect('admin/dashboard');
			}
			else{
				redirect('admin/auth/login');
			}
		}

		//--------------------------------------------------------------
		public function login(){

			// Retrieve session data
			$COOKIE= get_cookie('DiamondAuth');

			// Check for remember_me data in retrieved session data
			if($this->input->post('submit') || $COOKIE){
				if($this->input->post('submit')){
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required');

					if ($this->form_validation->run() == FALSE) {
						$data = array(
							'errors' => validation_errors()
						);
						$this->session->set_flashdata('error', $data['errors']);
						redirect(base_url('admin/auth/login'),'refresh');
					}
					$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
					$result = $this->auth_model->login($data);
					if($result){
						if($result['is_verify'] == 0){
							$this->session->set_flashdata('error', 'Please verify your email address!');
							redirect(base_url('admin/auth/login'));
							exit();
						}
						if($result['is_active'] == 0){
							$this->session->set_flashdata('error', 'Account is disabled by Admin!');
							redirect(base_url('admin/auth/login'));
							exit();
						}
						if($result['is_admin'] == 1){
							$admin_data = array(
								'admin_id' => $result['id'],
								'username' => $result['username'],
								'department_id' => $result['department_id'],
								'admin_department' => $result['name'],
								'is_supper' => $result['is_supper'],
								'is_admin_login' => TRUE
							);
							if(!empty($this->input->post('remember_me'))){
								$cookie = array(
			                        'name'   => 'DiamondAuth',
			                        'value'  => encrypt(serialize($data)),                            
			                        'expire' => strtotime('NOW+7DAYS'),
			                        'secure' => TRUE
			                        );
			                	$this->input->set_cookie($cookie);
							}
							
							$this->session->set_userdata($admin_data);
							$this->rbac->set_access_in_session(); // set access in session
							redirect(base_url('admin/dashboard'), 'refresh');

						}
					}
					else{
						$this->session->set_flashdata('errors', 'Invalid Username or Password!');
						redirect(base_url('admin/auth/login'));
					}
				}else{

					$admin = unserialize(decrypt($COOKIE));

					$data = array(
						'username' => $admin['username'],
						'password' => $admin['password']
					);
					$result = $this->auth_model->login($data);
					if($result){
						if($result['is_verify'] == 0){
							$this->session->set_flashdata('error', 'Please verify your email address!');		
							$cookieCheck = 0;			
						}
						elseif($result['is_active'] == 0){
							$this->session->set_flashdata('error', 'Account is disabled by Admin!');
							$cookieCheck = 0;
						}
						elseif($result['is_admin'] == 1){
							$admin_data = array(
								'admin_id' => $result['id'],
								'username' => $result['username'],
								'department_id' => $result['department_id'],
								'admin_department' => $result['name'],
								'is_supper' => $result['is_supper'],
								'is_admin_login' => TRUE
							);
							
							$this->session->set_userdata($admin_data);
							$this->rbac->set_access_in_session(); // set access in session
							$cookieCheck = 1;
						}
						else{
							$this->session->set_flashdata('errors', 'Opps, Somthing Want to Wrong!');
							$cookieCheck = 0;
						}
					}
					else{
						$this->session->set_flashdata('errors', 'Invalid Username or Password!');
						$cookieCheck = 0;
					}
					if($cookieCheck){
						redirect(base_url('admin/dashboard'), 'refresh');
					}else{
						$data['title'] = 'Login';
						$data['navbar'] = false;
						$data['sidebar'] = false;
						$data['footer'] = false;
						$data['blank_page'] = true;

						$this->load->view('admin/includes/_header', $data);
						$this->load->view('admin/auth/login');
						$this->load->view('admin/includes/_footer', $data);
					}
				}
			}else{
				$data['title'] = 'Login';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['blank_page'] = true;

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/login');
				$this->load->view('admin/includes/_footer');

			}
		}	

		//----------------------------------------------------------	
		public function verify(){

			$verification_id = $this->uri->segment(4);
			$result = $this->auth_model->email_verification($verification_id);
			if($result){
				$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
				redirect(base_url('admin/auth/login'));
			}
			else{
				$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
				redirect(base_url('admin/auth/login'));
			}	
		}

		//--------------------------------------------------		
		public function forgot_password(){

			if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/forget_password'),'refresh');
				}

				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($email);

				if($response){

					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['id']);
					
					// --- sending email
					$to = $response['email'];
					$mail_data= array(
						'fullname' => $response['firstname'].' '.$response['lastname'],
						'reset_link' => base_url('admin/auth/reset_password/'.$pwd_reset_code)
					);
					$this->mailer->mail_template($to,'forget-password',$mail_data);

					if($email){
						$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

						redirect(base_url('admin/auth/forgot_password'));
					}
					else{
						$this->session->set_flashdata('error', 'There is the problem on your email');
						redirect(base_url('admin/auth/forgot_password'));
					}
				}
				else{
					$this->session->set_flashdata('error', 'The Email that you provided are invalid');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
			else{

				$data['title'] = 'Forget Password';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$data['blank_page'] = true;

				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/forget_password');
				$this->load->view('admin/includes/_footer', $data);
			}
		}

		//----------------------------------------------------------------		
		public function reset_password($id=0){

			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);

					$this->session->set_flashdata('reset_code', $id);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}

				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
					redirect(base_url('admin/auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);

				if($result){

					$data['title'] = 'Reseat Password';
					$data['reset_code'] = $id;
					$data['navbar'] = false;
					$data['sidebar'] = false;
					$data['footer'] = false;
					$data['blank_page'] = true;

					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/auth/reset_password');
					$this->load->view('admin/includes/_footer', $data);

				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
		}

		//-----------------------------------------------------------------------
		public function logout(){
			$this->session->sess_destroy();
			delete_cookie("DiamondAuth");
			redirect(base_url('admin/auth/login'), 'refresh');
		}
	}
?>