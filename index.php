<?php
use rekin\core\rekin;
require "rekin/initializer";

rekin::init ( );
echo rekin::$cache->usedMemory ( );

