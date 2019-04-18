<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     //var $table , $column_order, $column_search , $order =  '';
    var $table = USERS;
    var $column_order = array('u.id','u.profileImage','u.email','u.fullName'); //set column field database for datatable orderable
    var $column_sel = array('u.id','u.profileImage','u.email','u.fullName','ur.userType as userRole'); //set column field database for datatable orderable
    var $column_search = array('u.fullName','u.email','ur.userType'); //set column field database for datatable searchable 
    var $order = array('u.id' => 'ASC');  // default order
    var $where = array();
    var $group_by = 'u.id'; 

 
    
    public function set_data($where=''){
        $this->where = $where; 
    }

    private function _get_query()
    {
        $sel_fields = array_filter($this->column_sel); 
        $this->db->select($sel_fields);
        $this->db->from(USERS.' as u');
        $this->db->join('userRole as ur','ur.id=u.userType');
        $i = 0;
        foreach ($this->column_search as $emp) // loop column 
        {
            if(isset($_POST['search']['value']) && !empty($_POST['search']['value'])){
            $_POST['search']['value'] = $_POST['search']['value'];
        } else
            $_POST['search']['value'] = '';
        if($_POST['search']['value']) // if datatable send POST for search
        {
            if($i===0) // first loop
            {
                $this->db->group_start();
                $this->db->like(($emp), $_POST['search']['value']);
            }
            else
            {
                $this->db->or_like(($emp), $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
        }

        if(!empty($this->where))
            $this->db->where($this->where); 


        if(!empty($this->group_by)){
            $this->db->group_by($this->group_by);
        }
         

        if(isset($_POST['order'])) // here order processing
        { 
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        { 
            $order = $this->order; 
            $this->db->order_by(key($order), $order[key($order)]);
        }
       
    }

    function get_list($sessionId="")
    {
        $this->_get_query();
        if(isset($_POST['length']) && $_POST['length'] < 1) {
            $_POST['length']= '10';
        } else
        $_POST['length']= $_POST['length'];
        
        if(isset($_POST['start']) && $_POST['start'] > 1) {
            $_POST['start']= $_POST['start'];
        }
        $this->db->limit($_POST['length'], $_POST['start']);
        //print_r($_POST);die;
        $query = $this->db->get(); //lq();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function usersDetails($data){
   
    	  $usersPath    = base_url().USER_AVATAR_PATH;
        $userDefault = base_url().USER_DEFAULT_AVATAR;
        $sql = $this->db->select('users.*,(case when (profileImage = "") 
        THEN "'.$userDefault.'"ELSE
        concat("'.$usersPath.'",profileImage) 
        END) as profileImage,userRole.userType as userRole')->from('users')->join('userRole','userRole.id=users.userType')->where(array('users.id'=>$data['id']))->get();
        return $sql->row();
    }
    function getUserRole(){
        $array =array();
        $sql = $this->db->select('*')->from('userRole')->get();
        if($sql->num_rows()):
            $array =$sql->result();
        endif;
        return $array;
    }

 	
}//End Class
?>