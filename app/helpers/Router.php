<?php
use App\Controller\View;
use App\Core\Route;

/** Obter a URI atual
 * @param string $type tipo do parametro
 * @return string URI atual
 */
function getUri(string $type): string
{
    return parse_url($_SERVER["REQUEST_URI"])[$type];
}

/** Obter o Método
 * @return string Metódo de Requisição ['get', 'post', 'put', 'delete']
 */
function getRequest(): string
{
    return strtolower($_SERVER["REQUEST_METHOD"]);
}

/** Redireciona para uma nova Rota existente
 * @param string $uri URI da Rota
 */
function redirect(string $uri): void
{
    header("Location: {$uri}");
}

/** Redireciona e imprime uma View
 * @param string $page Diretório da View
 * @param string $view Nome do Arquivo da View
 * @param array $info Dados redirecionados para View
 */
function redirectView(string $page, string $view, array $info = []): void
{
    View::render($page, $view, $info);
}

/** Redireciona para a URI anterior visualizada pelo Usuário
 * @param string $index Nome do indice
 * @param array $info Dados redirecionados para View
 */
function redirectBack(string $index = null, string $info): void
{
    if(!isset($index)) {
        
    } else {
        $_SESSION[$index] = $info;
    }

    header("Location: " . "{$_SESSION['redirect']['previous']}");
}

/** Registra a URI que o Usuário está visualizando
 */
function registerUri(): void
{
    $uri = getUri('path');

    if(!isset($_SESSION['redirect'])) {    
        $_SESSION['redirect'] = [
        'actual' => $uri,
        'previous' => ''
        ];
    } else {
        if($_SESSION['redirect']['actual'] != $uri) {
            $_SESSION['redirect'] = [
                'actual' => $uri,
                'previous' => $_SESSION['redirect']['actual']
            ];
        }
    }
}

/** Execulta o Controller da atual URI
 */
function execute(): void
{
    $routes = require("routes/routes.php");
    $request = getRequest();
    $uri = getUri("path");
    
    $controller = ["controller" => $routes[$request][$uri][0], "method" => $routes[$request][$uri][1]];

    Route::renderRoutes($controller["controller"], $controller["method"]);
}
