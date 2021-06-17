<?php
require(APPPATH.'libraries/REST_Controller.php');

class Auth extends REST_Controller { 
    public function __construct(){
        parent::__construct();    
        $this->load->model('Auth_model');
        
    }
public function login_post()
{
        $email =   $this->post('email');
        $password =    $this->post('password');
       

    if(empty($email))
    {
       
        echo json_encode(array("message" => "please enter your email!!.","statusCode"=>400));
    }
          
    else if(empty($password))
    {
       
        echo json_encode(array("message" => "please enter your password!!.","statusCode"=>400));
    }
                
    else
    {
        $role=$this->Auth_model->login($email, $password);
        
        if($role=='0')
                {
                  
                  echo json_encode(array("message" => "please enter valid credentials.","statusCode"=>400));
                }
       else if($role=='Admin')
                {
                  
                  
                  echo json_encode(array("message" => "Admin logged in successfully.","statusCode"=>200));
                }
       else if($role=='staff')
                {
                  echo json_encode(array("message" => "user logged in successfully.","statusCode"=>200));
                }
    }
}

public function forgot_pass_post()
{
        $email =   $this->post('email');
        
    if(empty($email))
    {
        
        echo json_encode(array("message" => "please enter your email!!.","statusCode"=>400));
    }
    
    else
    {
        $row=$this->Auth_model->forgot_password($email);
        if($row=='0')
        {
            echo json_encode(array("message" => "Please enter valid email","statusCode"=>400));
        }
        else if($row>'0')
        {
             echo json_encode(array("message" => "email has been sent!!","statusCode"=>200));
        }
    }
}
}

?>