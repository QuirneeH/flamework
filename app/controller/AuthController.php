<?php
namespace App\Controller;

use App\Model\User;

class AuthController extends View
{
    public function session()
    {
        redirectView("auth/login", "main");
    }

    public function indexLogin()
    {
        View::render("auth/login", "main", ["title" => "Entrar"]);
    }

    public function validateLogin($datas)
    {
        if($datas->password == null || $datas->password == "") {
            redirectBack("error", "Senha em Branco");
        } else {
            $stmtUser = new User();
            $rows = $stmtUser->getUserByEmail($datas->email);
           
            $validatePassword = md5($datas->password);

            if($validatePassword == $rows->senha) {
                $_SESSION['session'] = $rows->id_usuario;

                $_SESSION['session'] = [
                    'name' => $rows->nickname
                ];

                redirect("/Inicio");
            } else {
                redirectBack("error", 'Email ou Senha Incorretos');
            }
        }
    }

    public function indexRegister()
    {
        View::render("auth/register", "main", ["title" => "Cadastro"]);
    }

    public function validateRegister($datas)
    {
        if($datas->name == null || $datas->email == null || $datas->password == null) {
            redirectBack("error", "Campos em Branco");
        } else {
            redirectView("/Inicio", "name", [$datas->name]);
        }
    }
}