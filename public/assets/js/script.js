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
    $('#skillModal').hide();
});