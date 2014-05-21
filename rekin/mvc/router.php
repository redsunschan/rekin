<?php

namespace rekin\mvc;

use rekin\api\static_object;
use rekin\core\rekin;

class router extends static_object {

	public static function parse ( $url = null ) {
		$temp = explode ( "/" , $_SERVER [ "SCRIPT_NAME" ] );
		$temp = substr ( $temp [ count ( $temp ) - 1 ] , 0 , strlen ( $temp [ count ( $temp ) - 1 ] ) - 4 );
		rekin::$cache->add ( "module" , $temp );
		if ( isset ( $_GET [ "action" ] ) ) {
			foreach ( $_GET as $g ) {
				rekin::$cache->add ( array_search ( $g , $_GET ) , $g );
			}
		} elseif ( isset ( $_POST [ "action" ] ) ) {
			foreach ( $_POST as $p ) {
				rekin::$cache->add ( array_search ( $p , $_POST ) , $p );
			}
		} elseif ( $url !== null ) {
			if ( is_array ( $url ) ) {
				foreach ( $url as $u ) {
					rekin::$cache->add ( array_search ( $u , $url ) , $u );
				}
			} else {
				$set = explode ( "&" , $url );
				foreach ( $set as $s ) {
					$temp = explode ( "=" , $s );
					rekin::$cache->add ( array_search ( $temp [ 0 ] , $temp [ 1  ] ) );
				}
			}
		} elseif ( null === $url ) {
			rekin::$cache->add ( "action" , rekin::$config->get ( "default_action" ) );
		}
	}

}
