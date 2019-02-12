<?php 

	class Stall_model extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"stall",
				"StallId",
			)
		);
	}

	public function _getStallName($stall){ // update stalls
		$dbList = $this->db->query("SELECT * FROM stall WHERE StallId = '".$this->session->userdata('StallId')."' ")->row();
		return $dbList;		
	}

	public function save($stall){
			if($stall['StallId'] == 0){//insert			
				$this->db->query("INSERT into stall "
					."(Name) VALUES ("                   
					."'".$stall['Name']."'"				
					.")"
				);
			}
			else{//update
				$this->db->query("UPDATE stall SET "
	                ."Name = '".$stall['Name']."'"
	                ."WHERE StallId = '".$stall['StallId']."'"
				);			
			}
	    }
	 
	public function saveImage($StallId, $Image){
		$this->db->query("UPDATE stall SET "                			
			."Image = '".$Image."' "
			."WHERE StallId = '".$StallId."'"
		);	
	}

	public function getCustomerMenuMeal(){
		return $this->db->query("SELECT * FROM menu WHERE StallId = '2' ")->result();
		
	}
}