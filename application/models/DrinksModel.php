<?php 

	class DrinksModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"drinks",
				"MenuId",
			)
		);
	}
		public function save($drinks){
				if($drinks['MenuId'] == 0){//insert			
					$this->db->query("INSERT into menu "
						."(Name, Price, CategoryId, StallId) VALUES ("                   
							."'".$drinks['Name']."',"
							."'".$drinks['Price']."',"
							."'4',"	
							."'".$this->session->userdata('StallId')."'"					
						.")"
					);
				}
				else{//update
					$this->db->query("UPDATE menu SET "
		                ."Name = '".$drinks['Name']."',"
		                ."Price = '".$drinks['Price']."'"
		                ."WHERE MenuId = '".$drinks['MenuId']."'"
					);			
				}
		    }
		    
}