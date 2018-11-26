<?php 
	class PositionModel extends _BaseModel
	{
		
	public function __construct(){		
		parent::_setDai(
			array(
				"position",
				"PositionId",
			)
		);
	}
}