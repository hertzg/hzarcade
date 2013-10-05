<?php
require_once '../init.php'; //Path to Bootstrap


$controlerName = IO::_GET(HZ_CONTROLER_NAME_URI_KEY, HZ_CONTROLER_NAME_DEFAULT_FALLBACK);

echo $controlerName;
