<?php $render('header'); ?>
<?php $render('header-menu'); ?>

<!-- MAIN -->
<main>
    <div class="header-skills">
        <h1 class="titulo">Lista de Funcionários</h1>
        <!--titulo -->
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
        <tbody id="employees"></tbody>
    </table>

    <!-- Employee Form Modal -->
    <div id="modal-employee" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="formTitle">Cadastrar Funcionário</h2>
            <br>
            <form id="form-employee" action="<?= $base ?>/create" method="POST">
                <input type="hidden" id="employeeId" />

                <label for="employeeName">Nome:</label>
                <input type="text" name="name" id="name-employee" required />
                <br>
                <br>

                <label for="employeeRole">Cargo:</label>
                <select name="role" id="employeeRole" required>
                    <option value="Operador">OPERADOR DE PRODUÇÃO</option>
                </select>
                <br>
                <br>

                <label for="employeeDepartment">Departamento:</label>
                <select name="department" id="employeeDepartment" required>
                    <option value="RH">RH</option>
                </select>
                <br>
                <br>

                <label for="email">E-mail:</label>
                <input name="email" type="email" id="employeeEmail" required />
                <br>
                <br>

                <label for="lastReview">Última Avaliação:</label>
                <input name="lastReview" id="employeeultimaAvaliacao" required />

                <br>
                <br>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
    </div>

    <!-- Modal de Visualização do Funcionário -->
    <div id="viewEmployeeModal" class="modal">
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