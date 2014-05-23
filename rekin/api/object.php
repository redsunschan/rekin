<?php
namespace rekin\api;

abstract class object {

	protected static $instance;

	public function __toString ( ) {
		return get_called_class ( );
	}

	public final static function tag ( ) {
		return get_called_class ( );
	}

	public final static function getInstance ( ) {
		$n = get_called_class ( );
		if ( ! static::$instance instanceof $n ) {
			static::$instance = new $n ( );
		}
		unset ( $n );
		return static::$instance;
	}

}

