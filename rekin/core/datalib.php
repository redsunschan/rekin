<?php
namespace rekin\core;

use rekin\debugger;
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
				if ( rekin::$config->containKey ( "db_server" ) &&
					 rekin::$config->containKey ( "db_name" ) &&
					 rekin::$config->containKey ( "db_user" ) &&
					 rekin::$config->containKey ( "db_password" ) ) {
					     
				}
				break;
			case "php":
				$type = static::php;
				if ( ! file_exists ( rekin::$path->datalib."/phplib/" ) ) {
					mkdir ( rekin::$path->datalib."phplib/" );
				}
				break;
			case "phparray":
				$type = static::phparray;
				if ( ! file_exists ( rekin::$path->datalib."arraylib/" ) ) {
					mkdir ( rekin::$path->datalib."arraylib/" );
				}
				break;
			case "xml":
				$type = static::xml;
				if ( ! file_exists ( rekin::$path->datalib."xmllib/" ) ) {
					mkdir ( rekin::$path->datalib."xmllib/" );
				}
				break;
		}
		debugger::info ( $this->tag ( ) , "Data Library Defined To : ".$this->type );
	}
	
	//Still Designing and testing , PLEASE DONT USE!!!
	public function load ( $database , $name ) {
		
		switch ( $this->type ) {
			case mysql:
				rekin::$cache->add ( "db" , new PDO ( ) );
				break;
			case php:
				
				break;
			case phparray:
				rekin::$cache->set ( $name , require rekin::$path->datalib."phplib/".$database."/".$name );
				unlink ( rekin::$path->datalib."phplib/".$database."/".$name );
				return rekin::$cache->get ( $name );
				break;
			case xml:
				rekin::$cache->set ( "xmlreader" , simplexml_load_file ( rekin::$path->datalib."xmllib/".$database."/".$name ) );
				return rekin::$cache->get ( "xmlreader" );
				break;
		}
		
	}
	
}
