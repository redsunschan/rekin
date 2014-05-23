<?php
namespace rekin\mvc;

use rekin\core\rekin;
use rekin\api\static_object;
use rekin\debugger;

class frontcontroller extends static_object {

	public static function start ( ) {
		debugger::info ( static::tag ( ) , "Start Front Controll" );
		require rekin::$path->module.rekin::$cache->get ( "module" )."/controller/".rekin::$cache->get ( "action" ).".controller.php";
		require rekin::$path->module.rekin::$cache->get ( "module" )."/model/".rekin::$cache->get ( "action" ).".model.php";
		$c = rekin::$cache->get ( "action" )."_controller";
		rekin::$cache->add ( "controller" , new $c ( ) );
		unset ( $c );
		$m = rekin::$cache->get ( "action" )."_model";
		rekin::$cache->add ( "model" , new $m ( ) );
		unset ( $m );
		echo rekin::$cache->get ( "controller" );
		//rekin::$cache->get ( "controller" )->loadModel ( rekin::$cache->get ( "model" ) );
		//rekin::$cache->get ( "model" )->loadTemplate ( rekin::$cache->get ( "action" ) );
		//rekin::$cache->get ( "controller" )->finish ( );
	}

}
