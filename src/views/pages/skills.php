<?php $render('header'); ?>
<?php $render('header-menu'); ?>

<!-- MAIN -->
<main>
    <div class="header-skills">
        <h1 class="titulo">Matriz de competências</h1>
        <!--titulo -->
        <?= getFlash('success') ?>
        <?= getFlash('error') ?>
        <div class="header-botoes">
            <!--botões -->
            <button id="btn-add-skill"><a>ADD SKILL</a></button>
<<<<<<< HEAD
            <button type="submit" id="btn-edit-skill"><a>SALVAR</a></button>

=======
>>>>>>> 39a6561098536da0acb926afb3ee6ce2cb38beb0
        </div>
    </div>

    <!-- Tabela -->
    <table class="employeesTable">
        <thead>
            <tr>
                <th>NR</th>
                <th>NOME</th>
                <th>E-MAIL</th>
            </tr>
            <tr>
                <td><?= $actualEmployee['idEmployeer'] ?></td>
                <td><?= $actualEmployee['name'] ?></td>
                <td><?= $actualEmployee['email'] ?></td>
            </tr>
            <tr>
                <th>POSIÇÃO</th>
                <th>CARGO</th>
                <th>ÚLTIMA AVALIAÇÃO</th>
            </tr>
            <tr>
                <td>Curitiba</td>
                <td><?= $actualEmployee['position'] ?></td>
                <td><?= $actualEmployee['lastReview'] ?></td>
            </tr>
        </thead>
    </table>
    <table class="table2">
        <thead>
            <tr>
                <th>SKILLS</th>
                <th>NÍVEL</th>
                <th>PLANO DE DESENVOLVIMENTO</th>
<<<<<<< HEAD
                <th>Ações</th>
=======
                <th>AÇÕES</th>
>>>>>>> 39a6561098536da0acb926afb3ee6ce2cb38beb0
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skills as $key => $skill): ?>
                <tr>
                    <td id="name-skill" contenteditable="true"><?= $skill['name'] ?></td>
                    <td class="num">
                        <input type="number" name="level-skill" class="real" value="<?= $skill['level'] ?>" min="0"
                            max="10">
                    </td>
                    <td>
                        <textarea name="skill-description" id="skill-description"><?= $skill['description'] ?></textarea>
                    </td>
                    <td>
<<<<<<< HEAD
                        <button onclick="return confirm('Deseja realmente apagar essa skill?')" id="btn-delete-skill"><a
                                style="color: white;"
=======
                        <button id="btn-edit-skill"><a
                                href="<?= $base ?>/editSkill/<?= $skill['idSkill'] ?>">Editar</a></button>
                        <button id="btn-edit-skill"><a onclick="return confirm('Deseja realmente apagar essa skill')"
>>>>>>> 39a6561098536da0acb926afb3ee6ce2cb38beb0
                                href="<?= $base ?>/deleteSkill/<?= $skill['idSkill'] ?>">Excluir</a></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <!-- Modal -->
<<<<<<< HEAD
    <div style="display: none;" class="modal-skill" id="skillModal">
        <div class="modal-header">
            <h2>ADD SKILL AO FUNCIONÁRIO</h2>
            <button class="close-skill close-btn">&times;</button>
        </div>
        <form action="<?= $base ?>/createSkill" method="post">
            <div class="modal-body">
                <div class="input-group">
                    <label for="skillName">NOME DA SKILL</label>
                    <input type="text" name="name" id="skillName">
                </div>
                <div class="input-group">
                    <label for="skillLevel">NÍVEL DA SKILL</label>
                    <input type="number" name="level" id="skillLevel">
                </div>
                <div class="input-group">
                    <label for="developmentPlan">PLANO DE DESENVOLVIMENTO</label>
                    <textarea name="description" id="developmentPlan"></textarea>
                </div>
                <input type="hidden" name="idEmployeer" value="<?= $actualEmployee['idEmployeer'] ?>">
                <button type="submit" class="save-btn">SALVAR</button>
=======
    <?php if ($_SESSION['uri'] == 'editSkill'): ?>
        <div style="display: block;" class="modal-skill" id="skillModal">
            <div class="modal-header">
                <h2>EDITAR SKILL FUNCIONÁRIO</h2>
                <button class="close-skill close-btn">&times;</button>
>>>>>>> 39a6561098536da0acb926afb3ee6ce2cb38beb0
            </div>
            <form action="<?= $base ?>/createSkill" method="post">
                <div class="modal-body">
                    <div class="input-group">
                        <label for="skillName">NOME DA SKILL</label>
                        <input type="text" name="name" id="skillName" value="<?= $skill['name'] ?>">
                    </div>
                    <div class="input-group">
                        <label for="skillLevel">NÍVEL DA SKILL</label>
                        <input type="number" name="level" id="skillLevel" value="<?= $skill['level'] ?>">
                    </div>
                    <div class="input-group">
                        <label for="developmentPlan">PLANO DE DESENVOLVIMENTO</label>
                        <textarea name="description" id="developmentPlan"><?= $skill['description'] ?></textarea>
                    </div>
                    <input type="hidden" name="idEmployeer" value="<?= $actualEmployee['idEmployeer'] ?>">
                    <button type="submit" class="save-btn">SALVAR</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div style="display: none;" class="modal-skill" id="skillModal">
            <div class="modal-header">
                <h2>ADD SKILL AO FUNCIONÁRIO</h2>
                <button class="close-skill close-btn">&times;</button>
            </div>
            <form action="<?= $base ?>/createSkill" method="post">
                <div class="modal-body">
                    <div class="input-group">
                        <label for="skillName">NOME DA SKILL</label>
                        <input type="text" name="name" id="skillName">
                    </div>
                    <div class="input-group">
                        <label for="skillLevel">NÍVEL DA SKILL</label>
                        <input type="number" name="level" id="skillLevel">
                    </div>
                    <div class="input-group">
                        <label for="developmentPlan">PLANO DE DESENVOLVIMENTO</label>
                        <textarea name="description" id="developmentPlan"></textarea>
                    </div>
                    <input type="hidden" name="idEmployeer" value="<?= $actualEmployee['idEmployeer'] ?>">
                    <button type="submit" class="save-btn">SALVAR</button>
                </div>
            </form>
        </div>
    <?php endif ?>

</main>
<?php $render('footer'); ?>