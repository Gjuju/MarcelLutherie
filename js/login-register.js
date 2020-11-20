let login = document.querySelector('#logmodal')


$(document).ready(function () {
    $("#login").click(function () {
        $("#myconnexion").modal();
    });
});

$(document).ready(function () {
    $("#enregistrement").click(function () {
        $("#myconnexion").modal('hide');
        $("#myenregistrement").modal();
    });
});

$(document).ready(function () {
    $("#connexion").click(function () {
        $("#myenregistrement").modal('hide');
        $("#myconnexion").modal();
    });
});


