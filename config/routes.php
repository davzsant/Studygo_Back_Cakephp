<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->connect('/',['controller' => 'Home','action' => 'index']);

    $routes->scope("/user",function (RouteBuilder $routes){
        $routes->get("/",["controller" => "User","action"=> "index"]);
        $routes->get("/register",["controller" => "User",'action' => "register"]);
    });

    $routes->scope("/aula",function (RouteBuilder $routes){
        $routes->get("/",['controller' => "Aula","action"=> "index"]);
    });

    $routes->prefix('api',function(RouteBuilder $routes){
        $routes->fallbacks(DashedRoute::class);
    });


    $routes->fallbacks();
};
