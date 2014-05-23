<?php
use rekin\mvc\controller;
use rekin\core\rekin;

class home_controller extends controller {

	public function start ( ) {
		rekin::$cache->get ( "model" )->init ( );
		rekin::$cache->get ( "model" )->loadTemplate ( "home" );
	}

}
