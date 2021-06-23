<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH . '/libraries/REST_Controller.php';
	class Attendance_model extends CI_Model 
	{ 
		        public function attendance_display()
		        {
		            $query=$this->db->query('SELECT `id`, `resourceName`, `phone`, `email` FROM `userresource` ');
		           
		            return $query->result_array();
		            
		            
		        }
    

                public function attendance_update($object1)
				{
				   
                 
		  	       $insert=$this->db->insert('attendance',$object1);
				   if($insert)
					{
						return $insert;
						    	
						    	
				    }
                  
                   
						    
				}			    
	}
				    
?>