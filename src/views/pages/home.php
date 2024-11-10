<?php $render('header'); ?>
<?php $render('header-menu'); ?>

<!-- Main Content -->
<section id="employeeList">
    <div class="header-employee">
        <h2 class="titulo">Lista de Funcionários</h2>
        <button onclick="openEmployeeForm()">Add Employee</button>
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
</section>

<!-- Employee Form Modal -->
<div id="employeeFormModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEmployeeForm()">&times;</span>
        <h2 id="formTitle">Cadastrar Funcionário</h2>
        <br>
        <form id="employeeForm" onsubmit="submitForm(event)">
            <input type="hidden" id="employeeId" />

            <label for="employeeName">Nome:</label>
            <input type="text" id="employeeName" required />
            <br>
            <br>

            <label for="employeeRole">Cargo:</label>
            <select id="employeeRole" required>
                <option value="Operador">OPERADOR DE PRODUÇÃO</option>
                <option value="AuxiliarProducao">AUXILIAR DE PRODUÇÃO</option>
                <option value="AnalistaQualidadeJR">ANALISTA DA QUALIDADE JR</option>
                <option value="AnalistaQualidadePL">ANALISTA DA QUALIDADE PL</option>
                <option value="AnalistaQualidadeSR">ANALISTA DA QUALIDADE SR</option>
                <option value="AnalistaTecInfoJR">ANALISTA DA TECNOLOGIA DA INFORMAÇÃO JR</option>
                <option value="AnalistaTecInfoPL">ANALISTA DA TECNOLOGIA DA INFORMAÇÃO PL</option>
                <option value="AnalistaTecInfoSR">ANALISTA DA TECNOLOGIA DA INFORMAÇÃO SR</option>
                <option value="AnalistaFinanceiroJR">ANALISTA FINANCEIRO JR</option>
                <option value="AnalistaFinanceiroPL">ANALISTA FINANCEIRO PL</option>
                <option value="AnalistaFinanceiroSR">ANALISTA FINANCEIRO SR</option>
                <option value="AnalistaComprasJR">ANALISTA COMPRAS JR</option>
                <option value="AnalistaComprasPL">ANALISTA COMPRAS PL</option>
                <option value="AnalistaComprasSR">ANALISTA COMPRAS SR</option>
                <option value="AnalistaControladoriaJR">ANALISTA CONTROLADORIA JR</option>
                <option value="AnalistaControladoriaPL">ANALISTA CONTROLADORIA PL</option>
                <option value="AnalistaControladoriaSR">ANALISTA CONTROLADORIA SR</option>
                <option value="AnalistaLogisticaJR">ANALISTA DE LOGISTÍCA JR</option>
                <option value="AnalistaLogisticaPL">ANALISTA DE LOGISTÍCA PL</option>
                <option value="AnalistaLogisticaSR">ANALISTA DE LOGISTÍCA SR</option>
                <option value="AnalistaManufaturaJR">ANALISTA DE MANUFATURA JR</option>
                <option value="AnalistaManufaturaPL">ANALISTA DE MANUFATURA PL</option>
                <option value="AnalistaManufaturaSR">ANALISTA DE MANUFATURA SR</option>
                <option value="EngenheiroProjetosJR">ENGENHEIRO DE PROJETOS JR</option>
                <option value="EngenheiroProjetosPL">ENGENHEIRO DE PROJETOS PL</option>
                <option value="EngenheiroProjetosSR">ENGENHEIRO DE PROJETOS SR</option>
                <option value="MontadorInstrumentosdePrecisao">MONTADOR INSTRUMENTOS DE PRECISÃO</option>

            </select>
            <br>
            <br>

            <label for="employeeDepartment">Departamento:</label>
            <select id="employeeDepartment" required>
                <option value="RH">RH</option>
                <option value="TI">TI</option>
                <option value="Financeiro">FINANCEIRO</option>
                <option value="Manufatura">MANUFATURA</option>
                <option value="BR/TQ1qualityandindustrialization"> BR/TQ1 QUALITY AND INDUSTRIALIZATION</option>
                <option value="QualidadeEQF">QUALIDADE EQF</option>
                <option value="MontagemTimeLevantVidro1">MONTAGEM TIME LEVANT VIDRO 1</option>
                <option value="GarantiaDeQualidade">GARANTIA DE QUALIDADE</option>
                <option value="BusinessDivisionDoor1">BUSINESS DIVISION DOOR 1</option>
                <option value="Compras">COMPRAS</option>
                <option value="AbastecimentodeLinha">ABASTECIMENTO DE LINHA</option>
                <option value="LogisticaFísica">LOGÍSTICA FÍSICA</option>

            </select>
            <br>
            <br>

            <label for="employeeEmail">E-mail:</label>
            <input type="email" id="employeeEmail" required />
            <br>
            <br>

            <label for="employeeultimaAvaliacao">Última Avaliação:</label>
            <input type="ultimaAvaliacao" id="employeeultimaAvaliacao" required />

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
        <h2>Detalhes do Funcionário</h2>
        <p><strong>Nome:</strong> <span id="viewEmployeeName"></span></p>
        <p><strong>Cargo:</strong> <span id="viewEmployeeRole"></span></p>
        <p><strong>Departamento:</strong> <span id="viewEmployeeDepartment"></span></p>
        <p><strong>Email:</strong> <span id="viewEmployeeEmail"></span></p>
        <p><strong>Última Avaliação:</strong> <span id="viewEmployeeultimaAvaliacao"></span></p>
    </div>
</div>

<?php $render('footer') ?>