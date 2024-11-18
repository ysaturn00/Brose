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
            <button><a href="">SALVAR</a></button>
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
            </tr>
            <tr>
                <td>REQUISITOS LEGAIS APLICAVEIS</td>
                <td class="num"><input type="number" class="real" value="1" min="0" max="10"
                        onchange="calculateProgress()"></td>
                <td><textarea name="text" id="text-area"></textarea></td>
            </tr>
            <tr>
                <td>LSS CONHECIMENTOS GERAIS - WHITE BELT</td>
                <td class="num"><input type="number" class="real" value="1" min="0" max="10"
                        onchange="calculateProgress()"></td>
                <td><textarea name="text" id="text-area"></textarea></td>
            </tr>
            <tr>
                <td>LIDERANÇA</td>
                <td class="num"><input type="number" class="real" value="1" min="0" max="10"
                        onchange="calculateProgress()"></td>
                <td><textarea name="text" id="text-area"></textarea></td>
            </tr>
            <tr>
                <td>TREINAMENTO PROBLEM SOLVING</td>
                <td class="num"><input type="number" class="real" value="1" min="0" max="10"
                        onchange="calculateProgress()"></td>
                <td><textarea name="text" id="text-area"></textarea></td>
            </tr>
        </thead>
    </table>

    <!-- Modal -->
    <div style="display: none;" class="modal-skill" id="skillModal">
        <div class="modal-header">
            <h2>ADD SKILL AO FUNCIONÁRIO</h2>
            <button class="close close-btn">&times;</button>
        </div>
        <form action="<?= $base ?>/createSkill" method="post">
            <div class="modal-body">
                <div class="input-group">
                    <label for="skillName">NOME DA SKILL</label>
                    <input type="text" name="name" id="skillName">
                </div>
                <div class="input-group">
                    <label for="skillLevel">NÍVEL DA SKILL</label>
                    <input type="text" name="level" id="skillLevel">
                </div>
                <div class="input-group">
                    <label for="developmentPlan">PLANO DE DESENVOLVIMENTO</label>
                    <textarea name="developmentPlan" name="description" id="developmentPlan"></textarea>
                </div>
                <button type="submit" class="save-btn">SALVAR</button>
            </div>
        </form>
    </div>

</main>
<?php $render('footer'); ?>