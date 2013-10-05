<pre><?php
require_once '../init.php'; //Path to Bootstrap

$controlerName = IO::_GET(HZ_CONTROLER_NAME_URI_KEY, HZ_CONTROLER_NAME_DEFAULT_FALLBACK);
$actionName = IO::_GET(HZ_CONTROLER_ACTION_URI_KEY, HZ_CONTROLER_ACTION_DEFAULT_FALLBACK);

$controlerLoaded = LOADER::loadPage($controlerName);
if(!$controlerLoaded) {
    die("404 Not Found!");
}


