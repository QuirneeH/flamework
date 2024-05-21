<?php
return [
    "get" => [
        "/" => ["AuthController", "session"],
        "/Inicio" => ["HomeController", "index"],
        "/Login" => ["AuthController", "indexLogin"],
        "/Cadastrar" => ["AuthController", "indexRegister"],
    ],

    "post" => [
        "/authLogin" => ["AuthController", "validateLogin"],
        "/authRegister" => ["AuthController", "validateRegister"],
    ]
];
