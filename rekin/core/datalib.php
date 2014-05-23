<?php
namespace rekin\core;

use rekin\api\object;

class datalib extends object {
	
	public $type;
	
	const mysql = 1;
	const php = 2;
	const xml = 3;
	const phparray = 4;
	
	protected function __construct ( ) {
		switch ( rekin::$config->get ( "datatype" ) ) {
			case "MySQL":
				$type = static::mysql;
				break;
			case "php":
				$type = static::php;
				break;
			case "phparray":
				$type = static::phparray;
				break;
			case "xml":
				$type = static::xml;
				break;
		}
	}
	
}
