<?php
namespace App\Core;

class Route
{
    /** Instancia o Controller e execulta o Método referente a URI
     * @param string $controller Nome do Controller responsável pela Rota
     * @param string $method Nome do Método a ser executado
     * @param array $datas [ em azaline ]
     */
    public static function renderRoutes(string $controller, string $method, array $datas = []): void
    {
        $controllerNamespace = "App\\Controller\\{$controller}";

        $controllerInst = new $controllerNamespace;
        $controllerInst->$method((object) $_REQUEST);
    }
}
