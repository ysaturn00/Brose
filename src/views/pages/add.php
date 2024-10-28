<?php $render('header'); ?>

<h2>Acionar novo usúario</h2>

<form action="<?=$base?>/novo" method="post">
    <label for="name ">Name: </label><br>
    <input type="text" name="name" id="name"><br><br>

    <label for="email">E-mail: </label><br>
    <input type="email" name="email" id="email"><br><br>

    <input type="submit" value="Adicionar">
</form>

<?php $render('footer') ?>