<?php

require(APPPATH.'libraries/REST_Controller.php');

class Attendance extends REST_Controller{

	public function __construct(){
        parent::__construct();    
        // $this->load->helper(['jwt', 'authorization']);
        $this->load->model('Attendance_model');
        
    }

public function attendancedisplay_get()
{
	$result=$this->Attendance_model->attendance_display();
	
  if($result)
  {
    
    echo json_encode(array("data" => $result,"statusCode"=>200));
  }
  else
  {
   
    echo json_encode(array("message" => "unable to display the Attendance","statusCode"=>400));
  }

}
public function updateattendance_post()
{
  $attendanceList=$this->post('attendanceList');
    foreach($attendanceList as $object ) 
    {
    $object["attDate"]=date("Y-m-d");
    $object["attTime"]=date("h:i:s");
    $insert=$this->Attendance_model->attendance_update($object);
    }
    log_message('debug',print_r( $attendanceList,TRUE));
    if($insert)  
                 {
                  echo json_encode(array("message" => "Attendance was updated.","statusCode"=>200));
                 }
         else
                {
                  
                 echo json_encode(array("message" => "Attendance was not updated..","statusCode"=>400));
                }
  
}
}
?>