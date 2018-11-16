<?php 
	class ManagerModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"employee",
				"EmployeeId",
			)
		);
	}

	public function save($employee){
		if($employee['EmployeeId'] == 0){//insert			
			$this->db->query("INSERT into employee "
				."(EmployeeAccount,Firstname, Lastname, PositionId, StallId, Password) VALUES ("                   
					."'".$employee['EmployeeAccount']."',"
					."'".$employee['Firstname']."',"
					."'".$employee['Lastname']."',"
					."'3',"	
					."'".$this->session->userdata('StallId')."'"
					."'".$employee['Password']."'"						
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE employee SET "
                ."EmployeeAccount = '".$employee['EmployeeAccount']."',"
                ."Firstname = '".$employee['Firstname']."',"
                ."Lastname = '".$employee['Lastname']."',"
                ."Password = '".$employee['Password']."'"
                ."WHERE EmployeeId = '".$employee['EmployeeId']."'"
			);			
			}
	}

	public function getEmployeeManager(){ //display employees by stall
		return $this->db->query("SELECT * FROM employee WHERE StallId = '".$this->session->userdata('StallId')."'")->result();
		
	}

	public function _getMenu($id){ //update menu
		$dbList = $this->db->query("SELECT * FROM menu WHERE MenuId = '".$id."'")->row();
		return $dbList;		
	}
	
	public function _getCategories($id){ //update categories
		$dbList = $this->db->query("SELECT * FROM category WHERE CategoryId = '".$id."'")->row();
		return $dbList;		
	}

	public function getCategories(){//data-table
		return $this->db->query("SELECT * FROM category")->result();
		
	}

	public function getMenu(){ //display menu 
		return $this->db->query("SELECT * FROM menu WHERE StallId = '".$this->session->userdata('StallId')."'")->result();
		
	}

	public function delete($MenuId){
		$this->db->where(['MenuId' => $MenuId]);
		return $this->db->delete('menu');

	}
}		