<?php 

	class Order_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function getCat1(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId ='1' AND StallId = '".$this->session->userdata('StallId')."'")->result();
		}		
		
		public function getCat2(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId ='2' AND StallId = '".$this->session->userdata('StallId')."'")->result();
		}

		public function getCat3(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId ='3' AND StallId = '".$this->session->userdata('StallId')."'")->result();
		}

		public function getCat4(){
			return $this->db->query("SELECT * FROM menu WHERE CategoryId ='4' AND StallId = '".$this->session->userdata('StallId')."'")->result();
		}
}
