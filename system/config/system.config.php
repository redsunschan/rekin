<?php
return array (
	"default_log" => rekin\core\rekin::$path->log."Rekin_Log_".date ( "Y_m_d" ).".txt",
	"default_action" => "home",
	"data_type" => "php" // 1) MySQL , 2) php ( data class ) , 3) XML , 4) array ( PHP Array )
);
