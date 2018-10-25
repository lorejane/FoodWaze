<?php 

	class Order_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}
		public function getMenu(){
			return $this->db->query("SELECT * FROM menu")->result();
			
		}

		public function getMenuMeal(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '1' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function getMenuPasta(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '2' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function getMenuDessert(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '3' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function getMenuDrinks(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId = '4' AND StallId = '".$this->session->userdata('StallId')."'")->result();
			
		}

		public function delete($MenuId){
			$this->db->where(['MenuId' => $MenuId]);
			return $this->db->delete('menu');

		}
}
