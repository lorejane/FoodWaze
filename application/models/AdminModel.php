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

	public function getEmployeeDetails(){ //display details nung naka login
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		
	}

	public  function getStall(){ //display stalls without none
		return $this->db->query("SELECT * FROM stall where StallId > 0")->result();
		}

	public function getEmployee(){ //display employees
		return $this->db->query("SELECT * FROM employee WHERE StallId != '".$this->session->userdata('StallId')."'")->result();
	}

	public function getEmployeeImage(){
		return $this->db->query("SELECT Image FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row()->Image;

	}

	public function getEmployeeName(){
		return $this->db->query("SELECT Lastname FROM employee WHERE EmployeeId = '".$EmployeeId."'")->row()->Lastname;	

	}

	public function getCategories(){//data-table
		return $this->db->query("SELECT * FROM category")->result();
		
	}

	public function _getCategories($id){ //update categories
		$dbList = $this->db->query("SELECT * FROM category WHERE CategoryId = '".$id."'")->row();
		return $dbList;		
	}

	public function _getStallName($id){ // update stalls
		$dbList = $this->db->query("SELECT * FROM stall WHERE StallId = '".$id."'")->row();
		return $dbList;		
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

   	public function saveProfile($EmployeeId, $Image){
		$this->db->query("UPDATE employee SET "                			
			."Image = '".$Image."' "
			."WHERE EmployeeId = '".$EmployeeId."'"
		);	
	}

	public function Stalls(){//total
		return $this->db->query("SELECT COUNT(StallId) as StallId FROM stall")->row()->StallId;
	}

	public function Managers(){//total
		return $this->db->query("SELECT COUNT(EmployeeId) as EmployeeId FROM employee WHERE PositionId = 2 ")->row()->EmployeeId;
	}

	public function Cashiers(){//total
		return $this->db->query("SELECT COUNT(EmployeeId) as EmployeeId FROM employee WHERE PositionId = 3 ")->row()->EmployeeId;
	}		

	public function getSumemployee(){
		return $this->db->query("SELECT COUNT(EmployeeId) as EmployeeId FROM employee ");
    
   		
}

}
