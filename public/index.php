<?php
// Define la ruta al directorio de la aplicación
	defined('APPLICATION_PATH')
		|| define('APPLICATION_PATH',
			realpath(dirname(__FILE__) . '/../application'));
	
// Define el entorno de la aplicación
	defined('APPLICATION_ENV')
		|| define('APPLICATION_ENV',
			(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
										: 'production'));
	
// Typically, you will also want to add your library/ directory
// to the include_path, particularly if it contains your ZF installed
set_include_path(implode(PATH_SEPARATOR, array(
				dirname(dirname(__FILE__)) . '/library',
				get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Crea la aplicación, el bootstrap, y lo ejecuta
$application = new Zend_Application(
			APPLICATION_ENV,
			APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()
			->run();