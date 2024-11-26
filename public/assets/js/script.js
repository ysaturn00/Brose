$('#btn-add-employee').on('click', (event) => {
    event.preventDefault();

    $('#modal-employee').show();
});

$('#btn-add-department').on('click', (event) => {
    event.preventDefault();

    $('#modal-departament').show();
});

$('#btn-add-position').on('click', (event) => {
    event.preventDefault();

    $('#modal-position').show();
});

$('#btn-add-skill').on('click', (event) => {
    event.preventDefault();

    $('#skillModal').show();
});

$('.close').on('click', (event) => {
    event.preventDefault();

    $('.modal').hide();
    window.location.href = "/Brose/public/";
});

$('.close-skill').on('click', (event) => {
    event.preventDefault();

    $('#skillModal').hide();
});

$('#btn-edit-skill').on('click', function (event) {
    skillName = $('#name-skill').text();
    skillLevel = $('.table2 input[name="level-skill"]').val();
    skillDescription = $('#skill-description').val();

    $('#form-edit-skill input[name="name-skill"]').attr('value', skillName);
    $('#form-edit-skill input[name="level-skill"]').attr('value', skillLevel);
    $('#form-edit-skill input[name="skill-description"]').attr('value', skillDescription);

});

$('#generatePDFSkill').on('click', function (event) {
    event.preventDefault();


    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();

    // Primeira Tabela
    const employeesTable = document.getElementById("employeesTable");
    pdf.autoTable({
        html: employeesTable,
        startY: 20, // Começa a renderizar a tabela a 20 unidades da margem superior
        styles: {
            fontSize: 10,
            cellPadding: 4,
        },
        headStyles: {
            fillColor: [0, 0, 0],
            textColor: [255, 255, 255],
        },
    });

    // Segunda Tabela
    const skillsTable = document.getElementById("skillsTable");
    pdf.autoTable({
        html: skillsTable,
        startY: pdf.lastAutoTable.finalY + 10, // Posiciona abaixo da primeira tabela
        styles: {
            fontSize: 10,
            cellPadding: 4,
        },
        headStyles: {
            fillColor: [0, 0, 0],
            textColor: [255, 255, 255],
        },
    });

    // Abre o PDF em uma nova aba
    pdf.output("dataurlnewwindow");
});

document.getElementById("generatePDFEmployee").addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();

    // Captura a tabela do DOM
    const table = document.getElementById("employeesTable");

    // Gera a tabela no PDF usando autoTable
    pdf.autoTable({
        html: table, // Passa o elemento da tabela diretamente
        startY: 20, // Margem superior no PDF
        styles: {
            fontSize: 10,
            cellPadding: 4,
            overflow: "linebreak",
            valign: "middle",
        },
        headStyles: {
            fillColor: [0, 0, 0], // Cor do cabeçalho
            textColor: [255, 255, 255], // Cor do texto no cabeçalho
        },
    });

    // Abre o PDF em uma nova aba
    pdf.output("dataurlnewwindow");
});



