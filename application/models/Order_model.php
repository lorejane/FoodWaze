<?php 

	class Order_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function getMenu(){
			$menu = [];
			foreach($this->db->query("SELECT * FROM menu WHERE StallId = '".$this->session->userdata('StallId')."'")->result() as $row){
				$menu[] = array(
					'MenuId' => $row->MenuId,
					'Name' => $row->Name,
					'Price' => $row->Price,
				);
			}
			return $menu;
		}	

		public function getCategory(){
			return $this->db->query("SELECT * FROM employee WHERE CategoryId = '".$this->session->userdata('CategoryId')."'")->result();
			
        } 
}
