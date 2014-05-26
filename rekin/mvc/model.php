<?php
namespace rekin\mvc;

use rekin\api\object;
use rekin\core\rekin;
use rekin\api\hashmap;

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

	/**
	 * Template Function
	 */
	 
	public function url ( $url , $name = null ) {
		$temp = "<div class=\"rekin_url\"><A href=\"".$url."\">";
		if ( null === $name ) {
			$url .= $url."</A>";
		} else {
			$url .= $name."</A>";
		}
		$url .= "</div>";
		echo $temp;
		unset ( $temp );
	}
	
	public function ol ( $list ) {
		$temp = "<div class=\"rekin_ol\"><ol>";
		if ( is_array ( $list ) ) {
			foreach ( $list as $item ) {
				$temp .= "<li>".$item."</li>";
			}
		} elseif ( $list instanceof hashmap ) {
			foreach ( $list->getAll ( ) as $item ) {
				$temp .= "<li>".$item."</li>";
			}
		}
		$temp .= "</ol></div>";
		echo $temp;
		unset ( $temp );
	}

	public function ul ( $list ) {
		$temp = "<div class=\"rekin_ul\"><ul>";
		if ( is_array ( $list ) ) {
			foreach ( $list as $item ) {
				$temp .= "<li>".$item."</li>";
			}
		} elseif ( $list instanceof hashmap ) {
			foreach ( $list->getAll ( ) as $item ) {
				$temp .= "<li>".$item."</li>";
			}
		}
		$temp .= "</ul></div>";
		echo $temp;
		unset ( $temp );
	}

	public function table ( array $map ) {
		$temp = "<div class=\"rekin_table\"><table>";
		foreach ( $map as $item ) {
			$temp .= "<tr>";
			if ( is_array ( $item ) ) {
				foreach ( $item as $obj ) {
					$temp .= "<td>".$obj."</td>";
				}
			} elseif ( is_str ( $item ) ) {
				$temp .= "<td>".$item."</td>";
			}
			$temp .= "</tr>";
		}
		$temp .= "</table></div>";
		echo $temp;
		unset ( $temp );
	}

	public function img ( $src ) {
		$temp = "<img src=\"";
		
	}

}
