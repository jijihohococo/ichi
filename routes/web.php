<?php

use JiJiHoHoCoCo\IchiRoute\Router\Route;

function web(Route $route): void
{
    $route->get('/', function () {
        return view('index.php');
    });
}
