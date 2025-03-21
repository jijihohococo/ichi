<?php

require __DIR__.'/../vendor/autoload.php';


use JiJiHoHoCoCo\PHPENV\ENV;

use App\Kernel;

if(!file_exists(__DIR__.'/../.env')){
	
	throw new Exception("Please create .env file under your project folder", 1);
	
}

ENV::set(__DIR__.'/../.env');

session_start();
generateCSRFToken();
$kernel = new Kernel;
$kernel->run();