<?php
namespace rekin\core;

use rekin\api\register;
use rekin\api\hashmap;

class cache extends register {

	public function __construct ( ) {
		$this->map = new hashmap ( );
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


	public function usedMemory ( ) {
		return "<p>".$this->memoryUsage ( false )."/".$this->memoryUsage ( true )."</p>";
	}

	private function memoryUsage ( $realusage = false ) {
		$size = memory_get_usage ( $realusage );
		$unit = array ( "b" , "kb" , "mb" , "gb" , "tb" , "pb" );
		$result = @round ( $size / pow ( 1024 , ( $i = floor ( log ( $size , 1024 ) ) ) ) , 2 )." ".$unit [ $i ];
		return $result;
	}

}
