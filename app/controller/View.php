<?php
namespace App\Controller;

use League\Plates\Engine;

abstract class View
{
    public function view(string $page, string $view, array $datas = []): void
    {
        $diretoryView = "public/views/{$page}";
        
        $templates = new Engine($diretoryView);
        echo $templates->render($view, $datas);
    }
}
