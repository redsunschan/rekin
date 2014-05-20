<?php
namespace rekin\core;

use rekin\api\register;
use rekin\api\hashmap;

class config extends register {

	public function __construct ( ) {
		$this->map = new hashmap ( );
	}

	public function loadFromSet ( $set ) {
		if ( $set instanceof hashmap ) {
			$temp = $set->getAll ( );
			foreach ( $temp as $item ) {
				$this->add ( array_search ( $item , $temp ) , $item );
			}
		}
	}

	public function add ( $key , $value ) {
		$this->map->put ( $key , $value );
	}

	public function get ( $key ) {
		if ( $this->map->containKey ( $key ) ) {
			$this->map->get ( $key );
		}
	}

	public function remove ( $key ) {
		if ( $this->map->containKey ( $key ) ) {
			$this->map->remove ( $key );
		}
	}

	public function removeAll ( ) {
		if ( $this->map instanceof hashmap && $this->map->count ( ) > 0 ) {
			$this->map->removeAll ( );
		}
	}

	public function containKey ( $key ) {
		return $this->map->containKey ( $key );
	}

	public function containValue ( $key ) {
		return $this->map->containValue ( $key );
	}

	public function size ( ) {
		return $this->map->count ( );
	}


}
