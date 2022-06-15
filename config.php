<?php
define ('WEB_TITLE','Projet Images V2');
define ('WEB_DIR_NAME','projet_imageV2');
define ('IMAGE_DIR_NAME','images');
define ('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/');
define ('IMAGE_DIR_URL', 'http://'. $_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/' );
define ('WEB_DIR_URL','http://'.$_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/');

define('THUMB_DIR_NAME', 'thumbnails');
define('THUMB_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/'. THUMB_DIR_NAME .'/');
define('THUMB_DIR_URL','http://'. $_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/'. THUMB_DIR_NAME .'/');
