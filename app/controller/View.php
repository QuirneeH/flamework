<?php
namespace App\Controller;

use League\Plates\Engine;

class View
{
    public static function render(string $page, string $view, array $datas = []): void
    {
        $templates = new Engine("public/views/{$page}");
        echo $templates->render($view, $datas);
    }
}
