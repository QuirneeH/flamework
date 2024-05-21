<?php
use App\Core\Route;

function getUri($index)
{
    return parse_url($_SERVER["REQUEST_URI"])[$index];
}

function getRequest()
{
    return strtolower($_SERVER["REQUEST_METHOD"]);
}

function redirectView(string $view, array $message = [])
{
    if(isset($message)) {
        $_SESSION['messages'] = $message;
    }

    header("Location: ". "{$view}");
}

function redirectBack($error = [])
{
    $_SESSION['messages'] = $error;
    header("Location: " . "{$_SESSION['redirect']['previous']}");
}

function registerUri()
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

function execute()
{
    $routes = require("routes/routes.php");
    $request = getRequest();
    $uri = getUri("path");
    
    $controller = ["controller" => $routes[$request][$uri][0], "method" => $routes[$request][$uri][1]];

    Route::renderRoutes($controller["controller"], $controller["method"]);
}