<?php $this->layout("../template", ["title" => $title]); ?>

<!-- Styles CSS -->
<?php $this->unshift('styles') ?>
<link rel="stylesheet" href="public/css">
<?php $this->end() ?>
<!-- /Styles CSS -->

<!-- Titulo -->
<?php $this->start('title') ?>
<h1>Entrar</h1>
<?php $this->stop() ?>
<!-- /Titulo -->

<!-- Form -->
<?php $this->start('formLogin'); ?>
<form action="/authLogin" method="post">
    <div>
        <label for="">Email: </label>
        <input type="email" name="email" id="email">
    </div>
     
    <div>
        <label for="">Senha: </label>
        <input type="password" name="password" id="password">
    </div>
    
    <div>
        <button type="submit">Entrar</button>
    </div>
</form>
<!-- /Form -->

<!-- Mensagem de Erro -->
<?php
    if(!isset($_SESSION['messages']['error'])) {
        
    } else {
        print_r($_SESSION['messages']['error']);
    }
    
    $this->stop();
?>
<!-- /Mensagem de Erro -->