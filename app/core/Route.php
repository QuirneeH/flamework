<?php
namespace App\Core;

class Route
{
    public static function renderRoutes($controller, $method): void
    {
        $controllerNamespace = "App\\Controller\\{$controller}";

        $controllerInst = new $controllerNamespace;
        $controllerInst->$method((object) $_REQUEST);
    }
}
