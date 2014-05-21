<?php
namespace rekin\core;

use rekin\api\static_object;
use rekin\mvc\router;

class rekin extends static_object {

	private static $debuggable;
	public static $cache;
	public static $config;
	public static $path;

	public static function init ( $debuggable = null , $action = null ) {
		static::debuggable ( $debuggable );
		static::$cache = cache::getInstance ( );
		static::$config = config::getInstance ( );
		static::$path = new path ( );
		static::$config->loadFile ( "system.config.php" );
		if ( ! file_exists ( rekin::$config->get ( "default_log" ) ) ) {
			fopen ( rekin::$config->get ( "default_log" ) , "x+" );
		}
		router::parse ( );
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

	public static function gc ( ) {
		gc_enable();
		static::$cache->removeAll ( );
		gc_disable();
	}

}
