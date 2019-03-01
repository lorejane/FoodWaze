<?php 
	class CustomerModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"receiptmanagement",
				"ReceiptNumber",
			)
		);
	}

	public function Receipts(){ //display menu 
		return $this->db->query("SELECT * FROM receiptmanagement WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->result();
	
	}

	public function CustomerDetails(){ //display details nung naka login
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."' ")->row();	
	}

}
