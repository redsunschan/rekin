<?php
namespace rekin\api;

abstract class register extends object {

	protected $map;
	
	abstract public function add ( $key , $value );

	abstract public function get ( $key );
	
	abstract public function remove ( $key );
	
	abstract public function removeAll ( );
	
	abstract public function containKey ( $key );
	
	abstract public function containValue ( $key );

	abstract public function size ( );

}
