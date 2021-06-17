<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH . '/libraries/REST_Controller.php';
	class Lead_model extends CI_Model 
	{ 
		  public function leaddisplay()
		        {
		            $query=$this->db->query('SELECT `id`, `leadSource`, `leadName`, `phone`, `email`, `address`, `confidence`, `estimateCost`, `comments`,createdOn,recievedOn FROM `leadinformation` ');
		           
		            return $query->result_array();
		            
		            
		        }

		  public function lead_create($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$data)
				{
					
		  	        $this->db->select('*');
		            $this->db->from('leadinformation');
		            $this->db->where('email',$email);
		  	        $res_u=$this->db->get();
		  	        $row=$res_u->num_rows();
				  	if ($row > 0) 
				  	{     
					  	  return $row;
					  	  
				  	}
			  	
					else
					{
						       
					        $insert=$this->db->insert('leadinformation',$data);
						    if($insert)
						    {
						    	return -1;
						   
						    }
						    else
						    {
						    	return 0;
						    	
						    }
					 }
			    
					


                }

        public function lead_update($ro,$ls,$ln,$ph,$email,$add,$confi,$ec,$co,$com,$id,$data)
				{
										
  				    $this->db->select('*');
			  		$this->db->from('leadinformation');
			  		$this->db->where('id',$id);
				    $res_u=$this->db->get();
                    $row=$res_u->num_rows();
								  	        if ($row > 0) 
										  	 {
											  	 
										  		 $update=$this->db->update('leadinformation',$data);
												    if($update)
												    {
												    	return $row;
												    }
												    else
												    {
												    	return -1;
												    }
										  	 }
									  	
											 else
											{ 
											   return 0;       
											}
									    
				}

				public function lead_delete($id)
										
										{
											$this->db->select('*');
								            $this->db->from('leadinformation');
								    		$this->db->where('id',$id);
								    		$res_u=$this->db->get();
								    		$row=$res_u->num_rows();
								  	        if ($row> 0) 
										  	 {

											  		$delete = $this->db->delete('leadinformation',array("id"=>$id));
										  		 
												    if($delete)
												    {
												    	return $row;
												    	
												    }
												    else
												    {
												    	return 0;
												    	
												    }
										  	 }
									  	
											 else
											{
												
												  return -1;
											  	          
											   
											}
											 


						                }
	




}


?>