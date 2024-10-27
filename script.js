// Função para abrir o formulário de criação de funcionário  
function openEmployeeForm() {
    document.getElementById("employeeFormModal").style.display = "block";
    document.getElementById("formTitle").innerText = "Add Employee";
    document.getElementById("employeeForm").reset();
    document.getElementById("employeeId").value = "";
}

// Função para fechar o formulário de criação de funcionário
function closeEmployeeForm() {
    document.getElementById("employeeFormModal").style.display = "none";
}

function viewEmployee(id) {
    const employeeItem = document.getElementById(id);
    const name = employeeItem.querySelector(".employee-name").innerText;
    const role = employeeItem.querySelector(".employee-role").innerText;
    const department = employeeItem.querySelector(".employee-department").innerText;
    const email = employeeItem.querySelector(".employee-email").innerText;
    const ultimaAvaliacao = employeeItem.querySelector(".employee-ultimaAvaliacao").innerText;

    // Preencha o modal com os detalhes do funcionário
    document.getElementById("viewEmployeeName").innerText = name;
    document.getElementById("viewEmployeeRole").innerText = role;
    document.getElementById("viewEmployeeDepartment").innerText = department;
    document.getElementById("viewEmployeeEmail").innerText = email;
    document.getElementById("viewEmployeeultimaAvaliacao").innerText = ultimaAvaliacao;

    // Exiba o modal de visualização
    document.getElementById("viewEmployeeModal").style.display = "block";
}

function closeViewEmployee() {
    document.getElementById("viewEmployeeModal").style.display = "none";
}

// Função para salvar o funcionário
function submitForm(event) {
    event.preventDefault();
    const id = document.getElementById("employeeId").value;
    const name = document.getElementById("employeeName").value;
    const role = document.getElementById("employeeRole").value;
    const department = document.getElementById("employeeDepartment").value;
    const email = document.getElementById("employeeEmail").value;
    const ultimaAvaliacao = document.getElementById("employeeultimaAvaliacao").value;

    if (id) {
        // Atualizar funcionário existente
        const employeeRow = document.getElementById(id);
        employeeRow.querySelector(".employee-name").innerText = name;
        employeeRow.querySelector(".employee-role").innerText = role;
        employeeRow.querySelector(".employee-department").innerText = department;
        employeeRow.querySelector(".employee-email").innerText = email;
        employeeRow.querySelector(".employee-ultimaAvaliacao").innerText = ultimaAvaliacao;
    } else {
        // Criar um novo funcionário
        const newRow = document.createElement("tr");
        const newId = Date.now().toString();
        newRow.id = newId;

        newRow.innerHTML = `
        <td class="employee-name">${name}</td>
        <td class="employee-role">${role}</td>
        <td class="employee-department">${department}</td>
        <td class="employee-email">${email}</td>
        <td class="employee-ultimaAvaliacao">${ultimaAvaliacao}</td>
        <td>
          <button onclick="viewEmployee('${newId}')">Ver</button>
          <button onclick="editEmployee('${newId}')">Editar</button>
          <button onclick="deleteEmployee('${newId}')">Excluir</button>
        </td>
      `;

      document.getElementById("employees").appendChild(newRow);
    }
    closeEmployeeForm();
}

// Função para editar o funcionário
function editEmployee(id) {
    const employeeItem = document.getElementById(id);
    const name = employeeItem.querySelector(".employee-name").innerText;
    const role = employeeItem.querySelector(".employee-role").innerText;
    const department = employeeItem.querySelector(".employee-department").innerText;
    const email = employeeItem.querySelector(".employee-email").innerText;
    const ultimaAvaliacao = employeeItem.querySelector(".employee-ultimaAvaliacao").innerText;

    // Preenche o formulário com os dados do funcionário para edição
    document.getElementById("employeeId").value = id;
    document.getElementById("employeeName").value = name;
    document.getElementById("employeeRole").value = role;
    document.getElementById("employeeDepartment").value = department;
    document.getElementById("employeeEmail").value = email;
    document.getElementById("employeeultimaAvaliacao").value = ultimaAvaliacao;

    document.getElementById("formTitle").innerText = "Edit Employee";
    document.getElementById("employeeFormModal").style.display = "block";
}

// Função para deletar o funcionário
function deleteEmployee(id) {
    const employeeRow = document.getElementById(id);
    if (employeeRow) {
      employeeRow.remove();
    }
}
function calculateProgress() {
    let total = 0;
    let count = 0;

    // Totaliza valores por nível
    document.querySelectorAll(".real").forEach(input => {
        const value = parseInt(input.value) || 0;
        total += value;
        count += 1;
    });

    const totalProgress = ((total / (count * 4)) * 100).toFixed(2); // Assume máximo de 4
    document.getElementById("totalProgress").innerText = `${totalProgress}%`;
}

// Calcula o progresso inicial
calculateProgress();
