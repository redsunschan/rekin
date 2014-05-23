<?php
namespace rekin\core;

use rekin\api\register;
use rekin\api\hashmap;
use rekin\debugger;

class config extends register {

	private $map;

	protected function __construct ( ) {
		$this->map = new hashmap ( );
	}

	public function loadFile ( $file ) {
		if ( is_array ( $file ) ) {
			foreach ( $file as $f ) {
				$this->loadFromSet ( require rekin::$path->config.$f );
			}
		} elseif ( $file instanceof hashmap ) {
			$temp = $file->getAll ( );
			foreach ( $temp as $f ) {
				$this->loadFromSet ( require rekin::$path->config.$f );
			}
			unset ( $temp );
		} else {
			$this->loadFromSet ( require rekin::$path->config.$file );
		}
	}

	public function loadFromSet ( $set ) {
		if ( $set instanceof hashmap ) {
			$temp = $set->getAll ( );
			foreach ( $temp as $item ) {
				$this->add ( array_search ( $item , $temp ) , $item );
			}
			unset ( $temp );
		} elseif ( is_array ( $set ) ) {
			foreach ( $set as $item ) {
				$this->add ( array_search ( $item , $set ) , $item );
			}
		}
	}

	public function add ( $key , $value ) {
		$this->map->put ( $key , $value );
		debugger::info ( $this->tag ( ) , "Added Config ".$key." [ Value : ".$this->map->get ( $key )." ]" );
	}

	public function get ( $key ) {
		if ( $this->map->containKey ( $key ) ) {
			return $this->map->get ( $key );
		}
	}

	public function remove ( $key ) {
		if ( $this->map->containKey ( $key ) ) {
			return $this->map->remove ( $key );
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
