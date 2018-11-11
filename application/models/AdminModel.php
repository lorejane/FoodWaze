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

		public  function getStall(){
			return $this->db->query("SELECT * FROM stall ")->result();
		}

		public function _getStallName($id){
			$dbList = $this->db->query("SELECT * FROM stall WHERE StallId = '".$id."'")->row();
			return $dbList;		
		}

		public function getEmployee(){
			return $this->db->query("SELECT * FROM employee")->result();
			
		}

		public function save($employee){
			if($employee['EmployeeId'] == 0){//insert			
				$this->db->query("INSERT into employee "
					."(EmployeeAccount,Firstname, Lastname, PositionId, StallId, Password) VALUES ("                   
						."'".$employee['EmployeeAccount']."',"
						."'".$employee['Firstname']."',"
						."'".$employee['Lastname']."',"
						."'3',"	
						."'".$employee['StallId']."',"
						."'".$employee['Password']."'"						
					.")"
				);

			}
			else{//update
				$this->db->query("UPDATE employee SET "
	                ."EmployeeAccount = '".$employee['EmployeeAccount']."',"
	                ."Firstname = '".$employee['Firstname']."',"
	                ."Lastname = '".$employee['Lastname']."'"
	                ."WHERE EmployeeId = '".$employee['EmployeeId']."'"
				);			
			}
	    }
	
}
