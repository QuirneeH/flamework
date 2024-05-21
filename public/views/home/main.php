<?php $this->layout('template', ["title" => $title]); ?>

<h1>Home</h1>
<h2>Olá <?= $_SESSION['messages']['name']; ?></h2>