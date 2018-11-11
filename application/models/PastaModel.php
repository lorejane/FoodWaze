<?php 

	class PastaModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"pasta",
				"MenuId",
			)
		);
	}
		public function save($pasta){
				if($pasta['MenuId'] == 0){//insert			
					$this->db->query("INSERT into menu "
						."(Name, Price, CategoryId, StallId) VALUES ("                   
							."'".$pasta['Name']."',"
							."'".$pasta['Price']."',"
							."'2',"	
							."'".$this->session->userdata('StallId')."'"					
						.")"
					);
				}
				else{//update
					$this->db->query("UPDATE menu SET "
		                ."Name = '".$pasta['Name']."',"
		                ."Price = '".$pasta['Price']."'"
		                ."WHERE MenuId = '".$pasta['MenuId']."'"
					);			
				}
		    }
		    
}