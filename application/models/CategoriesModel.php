<?php 
	class CategoriesModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"category",
				"CategoryId",
			)
		);
	}


	public function save($category){
		if($category['CategoryId'] == 0){//insert			
			$this->db->query("INSERT into category "
				."(CategoryName) VALUES ("                   
					."'".$category['CategoryName']."'"					
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE category SET "
                ."CategoryName = '".$category['CategoryName']."'"
                ."WHERE CategoryId = '".$category['CategoryId']."'"
			);			
		}
	}

}	