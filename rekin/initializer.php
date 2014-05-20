<?php
header ( "Content-Type: text/html; charset=utf-8" );
require "rekinloader.php";

rekinloader::init ( );
set_error_handler ( "\\rekin\\core\\Debugger::error_displayer" , E_ALL );
