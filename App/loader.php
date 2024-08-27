<?php
	/*gets the host, the domain and the assets */
	/*output : http://localhost/mvc */
    define('public_folder','public');
    define('protocol', 'http://');
    define('domain', $_SERVER['HTTP_HOST']);
    define('assets', str_replace(public_folder, '', dirname($_SERVER['SCRIPT_NAME'])));
    define('url',protocol.domain.assets);
    define('www_root',$_SERVER['DOCUMENT_ROOT'].'/mvc/public');//this will get the root where the file folder is located in this case C:/xampp/htdocs/

	/* gets the root and the App directory */
	/* output : C:\xampp\htdocs\mvc
	\App\ */
	define('root', dirname(__DIR__) . DIRECTORY_SEPARATOR);
	define('app', root . 'App' . DIRECTORY_SEPARATOR);
	
	/* load classes and namespaces */
	spl_autoload_register(function($class){
		$root=dirname(__DIR__);
		$file=$root.'/'.str_replace('\\','/',$class).'.php';
		if(is_readable($file)){
			require $root.'/'.str_replace('\\','/',$class).'.php';
		}
	});