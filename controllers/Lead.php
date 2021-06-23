<?php

require(APPPATH.'libraries/REST_Controller.php');

class Lead extends REST_Controller{

	public function __construct(){
        parent::__construct();    
        // $this->load->helper(['jwt', 'authorization']);
        $this->load->model('Lead_model');
        
    }

public function leaddisplay_get()
{
	$result=$this->Lead_model->leaddisplay();
	//echo json_encode($result->result());
  if($result)
  {
    //http_response_code(200);
    echo json_encode(array("data" => $result,"statusCode"=>200));
  }
  else
  {
   // http_response_code(400);
    echo json_encode(array("message" => "unable to display the lead","statusCode"=>400));
  }

}



public function leadcreate_post()
{
	 

	   $ro =   $this->post('recieved_On');
       $ls =    $this->post('lead_Source');
       $ln =    $this->post('lead_Name');
       $ph =    $this->post('phone');
       $email =    $this->post('email');
       $add =    $this->post('address');
       $confi =    $this->post('confidence');
       $ec =    $this->post('estimate_Cost');
       $co =    $this->post('created_On');
       $com =    $this->post('comments');

    if(empty($ro)||empty($ls)||empty($ln)||empty($ph)||empty($email)||empty($add)||empty($confi)||empty($ec)||empty($co)||empty($com))
    {
    	
  	    echo json_encode(array("message" => "all fiels are necessary!!.","statusCode"=>400));
    }
    
    
    else
    {
     
    $data = array('recievedOn' =>$ro,'leadSource'=>$ls,'leadName' =>$ln,'phone' =>$ph,'email' =>$email,'address' =>$add,'confidence' =>$confi,'estimateCost' =>$ec,'createdOn' =>$co,'comments' =>$com);
     $result=$this->Lead_model->lead_create($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$data);
     if($result>'0')
     {
       echo json_encode(array("message" => "lead already exists.","statusCode"=>400));
     }
     
     else if($result=='0')
     {
      echo json_encode(array("message" => "unable to create the lead.","statusCode"=>400));
     }
     else if($result<'0')
     {
      
      echo json_encode(array("message" => "lead was created.","statusCode"=>200));
     }
    }
    
     
}

public function leadupdate_post()
{
	   
	   $ro = $this->post('recieved_On');
       $ls = $this->post('lead_Source');
       $ln =    $this->post('lead_Name');
       $ph =    $this->post('phone');
       $email =    $this->post('email');
       $add =    $this->post('address');
       $confi =    $this->post('confidence');
       $ec =    $this->post('estimate_Cost');
       $co =    $this->post('created_On');
       $com =    $this->post('comments');
       $id =   $this->post('id');

       
    
     
    $data= array('recievedOn' =>$ro,'leadSource'=>$ls,'leadName' =>$ln,'phone' =>$ph,'email' =>$email,'address' =>$add,'confidence' =>$confi,'estimateCost' =>$ec,'createdOn' =>$co,'comments' =>$com);
    
    $data=array_filter($data);
     $result=$this->Lead_model->lead_update($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$id,$data);
     if($result>'0')
     {
      echo json_encode(array("message" => "lead was updated.","statusCode"=>200));
     }
     else if($result<'0')
     {
      echo json_encode(array("message" => "unable to update the lead.","statusCode"=>400));
     }
     else if($result=='0')
     {
      echo json_encode(array("message" => "lead does not exists.","statusCode"=>400));  
     }
    
    
}

public function leaddelete_post()
{
     $id =   $this->post('id');
     $result=$this->Lead_model->lead_delete($id);
     if($result>'0')
     {
      echo json_encode(array("message" => "lead was deleted.","statusCode"=>200));
     }
     else if($result=='0')
     {
      echo json_encode(array("message" => "unable to delete the lead.","statusCode"=>400));
     }
     else if($result<'0')
     {
      echo json_encode(array("message" => "lead does not exists.","statusCode"=>400)); 
     }
}

}
?>