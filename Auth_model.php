<?php  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  
use PHPMailer\PHPMailer\SMTP;

class Auth_model extends CI_Model 
{
    function __construct(){
      parent::__construct();
     
                          }
    
 
public function login($email,$password,$id)
{
        
                
                $query = $this->db->get_where('userresource', array('email'=>$email, 'Password'=>$password,'id'=>$id));
                $row = $query->num_rows();
                
                
                if($row>0)
                {
                  
                  foreach ($query->result() as $r)
                    {
                       $role=$r->role;
                       
                   
                    }
                  return $role;
                }
                else 
                  return $row;

}
          
public function forgot_password($email,$id)
{
                
                
                include_once APPPATH.'vendor/autoload.php';
                
                $query = $this->db->get_where('userresource', array('email'=>$email,'id'=>$id));
                $ro = $query->num_rows();
                
          if($ro>0)
            {
                  
                  
                  foreach ($query->result() as $row)
                    {
                       $role=$row->role;
                    }
                  
                  $str="%abcdefghijklmnopqrstuvwxyz@ABCDEFGHIJKLMNOPQRSTUVWXYZ*0123456789$";
                  $str=str_shuffle($str);
                  $str=substr($str,0,15);
                  $mail = new PHPMailer(true);
  
                  try {
                          

                      $mail->isSMTP();    
                      $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                          
                      $mail->Host       = 'smtp.gmail.com;';                    
                      $mail->SMTPAuth   = true;                             
                      $mail->Username   = 'teamprojectmanagement40@gmail.com';                 
                      $mail->Password   = 'gixfkptkdiyruxpw';                        
                      $mail->SMTPSecure = 'tls';                              
                      $mail->Port       = 587;  
                      
                      $mail->setFrom('teamprojectmanagement40@gmail.com');           
                      $mail->addAddress($email);
                      
                         
                      $mail->isHTML(true);                                  
                      $mail->Subject = 'Password Recovery Mail';
                      $email_template="<h2>Hello $role<br/> This is your New Password <h4>$str</h4> </h2>";
                      $mail->Body    = $email_template;
                      
                      $mail->send();
                      $data = array('Password' =>$str);
                      echo "Mail has been sent successfully!";
                      $update=$this->db->update('userresource',$data);
                      } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                             }
                   
                 return $ro;  
          }
        else
          {
                  return $ro;
                  
                  
          }
 
    
            
        
      }
}
   

?>