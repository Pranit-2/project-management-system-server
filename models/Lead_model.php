<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH . '/libraries/REST_Controller.php';
	class Lead_model extends CI_Model 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		        public function leaddisplay()
		        {
		            $query=$this->db->query('SELECT `id`, `leadSource`, `leadName`, `phone`, `email`, `address`, `confidence`, `estimateCost`, `comments` FROM `leadinformation` ');
		           
		            return $query;
		            
		            
		        }

				    public function lead_create($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$data)
				{
					
		  	        $this->db->select('*');
		            $this->db->from('leadinformation');
		            $this->db->where('email',$email);
		  	        $res_u=$this->db->get();
		  	
				  	if ($res_u->num_rows() > 0) 
				  	{
					  	  http_response_code(400);
					  	  echo json_encode(array("message" => "lead already exists.","status"=>400));	
				  	}
			  	
					else
					{
						         
					    $insert=$this->db->insert('leadinformation',$data);
						    if($insert)
						    {
						    	http_response_code(200);
						    	echo json_encode(array("message" => "lead was created.","status"=>200));
						    }
						    else
						    {
						    	http_response_code(400);
						    	echo json_encode(array("message" => "unable to create the lead.","status"=>400));
						    }
					 }
			    
					


                }

                	    public function lead_update($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$id,$data)
										{
											
								  	        $this->db->select('*');
								            $this->db->from('leadinformation');
								    		$this->db->where('id',$id);

								  	        $res_u=$this->db->get();

								  	        
										  	if ($res_u->num_rows() > 0) 
										  	 {
											  		
										  		 $update=$this->db->update('leadinformation',$data);
												    if($update)
												    {
												    	http_response_code(200);
												    	echo json_encode(array("message" => "lead was updated.","status"=>200));
												    }
												    else
												    {
												    	http_response_code(400);
												    	echo json_encode(array("message" => "unable to update the lead.","status"=>400));
												    }
										  	 }
									  	
											 else
											{
												
												  http_response_code(400);
											  	  echo json_encode(array("message" => "lead does not exists.","status"=>400));         
											   
											}
									    
											


						                }

				public function lead_delete($id)
										
										{
											$this->db->select('*');
								            $this->db->from('leadinformation');
								    		$this->db->where('id',$id);

								  	        $res_u=$this->db->get();
								  	        if ($res_u->num_rows() > 0) 
										  	 {

											  		$delete = $this->db->delete('leadinformation',array("id"=>$id));
										  		 
												    if($delete)
												    {
												    	http_response_code(200);
												    	echo json_encode(array("message" => "lead was deleted.","status"=>200));
												    }
												    else
												    {
												    	http_response_code(400);
												    	echo json_encode(array("message" => "unable to delete the lead.","status"=>400));
												    }
										  	 }
									  	
											 else
											{
												
												  http_response_code(400);
											  	  echo json_encode(array("message" => "lead does not exists.","status"=>400));         
											   
											}
											 


						                }
	




}

?>