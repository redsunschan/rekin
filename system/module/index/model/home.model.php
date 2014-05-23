<?php
use rekin\mvc\model;
use rekin\api\hashmap;

class home_model extends model {

	public function init ( ) {
		$this->data = new hashmap ( );
		$this->data->put ( "title" , "hi" );
	}

}
