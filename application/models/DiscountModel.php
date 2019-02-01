<?php 
	class DiscountModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"discount",
				"DiscountId",
			)
		);
	}

}