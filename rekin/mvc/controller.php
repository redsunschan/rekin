<?php
namespace rekin\mvc;

use rekin\api\object;
use rekin\core\rekin;

abstract class controller extends object {

	abstract function start ( );

	public function loadModel ( model $model ) {
		$model->init ( );
	}

	public function finish ( ) {
		rekin::$cache->get ( "model" )->render ( );
		rekin::$cache->removeAll ( );
		gc_disable ( );
	}

}
