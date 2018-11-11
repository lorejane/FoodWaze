<?php 

	class MealModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"meal",
				"MenuId",
			)
		);
	}
		public function save($meal){
				if($meal['MenuId'] == 0){//insert			
					$this->db->query("INSERT into menu "
						."(Name, Price, CategoryId, StallId) VALUES ("                   
							."'".$meal['Name']."',"
							."'".$meal['Price']."',"
							."'1',"	
							."'".$this->session->userdata('StallId')."'"					
						.")"
					);
				}
				else{//update
					$this->db->query("UPDATE menu SET "
		                ."Name = '".$meal['Name']."',"
		                ."Price = '".$meal['Price']."'"
		                ."WHERE MenuId = '".$meal['MenuId']."'"
					);			
				}
		    }
		    
}