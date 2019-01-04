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

	}