$('#btn-add-employee').on('click', (event) => {
    event.preventDefault();

    $('#modal-employee').show();
});

$('.close').on('click', (event) => {
    event.preventDefault();

    $('#modal-employee').hide();
});