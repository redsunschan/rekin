<?php
use rekin\core\rekin;
require "rekin/initializer.php";

rekin::init ( );
echo rekin::$cache->usedMemory ( );

