<?php
namespace rekin;

use rekin\core\rekin;

class debugger {

	public static function info ( $tag , $msg ) {
		if ( rekin::debuggable ( ) ) {
			echo
"<div class=\"debug_info\">
	<h4>Rekin Debug</h4>
</div>
";
		}
	}

	public static function notice ( $errstr , $errfile , $errline ) {

	}

	public static function warn ( $errstr , $errfile , $errline ) {

	}

	public static function error ( $errstr , $errfile , $errline ) {

	}

	private static function writeIn ( $errno , $errstr , $errfile , $errline ) {

	}

	public static function error_displayer ( $errno , $errstr , $errfile , $errline ) {
		switch ( $errno ) {
			case E_ERROR:
				static::error ( $errstr , $errfile , $errline );
				break;
			case E_NOTICE:
				static::notice ( $errstr , $errfile , $errline );
				break;
			case E_WARNING:
				static::warn ( $errstr , $errfile , $errline );
				break;
			case E_USER_ERROR:
				static::error ( $errstr , $errfile , $errline );
				break;
			case E_USER_NOTICE:
				static::notice ( $errstr , $errfile , $errline );
				break;
			case E_USER_WARNING:
				static::warn ( $errstr , $errfile , $errline );
				break;
			default:

				break;
		}
		static::writeIn ( $errno , $errstr , $errfile , $errline);
		exit ( );
	}

}
