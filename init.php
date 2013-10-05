<?php
/**************
#     Core    #
**************/
define('DIR_ROOT', __DIR__);
define('DIR_LIB', DIR_ROOT.'/lib');
define('DIR_PAGES', DIR_ROOT.'/pages');
define('DIR_VIEWS', DIR_ROOT.'/views');
define('DIR_MODELS', DIR_ROOT.'/models');

/*******************
#     Controler    #
*******************/
define('HZ_CONTROLER_NAME_URI_KEY', 'c'); //Key of the uri component representing the Controler name
define('HZ_CONTROLER_NAME_DEFAULT_FALLBACK', 'index'); //Name of default controler
define('HZ_CONTROLER_ACTION_URI_KEY', 'a'); //Key of the uri component representing the Controler function name
define('HZ_CONTROLER_ACTION_DEFAULT_FALLBACK', 'default'); //Name of controler's default function


/**************
#   MongoDB   #
**************/
define('MONGO_URI', 'mongodb://localhost:27017/hzarcade');



/** Dependency Loader **/
require_once DIR_LIB.'/hz.static.php';
require_once DIR_LIB.'/io.static.php';
require_once DIR_LIB.'/loader.static.php';

require_once DIR_LIB.'/ifaces/iControler.interface.php';
