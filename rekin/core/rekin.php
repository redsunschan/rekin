<?php
namespace rekin\core;

use rekin\api\static_object;

class rekin extends static_object {

	private static $debuggable;
	private static $cache;
	private static $config;

	public static function init ( $debuggable = null , $action = null ) {
		static::debuggable ( $debuggable );
		static::$cache = cache::getInstance ( );
		static::$config = config::getInstance ( );
	}

	public static function debuggable ( $boolean = null ) {
		if ( null === $boolean ) {
			if ( static::$debuggable === true || self::$debuggable === false ) {
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