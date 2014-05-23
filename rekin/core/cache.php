<?php
namespace rekin\core;

use rekin\api\register;
use rekin\debugger;
use rekin\api\hashmap;

class cache extends register {

	private $map;

	protected function __construct ( ) {
		$this->map = new hashmap ( );
	}

	public function add ( $key , $value ) {
		$this->map->put ( $key , $value );
		debugger::info ( $this->tag ( ) , "Added Cache ".$key." [ Value : ".$this->map->get ( $key )." ]" );
	}

	public function get ( $key ) {
		if ( $this->map->containKey ( $key ) ) {
			return $this->map->get ( $key );
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

	public function memoryInfo ( ) {
		return "<p>".$this->usedMemory ( )." ( ".$this->usedMemoryPercent ( )." )</p>";
	}

	public function usedMemory ( ) {
		return $this->memoryUsage ( false )." / ".$this->memoryUsage ( true );
	}

	public function usedMemoryPercent ( ) {
		return @round ( ( memory_get_usage ( false ) / memory_get_usage ( true ) ) * 100 , 2 )."%";
	}

	private function memoryUsage ( $realusage = false ) {
		$size = memory_get_usage ( $realusage );
		$unit = array ( "B" , "KB" , "MB" , "GB" , "TB" , "PB" );
		$result = @round ( $size / pow ( 1024 , ( $i = floor ( log ( $size , 1024 ) ) ) ) , 2 )." ".$unit [ $i ];
		return $result;
	}

}
