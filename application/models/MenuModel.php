<?php 

	class MenuModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"menu",
				"MenuId",
			)
		);
	}
		public function save($menu){
				if($menu['MenuId'] == 0){//insert			
					$this->db->query("INSERT into menu "
						."(CategoryId, Name, Price, StallId) VALUES ("                   
							."'".$menu['CategoryId']."',"
							."'".$menu['Name']."',"
							."'".$menu['Price']."',"
							."'".$this->session->userdata('StallId')."'"					
						.")"
					);
				}
				else{//update
					$this->db->query("UPDATE menu SET "
		                ."CategoryId = '".$menu['CategoryId']."',"
		                ."Name = '".$menu['Name']."',"
		                ."Price = '".$menu['Price']."'"
		                ."WHERE MenuId = '".$menu['MenuId']."'"
					);			
				}
		    }

		 public function saveImage($MenuId, $Image){
			$this->db->query("UPDATE menu SET "                			
				."Image = '".$Image."' "
				."WHERE MenuId = '".$MenuId."'"
			);	
		}
	   
		    
}