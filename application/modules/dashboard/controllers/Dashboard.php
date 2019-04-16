<?php

class Dashboard extends Common_Back_Controller {
	public function __construct(){
    	parent::__construct();
    	$this->check_admin_user_session();
	
	}
	//view of admin login
	function index(){
		$data['title'] =  'login';	
		$this->load->admin_render_minimal('dashboard', $data);	
	}
	function adminLogout($is_redirect=TRUE){
	$this->admin_logout();
	}

} //End Class