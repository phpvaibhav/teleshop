<?php

class Login extends Common_Back_Controller {
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('id') != null):
			redirect(site_url().'dashboard');
		endif;
		$this->load->model('login_model');
		$this->load->model('common_model');		
    }
	//view of admin login
	function index(){

		$data['title'] =  'login';	
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div class="">', '</div>');
		if ($this->form_validation->run() == FALSE){ 
			$data['error'] = validation_errors();   	
		} else { 
			$data_val['email']  	= $this->input->post('email');
			$data_val['password'] 	= $this->input->post('password');
			$data_val['authToken'] 	= $this->common_model->_generate_token();
			$isLogin = $this->login_model->isLogin($data_val);
			if($isLogin==1){
				$this->session->set_flashdata('success', 'User authentication successfully.');
				 redirect('dashboard');
			}else if($isLogin==2){
				$data['error'] = "You're temporarily blocked from posting";
			}else {
				$data['error'] = "Invalid login credentials.";
			}
		}
		$this->load->view('login', $data);	
		//$this->load->admin_render_minimal('login', $data);	
	}//end function 
		public function signup()
	{
		
		$this->form_validation->set_rules('fullName', 'full name', 'trim|required');
		$this->form_validation->set_rules('userName', 'user name', 'trim|required|is_unique[users.userName]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|matches[c_password]|min_length[6]');
			$this->form_validation->set_rules('c_password', 'password confirmation', 'trim|required|min_length[6]');
		$this->form_validation->set_message('is_unique', 'The %s is already registered.');
		$this->form_validation->set_error_delimiters('<div class="err_msg">', '</div>');
		if ($this->form_validation->run() == FALSE){ 
			$data['error1'] = validation_errors();   	
		} else {  

			$data_val['fullName'] 		= 	$this->input->post('fullName');
			$data_val['userName'] 		= 	$this->input->post('userName');
			$data_val['email'] 			= 	$this->input->post('email');
			$data_val['userType'] 		= 	1;
			$data_val['password']		=	password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data_val['authToken'] 		= $this->common_model->_generate_token();
			$table="users";
			$isSignup = $this->common_model->insertData($table,$data_val);
			if($isSignup){
				 
				 $this->session->set_flashdata('success', 'successfully signup,Please login.');
				 redirect('login');
			}else{
				$data['error'] = 'Someting going wrong.';
			}
		}   
		$this->load->view('signup');
	}//ENd FUnction

} //End Class