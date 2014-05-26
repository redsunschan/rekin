<?php
namespace rekin\core;

use rekin\api\static_object;
use rekin\mvc\router;
use rekin\mvc\frontcontroller;

class rekin extends static_object {

	private static $debuggable;
	public static $cache;
	public static $config;
	public static $path;
	public static $data;
	public static $info;
	
	const name = "Rekin PHP Framework";
	const version = "0.0.1";
	const status = "DEV";
	const author = "Redsuns S.H.Chan";
	const copyright = "copyright © Denalo Entertainment Organization";
	const code = "Halios";

	public static function init ( $debuggable = null , $action = null ) {
		gc_enable ( );
		static::debuggable ( $debuggable );
		static::$cache = cache::getInstance ( );
		static::$config = config::getInstance ( );
		static::$path = path::getInstance ( );
		static::$data = datalib::getInstance ( );
		static::$config->loadFile ( "system.config.php" );
		static::$config->loadFile ( "seo.config.php" );
		if ( ! file_exists ( rekin::$config->get ( "default_log" ) ) ) {
			fopen ( rekin::$config->get ( "default_log" ) , "x+" );
		}
		router::parse ( );
		frontcontroller::start ( );
	}

	public static function debuggable ( $boolean = null ) {
		if ( null === $boolean ) {
			if ( static::$debuggable === true || static::$debuggable === false ) {
				return static::$debuggable;
			} else {
				return false;
			}
		} else {
			static::$debuggable = $boolean;
			return static::$debuggable;
		}
	}

}
