<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class _BaseController extends CI_Controller {
	
		public function __construct(){
		parent::__construct();		
		}

		public function invalid($name, $message){
			return '"'.$name.'":"<div class=\"invalid-feedback\" style=\"display:block\">'.$message.'</div>",';
		}

		public function convert($param){
			$str = '{';		
			$counter = 0;				
			foreach($param as $data => $record){
				if($counter != 0){
					$str .= ',';
				}
				if(is_array($record) || is_object($record)){
					$str .= '"'.$counter.'":{';							
					$first = true;
					foreach($record as $column => $value){
						if(!$first){
							$str .= ',';
						}
						$str .= '"'.$column.'":"'.$value.'"';
						$first = false;
					}
					$str .= '}';				
				}else{
					$str .= '"'.$data .'":"'.$record.'"';
				}
				$counter++;			
			}
			$str .= '}';
			if($str == '{}')
				return "No data";
			return $str;
		}

	    public function removeExcessComma($str){
			if($str != '{ "data": ['){
	            $str = substr($str, 0, strlen($str) - 1);
			}
			return $str;
		}

}		