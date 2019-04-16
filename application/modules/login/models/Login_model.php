<?php
class Login_model extends CI_Model
{
	function isLogin($data){
        $usersPath    = base_url().USER_AVATAR_PATH;
        $userDefault = base_url().USER_DEFAULT_AVATAR;
        $email = $data["email"];
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $where = array('userName'=>$data['email']);
        }else{
            $where = array('email'=>$data['email']);
        }
		$sql = $this->db->select('*,(case when (profileImage = "") 
        THEN "'.$userDefault.'"ELSE
        concat("'.$usersPath.'",profileImage) 
        END) as profileImage')->where($where)->get('users');
        if($sql->num_rows()):
            $user = $sql->row();
          
                if(password_verify($data['password'],$user->password)){
					if($user->status):
						$this->db->where(array('id'=>$user->id))->update('users',array('authToken'=>$data['authToken']));
                        $userRole = $this->db->select('*')->where(array('id'=>$user->userType))->get('userRole')->row();
						$session_data['id']                   = $user->id ;
                        $session_data['email']                  = $user->email ;
						$session_data['fullName']   = $user->fullName ;
                        $session_data['userType']   = $user->userType ;
						$session_data['userRole']	= $userRole->userType ;
                        $session_data['authToken']  = $user->authToken ;
						$session_data['profileImage'] 	= $user->profileImage ;
						$session_data['isLogin'] 	= TRUE ;

                       $_SESSION[ADMIN_USER_SESS_KEY] = $session_data;
						
						return 1;
                    endif;
                     return 2;
                }
        endif;
       return 0;
	}//End Function
}//End Class
?>
