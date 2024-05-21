<?php
namespace App\Controller;

use App\Model\User;

class AuthController extends View
{
    public function session()
    {
        redirectView("/Login");
    }

    public function indexLogin()
    {
        $this->view("auth/login", "main", ["title" => "Entrar"]);
    }

    public function indexRegister()
    {
        $this->view("auth/register", "main", ["title" => "Cadastro"]);
    }

    public function validateLogin($datas)
    {
        if($datas->password == null || $datas->password == "") {
            redirectBack(["error" => "Senha em Branco"]);
        } else {
            redirectView("/Inicio");
        }
    }

    public function validateRegister($datas)
    {
        if($datas->name == null || $datas->email == null || $datas->password == null) {
            redirectBack(["error" => "Campos em Branco"]);
        } else {
            redirectView("/Inicio", ["name" => $datas->name]);
        }
    }
}