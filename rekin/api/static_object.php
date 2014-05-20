<?php
namespace rekin\api;

abstract class static_object {

	public static function init ( ) { }
	
	public final static function tag ( ) {
		return get_called_class ( );
	}
	
}

