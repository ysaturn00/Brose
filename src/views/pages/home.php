<?php $render('header'); ?>
<?php $render('header-menu'); ?>

<!-- MAIN -->
<main>
    <div class="header-skills">
        <h1 class="titulo">Lista de Funcionários</h1>
        <!--titulo -->
        <?= getFlash('success') ?>
        <?= getFlash('error') ?>
        <div class="header-botoes">
            <!--botões -->
            <button id="btn-add-employee">ADD FUNCIONÁRIOS</a></button>
            <button id="btn-add-department"><a>ADD DEPARTAMENTOS</a></button>
            <button id="btn-add-position"><a>ADD CARGO</a></button>
        </div>
    </div>
    <table id="employeesTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>E-mail</th>
                <th>Última Avaliação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $key => $employee): ?>
            <tr>
                <td class="employee-name"><?= $employee['name'] ?></td>
                <td class="employee-role"><?= $employee['position'] ?></td>
                <td class="employee-department"><?= $employee['department'] ?></td>
                <td class="employee-email"><?= $employee['email'] ?></td>
                <td class="employee-ultimaAvaliacao"><?= $employee['lastReview'] ?></td>
                <td>
                    <a href="<?= $base ?>/skills/<?= $employee['idEmployeer'] ?>">
                        <button id="btn-seeMore">Ver</button>
                    </a>

                    <a href="<?= $base ?>/edit/<?= $employee['idEmployeer'] ?>">
                        <button id="btn-edit">Editar</button>
                    </a>

                    <a onclick="return confirm('Deseja realmente apagar esse usúario?')"
                        href="<?= $base ?>/delete/<?= $employee['idEmployeer'] ?>">
                        <button id="btn-delete">Excluir</button>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <!-- Employee Form Modal -->
    <?php if ($_SESSION['uri'] == 'edit'): ?>
    <div style="display: block;" id="modal-employee" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="formTitle">Editar Funcionário</h2>
            <br>
            <form id="form-employee"
                action="<?= $base ?>/editEmployee/<?= isset($actualEmployee) ? $actualEmployee['idEmployeer'] : '' ?>"
                method="POST">
                <input type="hidden" id="employeeId" />

                <label for="employeeName">Nome:</label>
                <input type="text" name="name" id="name-employee"
                    value="<?= isset($actualEmployee) ? $actualEmployee['name'] : '' ?>" />
                <br>
                <br>

                <label for="employeeRole">Cargo:</label>
                <select name="role" id="employeeRole">
                    <option value="">Selecione</option>
                    <?php foreach ($positions as $key => $position): ?>
                    <option value="<?= $position['idPosition'] ?>"
                        <?php print($position['idPosition'] == $actualEmployee['idPosition'] ? ' selected="selected" ' : ''); ?>>
                        <?= $position['name'] ?> </option>
                    <?php endforeach; ?>
                </select>

                <br>
                <br>

                <label for="employeeDepartment">Departamento:</label>
                <select name="department" id="employeeDepartment">
                    <option value="">Selecione</option>
                    <?php foreach ($departments as $key => $department): ?>
                    <option value="<?= $department['idDepartment'] ?>"
                        <?php print($department['idDepartment'] == $actualEmployee['idDepartment'] ? ' selected="selected" ' : ''); ?>>
                        <?= $department['name'] ?> </option>
                    <?php endforeach; ?>
                </select>

                <br>
                <br>

                <label for="email">E-mail:</label>
                <input name="email" type="email" id="employeeEmail"
                    value="<?= isset($actualEmployee) ? $actualEmployee['email'] : '' ?>" />
                <br>
                <br>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <div style="display: none;" id="modal-employee" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="formTitle">Cadastrar Funcionário</h2>
            <br>
            <form id="form-employee" action="<?= $base ?>/createEmployee" method="POST">
                <input type="hidden" id="employeeId" />

                <label for="employeeName">Nome:</label>
                <input type="text" name="name" id="name-employee" />
                <br>
                <br>

                <label for="employeeRole">Cargo:</label>
                <select name="role" id="employeeRole">
                    <option value="">Selecione</option>
                    <?php foreach ($positions as $key => $position): ?>
                    <option value="<?= $position['idPosition'] ?>"> <?= $position['name'] ?> </option>
                    <?php endforeach; ?>
                </select>

                <br>
                <br>

                <label for="employeeDepartment">Departamento:</label>
                <select name="department" id="employeeDepartment">
                    <option value="">Selecione</option>
                    <?php foreach ($departments as $key => $department): ?>
                    <option value="<?= $department['idDepartment'] ?>"> <?= $department['name'] ?> </option>
                    <?php endforeach; ?>
                </select>

                <br>
                <br>

                <label for="email">E-mail:</label>
                <input name="email" type="email" id="employeeEmail" />
                <br>
                <br>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
    <?php endif ?>

    <!-- Modal adicionar departamento-->
    <div style="display: none;" id="modal-departament" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="formTitle">Adicionar departamento</h2>
            <br>
            <form id="form-departament" action="<?= $base ?>/createDepartment" method="POST">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" />
                <br>
                <br>

                <label for="description">Descrição:</label>
                <textarea name="description" id="description"></textarea>
                <br>
                <br>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <!-- Modal adicionar cargo -->
    <div style="display: none;" id="modal-position" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="formTitle">Adicionar cargo</h2>
            <br>
            <form id="form-employee" action="<?= $base ?>/createPosition" method="POST">
                <input type="hidden" id="employeeId" />

                <label for="employeeCargo">Nome do cargo:</label>
                <input type="text" name="name" id="name-position" />
                <br>
                <br>

                <label for="description">Descrição:</label>
                <textarea name="description" id="description"></textarea>
                <br>
                <br>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <!-- Modal de Visualização do Funcionário -->
    <div style="display: none;" id="viewEmployeeModal" class="modal">
        <div class="viewmodal-content">
            <span class="close" onclick="closeViewEmployee()">&times;</span>
            <h2 style="color: black;">Detalhes do Funcionário</h2>
            <p><strong>Nome:</strong> <span id="viewEmployeeName"></span></p>
            <p><strong>Cargo:</strong> <span id="viewEmployeeRole"></span></p>
            <p><strong>Departamento:</strong> <span id="viewEmployeeDepartment"></span></p>
            <p><strong>Email:</strong> <span id="viewEmployeeEmail"></span></p>
            <p><strong>Última Avaliação:</strong> <span id="viewEmployeeultimaAvaliacao"></span></p>
        </div>
    </div>

    <script src="script.js"></script>
</main>

<?php $render('footer') ?>