<?php 

	class PendingOrdersModel extends _BaseModel{

	public function __construct(){		
		parent::_setDai(
			array(
				"orders",
				"OrderId",
			)
		);
	}

}