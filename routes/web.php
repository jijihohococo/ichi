<?php

use JiJiHoHoCoCo\IchiRoute\Router\Route;
function web(Route $route){

	$route->get('/', function(){
		return view('index.php');
	});



}