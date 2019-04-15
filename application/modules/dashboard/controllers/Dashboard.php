<?php

class Dashboard extends Common_Back_Controller {
	public function __construct(){
    	parent::__construct();
    	if($this->session->userdata('id') == null):
			redirect(site_url().'login');
		endif;
	
	}
	//view of admin login
	function index(){
		$data['title'] =  'Member login';	
		$this->load->admin_render_minimal('dashboard', $data);	
	}
	function adminLogout($is_redirect=TRUE){
	$this->admin_logout();
	}

} //End Class