<?php
use rekin\core\rekin;
require "rekin/initializer.php";

echo rekin::$cache->memoryInfo ( );

$query = "action=hi";

$set = explode ( "&" , $query );
