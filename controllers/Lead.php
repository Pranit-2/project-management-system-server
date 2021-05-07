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
	echo json_encode($result->result());
}



public function leadcreate_post()
{
	 

	   $ro =   $this->input->post('recieved_On');
       $ls =    $this->input->post('lead_Source');
       $ln =    $this->input->post('lead_Name');
       $ph =    $this->input->post('phone');
       $email =    $this->input->post('email');
       $add =    $this->input->post('address');
       $confi =    $this->input->post('confidence');
       $ec =    $this->input->post('estimate_Cost');
       $co =    $this->input->post('created_On');
       $com =    $this->input->post('comments');

    if(empty($ro)|| empty($ls)|| empty($ln)|| empty($ph)|| empty($email)|| empty($add)|| empty($confi)|| empty($ec)|| empty($co)|| empty($com))
    {
    	http_response_code(400);
  	    echo json_encode(array("message" => "all fiels are necessary!!.","status"=>400));
    }
    else
    {
     
    $data = array('recievedOn' =>$ro,'leadSource'=>$ls,'leadName' =>$ln,'phone' =>$ph,'email' =>$email,'address' =>$add,'confidence' =>$confi,'estimateCost' =>$ec,'createdOn' =>$co,'comments' =>$com);
     $res_u=$this->Lead_model->lead_create($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$data);
     // check if fields are not empty
    
    }
}

public function leadupdate_post()
{
	   
	   $ro = $this->input->post('recieved_On');
       $ls = $this->input->post('lead_Source');
       $ln =    $this->input->post('lead_Name');
       $ph =    $this->input->post('phone');
       $email =    $this->input->post('email');
       $add =    $this->input->post('address');
       $confi =    $this->input->post('confidence');
       $ec =    $this->input->post('estimate_Cost');
       $co =    $this->input->post('created_On');
       $com =    $this->input->post('comments');
       $id =   $this->input->post('id');

       
    if(empty($ro||$ls||$ln||$ph||$email||$add||$confi||$ec||$co||$com||$id))
    {

    	http_response_code(400);
  	    echo json_encode(array("message" => "all fiels are necessary!!.","status"=>400));
    }
    else
    {
     
    $data= array('recievedOn' =>$ro,'leadSource'=>$ls,'leadName' =>$ln,'phone' =>$ph,'email' =>$email,'address' =>$add,'confidence' =>$confi,'estimateCost' =>$ec,'createdOn' =>$co,'comments' =>$com,'id'=>$id);
    

     $res_u=$this->Lead_model->lead_update($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$id,$data);
     
    
    }
}

public function leaddelete_post()
{
     $id =   $this->input->post('id');
     $res_u=$this->Lead_model->lead_delete($id);
     
}

}
?>