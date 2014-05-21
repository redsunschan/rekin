<?php
class rekinloader {

	public static function init ( ) {
		spl_autoload_register ( array ( get_called_class ( ) , "load" ) );
	}

	private static function load ( $classname ) {
		$path = "";
		chdir ( dirname ( __DIR__ ) );
		$patharray = explode ( "\\" , $classname );
		if ( $patharray [ 0 ] != "rekin" ) {//this loader only use in rekin php framework
			return false;
		}
		$i = 1;
		if ( count ( $patharray ) > 1 ) {
			while ( $i < count ( $patharray ) ) {		
				$path .= $patharray [ $i - 1 ]."/";
				$i++;
			}
			while ( $i == count ( $patharray ) ) {
				$path .= $patharray [ $i - 1 ].".php";
				require_once $path;
				break;
			}
		}
	}

}
