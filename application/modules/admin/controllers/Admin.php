<?php

class Admin extends Common_Back_Controller {
	public function __construct(){
    	parent::__construct();
	
	}
	//view of admin login
	function index(){
		$data['title'] =  'Member login';	
		$this->load->admin_render_minimal('member_login', $data);	
	}

} //End Class