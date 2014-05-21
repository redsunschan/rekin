<?php
namespace rekin;

use rekin\core\rekin;

class debugger {

	public static function info ( $tag , $msg ) {
		if ( rekin::debuggable ( ) ) {
			echo
"<div class=\"debug_info\">
	<h4>Rekin Debug [ INFO ]</h4>
	<p>".$msg."</p>
</div>
";
		}
	}

	public static function notice ( $errstr , $errfile , $errline ) {
		echo
"<div class=\"debug_notice\">
	<h4>Rekin Debug [ NOTICE ] ( From : ".$errfile." [  ] )</h4>
	
</div>
";
	}

	public static function warn ( $errstr , $errfile , $errline ) {

	}

	public static function error ( $errstr , $errfile , $errline ) {

	}

	private static function writeIn ( $errno , $errstr , $errfile , $errline ) {
		$logfile = "Rekin_Log_".date ( "Y_m_d" ).".txt";
		$content = null;
		switch ( $errno ) {
			case E_NOTICE:
				break;
			case E_USER_NOTICE:
				break;
			case E__WARNING:
				break;
			case E_USER_WARNING:
				break;
			case E_ERROR:
				break;
			case E_USER_ERROR:
				break;
		}
		if ( ! file_exists ( $logfile ) ) {
			fclose ( fopen ( $logfile , "x+" ) );
		}
		file_put_contents ( $logfile , $content );
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
