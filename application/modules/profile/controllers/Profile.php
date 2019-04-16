<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends Common_Back_Controller {

    public function __construct() {
		parent::__construct();
		$this->check_admin_user_session();
		$this->load->model('profile_model');
		$this->load->model('image_model');
		$this->load->model('common_model');
    }
	public function index(){  
		$userId = $_SESSION[ADMIN_USER_SESS_KEY]['id'];
		$data['title'] =	"profile";
        $data['user'] 	= $this->common_model->userProfile($userId);	
		$this->load->admin_render_minimal('profile', $data);	
	
	}//end of function
	function updateProfile(){

		$userId = $_SESSION[ADMIN_USER_SESS_KEY]['id'];
		$res = array('status'=>0,'message'=>"");
		$this->form_validation->set_rules('fullName', 'fullName', 'trim|required');	
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == FALSE){ 
			$res = array('status'=>0,'message'=>validation_errors());	
		} else {

			$email 		= $this->input->post('email');
			$fullName 	= $this->input->post('fullName');
			$isExist 	= $this->common_model->is_data_exists(USERS,array('id !='=>$userId,'email'=>$email));

			if($isExist){
				$res = array('status'=>0,'message'=>'This email already registered.');
			}else{
				//pr($_FILES);
				$image = array();
				if (!empty($_FILES['profileImage']['name'])) {
				$this->load->model('Image_model');
				$folder = 'profile';
				$image = $this->Image_model->upload_image('profileImage',$folder); //upload media of 
				}
				if(is_array($image) && array_key_exists("error",$image) && !empty($image['error'])){
				$res = array('status' => 0, 'message' =>$image['error']); 
				echo json_encode($res); die;   
				}      

				if(is_array($image) && array_key_exists("image_name",$image)){

				$admin_image = $image['image_name'];
				if(!empty($admin_image)){
				$data_val['profileImage'] = $admin_image;
				//$this->Image_model->delete_image(USER_AVATAR_PATH,$existing_img);
				}
				}

				$data_val['email'] = $email;
				$data_val['fullName'] = $fullName;
				$result = $this->common_model->updateFields(USERS,$data_val,array('id'=>$userId));
				if($result){
					$user = $this->common_model->userProfile($userId);
					$_SESSION[ADMIN_USER_SESS_KEY]['fullName']   = $user->fullName ;
					$_SESSION[ADMIN_USER_SESS_KEY]['email']      = $user->email ;
					$_SESSION[ADMIN_USER_SESS_KEY]['profileImage']      = $user->profileImage;
					$_SESSION[ADMIN_USER_SESS_KEY]['isLogin']    = TRUE ;
					$res = array('status'=>1,'message'=>"Record updated successfully done.");
				}else{
					$res = array('status'=>0,'message'=>"Somethimg going wrong.");
				}
			}
			
		}
		echo json_encode($res);
	}//end function
	function password(){
		$userId = $_SESSION[ADMIN_USER_SESS_KEY]['id'];
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		
		$this->form_validation->set_error_delimiters('<div class="err_msg">', '</div>');
		if ($this->form_validation->run() == FALSE){ 
			$res = array('status'=>0,'message'=>validation_errors());		
		} else {
			$password =$this->input->post('password');
			$data_val['password'] = password_hash($password, PASSWORD_DEFAULT); 
			$table  = "users";
			$result = $this->common_model->updateFields(USERS,$data_val,array('id'=>$userId));
				if($result){
					$res = array('status'=>1,'message'=>"Record updated successfully done.");
				}else{
					$res = array('status'=>0,'message'=>"Somethimg going wrong.");
				}
			
			
			
		} //validation ENd 
		echo json_encode($res);
	}//End Function	
}//end  Class
/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
