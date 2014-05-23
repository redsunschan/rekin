<?php
namespace rekin\mvc;

use rekin\api\object;
use rekin\core\template;

abstract class model extends object {

	protected $data;

	abstract public function init ( );
	
	public function loadTemplate ( $template ) {
		require rekin::$path->template.rekin::$cache->get ( "module" ).$template;
		ob_start ( );
		rekin::$cache->add ( "ob_content" , ob_get_contents ( ) );
		ob_end_clean ( );
	}

}
