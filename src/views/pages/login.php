<?php $render('header'); ?>

<div class="container">
    <div class="box-imagem">
        <img src="<?= $base ?>/assets/images/login/imagem3.png" alt="imagem-formulario">
    </div>
    <div class="formulario">
        <form action="<?= $base ?>/login" method="post">
            <div class="form">
                <div class="title">
                    <h1>Faça seu login</h1>
                </div>
            </div>

            <div class="grupo-input">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="e-mail" placeholder="Digite seu e-mail" required>
            </div>

            <div class="grupo-input">
                <label for="password">Senha</label>
                <input type="password" name="password" id="Senha" placeholder="Digite sua senha" required>
            </div>
            <div class="grupo-input">
                <button type="submit"><a>Entrar</a></button>
            </div>
    </div>
    </form>
</div>