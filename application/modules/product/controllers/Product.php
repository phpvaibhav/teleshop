<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends Common_Back_Controller {

    public function __construct() {
		parent::__construct();
		$this->check_admin_user_session();
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('common_model');
    }
	function index(){
 		$data['parent'] = "Dashboard";
        $data['title'] = "Products";
        
        $this->load->admin_render_minimal('Products', $data);
 	}//End

    public function getProductList(){
    	$sessionId = $_SESSION[ADMIN_USER_SESS_KEY]['id'];
        $this->load->helper('text');
          $PRODUCT_PATH    = base_url().PRODUCT_PATH;
        $PRODUCT_DEFAULT_AVATAR = base_url().PRODUCT_DEFAULT_AVATAR;
        $list = $this->product_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pData) { 
        $action ='';
        if(!empty($pData->image)){
            $pData->image =  $PRODUCT_PATH.$pData->image;
        }else{
            $pData->image =  $PRODUCT_DEFAULT_AVATAR;
        }
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = '<img src='.$pData->image.' alt="Product" width="65%">';
        $row[] = display_placeholder_text($pData->name); 
        $row[] = display_placeholder_text($pData->code); 
        $row[] = display_placeholder_text($pData->price); 

           // $link = base_url('users/userDetails/'.encoding($usersData->id) );
            $action .= '<a href="javascript:void();"  class="on-default edit-row table_action" title="View user"><i class="fa fa-eye"></i></a>';
               
            // $clk_edit =  "editFn('admin/categoryCtrl','editGenres','$usersData->id');" ;
            // $action .= '<a href="javascript:void(0)" onclick="'.$clk_edit.'" class="on-default edit-row table_action" title="Edit Event"><i class="fa fa-pencil-square-o"></i></a>';          

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->product_model->count_all(),
            "recordsFiltered" => $this->product_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }

  	public function userDetails(){
  		$userId = decoding($this->uri->segment(3));
  		
  		$data['parent'] = "users";
        $data['title'] = "Profile";
       
        $data['userDetail'] = $this->product_model->productDetail(array('id'=>$userId)); //get Seller details
        //pr($data['userDetail']);
        $this->load->admin_render_minimal('user_details', $data);
    }//end function
    function addProduct(){
        $data['parent'] = "Dashboard";
        $data['title'] = "add Product";
       
        $this->load->admin_render_minimal('addProudct', $data);
    }
    function add_Product(){
        $responce = array('status'=>0,'message'=>"Someting going wrong.");
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('price', 'price', 'trim|required');
    
        $this->form_validation->set_rules('code', 'code', 'trim|required|is_unique[products.code]');
     
        
        $this->form_validation->set_message('is_unique', 'The %s is already registered.');
        //$this->form_validation->set_error_delimiters('<div class="err_msg">', '</div>');
        if ($this->form_validation->run() == FALSE){ 
           
            $responce = array('status'=>0,'message'=> validation_errors());      
        } else {  
            //pr($_FILES);
            $data_val['name']       =   $this->input->post('name');
            $data_val['code']       =   $this->input->post('code');
            $data_val['price']          =   $this->input->post('price');
    
          //  $data_val['authToken']      = $this->common_model->_generate_token();
            $image = array();
                if (!empty($_FILES['image']['name'])) {
                $this->load->model('Image_model');
                $folder = 'product';
                $image = $this->Image_model->upload_image('image',$folder); //upload media of 
                }
                if(is_array($image) && array_key_exists("error",$image) && !empty($image['error'])){
                $res = array('status' => 0, 'message' =>$image['error']); 
                echo json_encode($res); die;   
                }      

                if(is_array($image) && array_key_exists("image_name",$image)){

                $admin_image = $image['image_name'];
                if(!empty($admin_image)){
                $data_val['image'] = $admin_image;
                //$this->Image_model->delete_image(USER_AVATAR_PATH,$existing_img);
                }
                }

            $table="products";
            $isSignup = $this->common_model->insertData($table,$data_val);
            if($isSignup){
                 $responce = array('status'=>1,'message'=>"Product added successfully done.");

            }else{
                $responce = array('status'=>0,'message'=>"Someting going wrong");
            }
        } 
        echo json_encode($responce);  
        
    }

}//end  Class
/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
