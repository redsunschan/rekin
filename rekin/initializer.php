<?php
use rekin\core\rekin;
header ( "Content-Type: text/html; charset=utf-8" );
require "rekinloader.php";

rekinloader::init ( );

set_error_handler ( "\\rekin\\debugger::error_displayer" , E_ALL );
rekin::init ( true );
