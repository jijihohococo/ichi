<?php

use JiJiHoHoCoCo\IchiRoute\Router\Route;
function api(Route $route){

    $route->group(['url_group' => 'api', 'middleware' => 'JiJiHoHoCoCo\IchiRoute\Middleware\APIMiddleware' ], function(){
        $this->get('/', function(){
            return jsonResponse([
                'message' => 'Hello World'
            ]);
        });
    });
}