<?php
namespace App\Controller;

class HomeController extends View
{
    public function index($params)
    {
        $this->view("home", "main", [
            "title" => "Inicio", 
            "params" => $params
        ]);
    }
}