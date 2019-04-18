<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends Common_Back_Controller {

    public function __construct() {
		parent::__construct();
		$this->check_admin_user_session();
		$this->load->model('user_model');
		$this->load->model('image_model');
		$this->load->model('common_model');
    }
	function index(){
 		$data['parent'] = "Dashboard";
        $data['title'] = "Users";
        
        $this->load->admin_render_minimal('users', $data);
 	}//End

    public function getUsersList(){
    	$sessionId = $_SESSION[ADMIN_USER_SESS_KEY]['id'];
        $this->load->helper('text');
    
        $list = $this->user_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $usersData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = '<img src='.make_user_img_url($usersData->profileImage).' alt="user profile" width="65%">';
        $row[] = display_placeholder_text($usersData->fullName); 
        $row[] = display_placeholder_text($usersData->email); 
        $row[] = display_placeholder_text($usersData->userRole); 

            $link = base_url('users/userDetails/'.encoding($usersData->id) );
            $action .= '<a href="'.$link.'"  class="on-default edit-row table_action" title="View user"><i class="fa fa-eye"></i></a>';
               
            // $clk_edit =  "editFn('admin/categoryCtrl','editGenres','$usersData->id');" ;
            // $action .= '<a href="javascript:void(0)" onclick="'.$clk_edit.'" class="on-default edit-row table_action" title="Edit Event"><i class="fa fa-pencil-square-o"></i></a>';          

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_model->count_all(),
            "recordsFiltered" => $this->user_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }

  	public function userDetails(){
  		$userId = decoding($this->uri->segment(3));
  		
  		$data['parent'] = "users";
        $data['title'] = "Profile";
       
        $data['userDetail'] = $this->user_model->usersDetails(array('id'=>$userId)); //get Seller details
        //pr($data['userDetail']);
        $this->load->admin_render_minimal('user_details', $data);
    }//end function
    function addUser(){
        $data['parent'] = "Dashboard";
        $data['title'] = "Add User";
        $data['userRole'] = $this->user_model->getUserRole();
        $this->load->admin_render_minimal('addUser', $data);
    }
    function add_user(){
        $responce = array('status'=>0,'message'=>"Someting going wrong.");
        $this->form_validation->set_rules('fullName', 'full name', 'trim|required');
        $this->form_validation->set_rules('userName', 'user name', 'trim|required|is_unique[users.userName]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('userType', 'user role', 'required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
         //   $this->form_validation->set_rules('c_password', 'password confirmation', 'trim|required|min_length[6]');
        $this->form_validation->set_message('is_unique', 'The %s is already registered.');
        //$this->form_validation->set_error_delimiters('<div class="err_msg">', '</div>');
        if ($this->form_validation->run() == FALSE){ 
           
            $responce = array('status'=>0,'message'=> validation_errors());      
        } else {  
            //pr($_FILES);
            $data_val['fullName']       =   $this->input->post('fullName');
            $data_val['userName']       =   $this->input->post('userName');
            $data_val['email']          =   $this->input->post('email');
            $data_val['userType']       =   $this->input->post('userType');
            $data_val['password']       =   password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data_val['authToken']      = $this->common_model->_generate_token();
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

            $table="users";
            $isSignup = $this->common_model->insertData($table,$data_val);
            if($isSignup){
                 $responce = array('status'=>1,'message'=>"User added successfully done.");

            }else{
                $responce = array('status'=>0,'message'=>"Someting going wrong");
            }
        } 
        echo json_encode($responce);  
        
    }

}//end  Class
/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
