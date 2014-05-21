<?php
namespace rekin\api;

abstract class object {

	protected static $instance;

	public final static function tag ( ) {
		return get_called_class ( );
	}

	public final static function getInstance ( ) {
		if ( empty ( static::$instance ) ) {
			$n = get_called_class ( );
			static::$instance = new $n ( );
		}
		return static::$instance;
	}

}

