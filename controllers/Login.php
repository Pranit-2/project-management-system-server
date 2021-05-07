<?php
require(APPPATH.'libraries/REST_Controller.php');

class Login extends REST_Controller { 
    public function __construct(){
        parent::__construct();    
        // $this->load->helper(['jwt', 'authorization']);
        $this->load->model('Login_model');
        
    }

    public function login_post()
{
$email =   $this->input->post('email');
$pass =    $this->input->post('password');
// $hash = password_hash($pass, 
//           PASSWORD_DEFAULT);

    if(empty($email))
    {
        http_response_code(400);
        echo json_encode(array("message" => "please enter your email!!.","status"=>400));
    }
          
                else if(empty($pass))
                {
                  http_response_code(400);
                  echo json_encode(array("message" => "please enter your password!!.","status"=>400));
                }
                else
                {
                    $res_u=$this->Login_model->login($email, $pass);
                }
}
}

?>