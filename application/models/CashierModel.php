<?php 
	class CashierModel extends _BaseModel
	{

	public function __construct(){		
	}

	public function getCategories(){ //display categories
		return $this->db->query("SELECT * FROM category")->result();
	}

	public function getOrder(){
		return $this->db->query("SELECT * FROM orders WHERE IsActive = '1' ")->result();	
	}

	public function getOrderDetails($id){
		return $this->db->query("SELECT * FROM orderdetails WHERE OrderId = '".$id."' ")->result();	
	}
	
	public function getMenu($menuid){
		return $this->db->query("SELECT * FROM menu WHERE MenuId = '".$menuid."' ")->result();	
	}

	public function getEmployee(){ //display details nung naka login
		return $this->db->query("SELECT * FROM employee WHERE EmployeeId = '".$this->session->userdata('EmployeeId')."'")->row();
		
	}

	public function SaveOrder(){
		$this->db->query("INSERT into orders (StallId) VALUES ('".$this->session->userdata('StallId')."') ");
	}

	public function SaveOrders(){
		$orderid = $this->db->query("SELECT MAX(OrderId) FROM orders")->row()->OrderId;
		foreach($this->cart->contents() as $menu) {
		$this->db->query("INSERT into orderdetails "
		 		."(OrderId, MenuId, Quantity) VALUES ("
		 			.'"'.$orderid.'",'                   
		 			//."'"$menu->$orderid"',"	
		 			."'".$menu['id']."',"
		 			."'".$menu['qty']."'"
		 		.")"
		 	);
		}
		print_r($orderid);
	}

	public function SaveReceipt($receipt){
		$this->db->query("INSERT into receiptmanagement "
				."(OrderId, Total, Cash, Change, Discount, PositionId, StallId) VALUES ("	
					."'3',"	
					."'".$receipt['discount']."',"
					."'".$receipt['puretotal']."',"
					."'".$receipt['ReceivedAmnt']."',"
					."'".$receipt['change']."',"
					."'".$this->session->userdata('PositionId')."',"
					//."'".$this->session->userdata('EmployeeAccount')."',"
					."'".$this->session->userdata('StallId')."'"						
				.")"
			);
		print_r($receipt);
	}
}
