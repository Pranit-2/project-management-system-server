<?php 

class Login_model extends CI_Model 
  {
    function __construct(){
      parent::__construct();
      $this->load->database();
    }
 
      public function login($email, $pass)
      {
        
                
                $query = $this->db->get_where('users', array('email'=>$email, 'Password'=>$pass));
                echo json_encode($query->result());
                $row = $query->num_rows();
                if($row)
                {
                  http_response_code(200);
                  echo json_encode(array("message" => "Login successful!!.","status"=>200));
                }
                else
                {
                  http_response_code(400);
                  echo json_encode(array("message" => "Please enter valid email or Password.","status"=>400));
                }
 
    
            
        
      }
          
  }
   

?>