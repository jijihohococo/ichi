<?php

namespace App;

use JiJiHoHoCoCo\IchiRoute\Router\Route;
use JiJiHoHoCoCo\IchiORM\Database\Connector;
use JiJiHoHoCoCo\IchiTemplate\Template\View;

require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/api.php';

class Kernel
{
    public array $autoloadMiddlewares = [
        'JiJiHoHoCoCo\IchiRoute\Middleware\CSRFMiddleware',
    ];

    public function run(): void
    {
        $connector = new Connector();

        $connector->createConnection('mysql', [
            'host'          => gete('DB_HOST'),
            'dbname'        => gete('DB_DATABASE'),
            'user_name'     => gete('DB_USERNAME'),
            'user_password' => gete('DB_PASSWORD'),
        ]);

        $connector->selectConnection(gete('DB_CONNECTION'));

        View::setPath(__DIR__ . '/../resources/views/');

        $route = new Route();
        $route->setKeyValue('mysql', $connector->getConnection());
        $route->setBaseControllerPath('App\Controllers');
        $route->setBaseMiddlewarePath('App\Middlewares');
        $route->setDefaultMiddlewares($this->autoloadMiddlewares);

        web($route);
        api($route);

        $route->run();
    }
}
