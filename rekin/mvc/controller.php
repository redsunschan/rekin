<?php
namespace rekin\mvc;

use rekin\api\object;

abstract class controller extends object {

	public function loadModel ( model $model ) {
		$model->init ( );
	}
	
	public function finish ( ) {
		echo rekin::$cache->get ( "ob_content" );
		rekin::$cache->removeAll ( );
		gc_unable ( );//All process ended
	}

}
