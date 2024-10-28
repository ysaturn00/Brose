<?php $render('header'); ?>

<h2>Acionar novo usúario</h2>

<form action="<?=$base?>/usuario/<?=$usuarios['id']?>/editar" method="post">
    <label for="name ">Name: </label><br>
    <input type="text" name="name" id="name" value="<?=$usuarios['nome']?>"><br><br>

    <label for="email">E-mail: </label><br>
    <input type="email" name="email" id="email" value="<?=$usuarios['email']?>"><br><br>

    <input type="submit" value="Salvar">
</form>

<?php $render('footer') ?>