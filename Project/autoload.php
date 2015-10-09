<?php

defined('DS') || define('DS', DIRECTORY_SEPARATOR);

/**
 * Cared_DB_Connection
 * Cared/DB/Connection.php
 */
function my_autoload($className){
	
	$className = str_replace('_', DS, $className);
	$pathClass = $className . ".php";
	
	require_once $pathClass;
}

spl_autoload_register('my_autoload');