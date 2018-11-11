<?php 

	class DessertModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"dessert",
				"MenuId",
			)
		);
	}
		public function save($dessert){
				if($dessert['MenuId'] == 0){//insert			
					$this->db->query("INSERT into menu "
						."(Name, Price, CategoryId, StallId) VALUES ("                   
							."'".$dessert['Name']."',"
							."'".$dessert['Price']."',"
							."'3',"	
							."'".$this->session->userdata('StallId')."'"					
						.")"
					);
				}
				else{//update
					$this->db->query("UPDATE menu SET "
		                ."Name = '".$dessert['Name']."',"
		                ."Price = '".$dessert['Price']."'"
		                ."WHERE MenuId = '".$dessert['MenuId']."'"
					);			
				}
		    }
		    
}