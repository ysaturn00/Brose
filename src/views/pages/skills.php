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
            <button id="generatePDFSkill">EXPORTAR</button>

        </div>
    </div>

    <!-- Tabela -->
    <table class="employeesTable" id="employeesTable">
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
    <table id="skillsTable" class="table2">
        <thead>
            <tr>
                <th>SKILLS</th>
                <th>NÍVEL</th>
                <th>PLANO DE DESENVOLVIMENTO</th>
                <th>Ações</th>
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
                    <!-- <button onclick="return confirm('Deseja realmente apagar essa skill?')" id="btn-delete-skill"><a
                                style="color: white;"
                                href="<?= $base ?>/deleteSkill/<?= $skill['idSkill'] ?>">Excluir</a></button> -->

                    <a onclick="return confirm('Deseja realmente apagar esse usúario?')"
                        href="<?= $base ?>/deleteSkill/<?= $skill['idSkill'] ?>">
                        <button id="btn-delete">Excluir</button>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <!-- Modal edit skill -->
    <?php if ($_SESSION['uri'] == 'edit'): ?>
    <div style="display: block;" class="modal-skill" id="skillModal">
        <div class="modal-header">
            <h2>EDITAR SKILL FUNCIONÁRIO</h2>
            <button class="close-skill close-btn">&times;</button>
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
                <input type="hidden" name="idSkill" value="<?= $actualEmployee['idSkill'] ?>">
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