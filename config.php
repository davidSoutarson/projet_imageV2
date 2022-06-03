<?php
define ('WEB_TITLE','Projet Images V2');
define ('WEB_DIR_NAME','projet_imageV2');
define ('IMAGE_DIR_NAME','images');
define ('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/');
define ('IMAGE_DIR_URL', 'http://'. $_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/' );
define ('WEB_DIR_URL','http://'.$_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/');

define('IMAGE_THUMB_NAME', 'thumbnails');
define('IMAGE_THUMB_PATH', $_SERVER['DOCUMENT_ROOT'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/'. IMAGE_THUMB_NAME .'/');
define('IMAGE_THUMB_URL','http://'. $_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/'. IMAGE_THUMB_NAME .'/');
