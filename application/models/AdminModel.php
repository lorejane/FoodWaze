<?php 
	class AdminModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"employee",
				"EmployeeId",
			)
		);
	}

	public function _getStallName($id){ // update stalls
		$dbList = $this->db->query("SELECT * FROM stall WHERE StallId = '".$id."'")->row();
		return $dbList;		
	}

	public  function getStall(){ //display stalls
		return $this->db->query("SELECT * FROM stall where StallId > 0")->result();
	}

	public function getEmployee(){ //display employees
		return $this->db->query("SELECT * FROM employee")->result();
	}

	public function delete($employee){		
			$this->db->query("DELETE FROM employee WHERE EmployeeId = '".$employee['EmployeeId']."' ");
	}

	public function save($employee){
		if($employee['EmployeeId'] == 0){//insert			
			$this->db->query("INSERT into employee "
				."(EmployeeAccount,Firstname, Lastname, PositionId,StallId, Password) VALUES ("                   
					."'".$employee['EmployeeAccount']."',"
					."'".$employee['Firstname']."',"
					."'".$employee['Lastname']."',"
					."'".$employee['PositionId']."',"
					."'".$employee['StallId']."',"
					."'".$employee['Password']."'"						
				.")"
			);
		}
		else{//update
			$this->db->query("UPDATE employee SET "
                ."EmployeeAccount = '".$employee['EmployeeAccount']."',"
                ."Firstname = '".$employee['Firstname']."',"
                ."Lastname = '".$employee['Lastname']."',"
                ."PositionId = '".$employee['PositionId']."',"
                ."StallId = '".$employee['StallId']."'"
                ."WHERE EmployeeId = '".$employee['EmployeeId']."'"
			);			
		}
    }
}
