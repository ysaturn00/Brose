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