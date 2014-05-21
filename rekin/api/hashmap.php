<?php
namespace rekin\api;

class hashmap extends object {

	private $map;

	public function __construct ( ) {
		$this->map = array ( );
	}

	public function put ( $key , $value ) {
		$this->map [ $key ] = $value;
	}

	public function get ( $key ) {
		if ( isset ( $this->map [ $key ] ) ) {
			return $this->map [ $key ];
		}
	}

	public function getAll ( ) {
		return $this->map;
	}

	public function count ( ) {
		count ( $this->map );
	}

	public function containKey ( $key ) {
		if ( isset ( $this->map [ $key ] ) ) {
			return true;
		}
		return false;
	}

	public function containValue ( $value ) {
		foreach ( $this->map as $m ) {
			if ( $m === $value ) {
				return true;
			}
		}
		return false;
	}

	public function remove ( $key ) {
		if ( isset ( $this->map [ $key ] ) ) {
			unset ( $this->map [ $key ] );
		}
	}

	public function removeAll ( ) {
		unset ( $this->map );
		$this->map = array ( );
	}

}
