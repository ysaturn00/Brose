<?php $render('header'); ?>

<a href="<?=$base?>/novo"> Novo Usuário</a>

<table border="1" width='100%'>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>E-MAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($usuarios as $usuario):?>
    <tr>

        <td><?=$usuario['id']?></td>
        <td><?=$usuario['nome']?></td>
        <td><?=$usuario['email']?></td>


        <td>
            <a href="<?=$base?>/usuario/<?=$usuario['id']?>/editar"><img src="<?=$base?>/assets/images/edit.png"
                    alt="edit"></a>
            <a href="<?=$base?>/usuario/<?=$usuario['id']?>/deletar"
                onclick="return confirm('Tem certeza que deseja excluir?')"><img
                    src="<?=$base?>/assets/images/trash.png" alt="delete"></a>
        </td>
    </tr>
    <?php endforeach?>
</table>

<?php $render('footer') ?>