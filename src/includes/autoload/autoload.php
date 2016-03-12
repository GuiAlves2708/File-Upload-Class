<?php

define('SEPARATOR', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . SEPARATOR);

function __autoload($class) {
	$path = ROOT . 'classes' . SEPARATOR . $class . '.php';
	
	if (file_exists($path)) {
		require $path;
	} else {
		die('File not found in: ' . $path);
	}
}