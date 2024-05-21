<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <?=$this->section('styles')?>
</head>
<body>
    <?=$this->section('title')?>
    
    <div>
        <?=$this->section('formLogin')?>
    </div>

    <div>
        <?=$this->section('formRegister')?>
    </div>
</body>
</html>