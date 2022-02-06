<?php

require __DIR__.'/../vendor/autoload.php';


use JiJiHoHoCoCo\PHPENV\ENV;

use App\Kernel;

ENV::set(__DIR__.'/../.env');

$kernel=new Kernel;
$kernel->run();