<?php
namespace rekin\mvc;

use rekin\api\object;
use rekin\core\rekin;

abstract class model extends object {

	protected $data;

	public function __construct ( ) {
		ob_start ( );
		$this->loadTemplate ( "common/header" );
		echo "<body>";
	}

	abstract public function init ( );

	public function loadTemplate ( $template ) {
		if ( is_array ( $template ) ) {
			foreach ( $template as $t ) {
				$temp = explode ( "/" , $t );
				if ( count ( $temp ) === 1 ) {
					require rekin::$path->template.rekin::$cache->get ( "module" )."/".$t [ 0 ].".php";
				} else {
					require rekin::$path->template.$t.".php";
				}
			}
		} else {
			$temp = explode ( "/" , $template );
			if ( count ( $temp ) === 1 ) {
				require rekin::$path->template.rekin::$cache->get ( "module" )."/".$template.".php";
			} else {
				require rekin::$path->template.$template.".php";
			}
		}
	}

	public function render ( ) {
		echo "</body>";
		$this->loadTemplate ( "common/footer" );
		rekin::$cache->add ( "ob_content" , ob_get_contents ( ) );
		ob_end_clean ( );
		echo rekin::$cache->get ( "ob_content" );
	}

}
