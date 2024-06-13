<?php
namespace App\Controller;

class HomeController
{
    public function index($params)
    {
        View::render("home", "main", [
            "title" => "Inicio", 
            "params" => $params
        ]);
    }
}