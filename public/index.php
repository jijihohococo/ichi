<?php

require __DIR__.'/../vendor/autoload.php';


use JiJiHoHoCoCo\PHPENV\ENV;

use App\Kernel;

ENV::set(__DIR__.'/../.env');

session_start();
generateCSRFToken();
$kernel=new Kernel;
$kernel->run();