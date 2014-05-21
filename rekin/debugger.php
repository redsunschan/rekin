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
	<p>Time : ".date ( "Y/m/d H:m:s" )."</p>
</div>
";
		}
	}

	public static function notice ( $errstr , $errfile , $errline ) {
		echo
"<div class=\"debug_notice\">
	<h4>Rekin Debug [ NOTICE ] ( From : ".$errfile." [ Line : ".$errline." ] )</h4>
	<p>".$errstr."</p>
	<p>Time : ".date ( "Y/m/d H:m:s" )."</p>
</div>
";
	}

	public static function warn ( $errstr , $errfile , $errline ) {
		echo
"<div class=\"debug_notice\">
	<h4>Rekin Debug [ WARNING ] ( From : ".$errfile." [ Line : ".$errline." ] )</h4>
	<p>".$errstr."</p>
	<p>Time : ".date ( "Y/m/d H:m:s" )."</p>
</div>
";
	}

	public static function error ( $errstr , $errfile , $errline ) {
		echo
"<div class=\"debug_notice\">
	<h4>Rekin Debug [ ERROR ] ( From : ".$errfile." [ Line : ".$errline." ] )</h4>
	<p>".$errstr."</p>
	<p>Time : ".date ( "Y/m/d H:m:s" )."</p>
</div>
";
	}

	private static function writeIn ( $errno , $errstr , $errfile , $errline ) {
		$logfile = rekin::$path->log."Rekin_Log_".date ( "Y_m_d" ).".txt";
		$content = null;
		switch ( $errno ) {
			case E_NOTICE:
				$content =
"#==================================================================================
# Rekin Debugger [ NOTICE ]
#==================================================================================
# Message : ".$errstr."
# From : ".$errfile." ( Line : ".$errline." )
# Time : ".date ( "Y/m/d H:m:s" )."
#==================================================================================
";
				break;
			case E_USER_NOTICE:
				$content =
"#==================================================================================
# Rekin Debugger [ NOTICE ]
#==================================================================================
# Message : ".$errstr."
# From : ".$errfile." ( Line : ".$errline." )
# Time : ".date ( "Y/m/d H:m:s" )."
#==================================================================================
";
				break;
			case E_WARNING:
				$content =
"***********************************************************************************
* Rekin Debugger [ WARNING ]
***********************************************************************************
* Message : ".$errstr."
* From : ".$errfile." ( Line : ".$errline." )
* Time : ".date ( "Y/m/d H:m:s" )."
***********************************************************************************
";
				break;
			case E_USER_WARNING:
				$content =
"***********************************************************************************
* Rekin Debugger [ WARNING ]
***********************************************************************************
* Message : ".$errstr."
* From : ".$errfile." ( Line : ".$errline." )
* Time : ".date ( "Y/m/d H:m:s" )."
***********************************************************************************
";
				break;
			case E_ERROR:
				$content =
"###################################################################################
# Rekin Debugger [ ERROR ]
###################################################################################
# Message : ".$errstr."
# From : ".$errfile." ( Line : ".$errline." )
# Time : ".date ( "Y/m/d H:m:s" )."
###################################################################################
";
				break;
			case E_USER_ERROR:
				$content =
"###################################################################################
# Rekin Debugger [ ERROR ]
###################################################################################
# Message : ".$errstr."
# From : ".$errfile." ( Line : ".$errline." )
# Time : ".date ( "Y/m/d H:m:s" )."
###################################################################################
";
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
				static::info ( $errfile." [ Line : ".$errline." ] " , $errstr );
				break;
		}
		static::writeIn ( $errno , $errstr , $errfile , $errline);
		exit ( );
	}

}
