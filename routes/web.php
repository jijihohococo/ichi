<?php

function web($route){

	$route->get('/',function(){
		return view('index.php');
	});



}