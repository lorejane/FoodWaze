<?php 

	class Order_model extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function getCat1(){
			$menu = [];
			foreach($this->db->query("SELECT * FROM menu WHERE CategoryId ='1' AND StallId = '".$this->session->userdata('StallId')."'")->result() as $row){
				$menu[] = array(
					'MenuId' => $row->MenuId,
					'Name' => $row->Name,
					'Price' => $row->Price,
				);
			}
			return $menu;
		}	

		public function getCat2(){
			$menu = [];
			foreach($this->db->query("SELECT * FROM menu WHERE CategoryId ='2' AND StallId = '".$this->session->userdata('StallId')."'")->result() as $row){
				$menu[] = array(
					'MenuId' => $row->MenuId,
					'Name' => $row->Name,
					'Price' => $row->Price,
				);
			}
			return $menu;
		}
		public function getCat3(){
			$menu = [];
			foreach($this->db->query("SELECT * FROM menu WHERE CategoryId ='3' AND StallId = '".$this->session->userdata('StallId')."'")->result() as $row){
				$menu[] = array(
					'MenuId' => $row->MenuId,
					'Name' => $row->Name,
					'Price' => $row->Price,
				);
			}
			return $menu;
		}

		public function getCat4(){
			$menu = [];
			foreach($this->db->query("SELECT * FROM menu WHERE CategoryId ='4' AND StallId = '".$this->session->userdata('StallId')."'")->result() as $row){
				$menu[] = array(
					'MenuId' => $row->MenuId,
					'Name' => $row->Name,
					'Price' => $row->Price,
				);
			}
			return $menu;
		}		
}
