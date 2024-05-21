<?php $this->layout("../template", ["title" => $title]); ?>

<!-- Styles CSS -->
<?php $this->unshift('styles') ?>
<link rel="stylesheet" href="public/css">
<?php $this->end() ?>
<!-- /Styles CSS -->

<!-- Titulo -->
<?php $this->start('title') ?>
<h1>Cadastro</h1>
<?php $this->stop() ?>
<!-- /Titulo -->

<!-- Form -->
<?php $this->start('formRegister'); ?>
<form action="/authRegister" method="post">
    <div>
        <label for="name">Nome: </label>
        <input type="name" name="name" id="name">
    </div>

    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
    </div>
     
    <div>
        <label for="password">Senha: </label>
        <input type="password" name="password" id="password">
    </div>
    
    <div>
        <button type="submit">Cadastrar</button>
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