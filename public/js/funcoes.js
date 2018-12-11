$(document).ready(function () {
    $("#formContato").submit(function (e) {
        e.preventDefault(); // evita que o formulário seja submetido

        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/contato',
            data: formData,

            success: function (dados) {
                $("#div_retorno").html(dados);
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    });
});


$(document).ready(function () {
    $("#formCadastro").submit(function (e) {
        e.preventDefault(); // evita que o formulário seja submetido
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/cadastro',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function (dados) {
                $("#div_retorno").html(dados);
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    });
});


$(document).ready(function () {
    $("#formLogin").submit(function (e) {
        e.preventDefault(); // evita que o formulário seja submetido
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/login',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function (dados) {
                $("#div_retorno").html(dados);
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                $("#div_retorno").css({color: 'red'});
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    });
});


$(document).ready(function () {
    $("#formLogin").submit(function (e) {
        e.preventDefault(); // evita que o formulário seja submetido

        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/login',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function (dados) {
                $("#div_retorno").html(dados);
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    });
});


$(document).ready(function () {
    $("#formDoar").submit(function (e) {
        e.preventDefault(); // evita que o formulário seja submetido

        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/doar',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function (dados) {
                $("#div_retorno").html(dados);
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    });
});

//function minhafuncao(id) {
//
//    // confirmAlert
//
//    $.ajax({
//        type: 'POST',
//        url: '/deletarDoacao',
//        data: {idDoacao: id}
//
//
//
//    });
//}
function deletarDoacao(id) {
    var r = confirm("Desejar realmente deletar essa doação? ");
    if (r == true) {

        $.ajax({
            type: 'POST',
            url: '/deletarDoacao',
            data: {idDoacao: id},
            success: function () {
                location.href = "http://www.mypet.org/deletarSucesso"
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    } else {
        location.href = "http://www.mypet.org/deletarErro"
    }
}


function adotar(id) {
    var r = confirm("Desejar realmente deletar essa doação? ");
    if (r == true) {

        $.ajax({
            type: 'POST',
            url: '/mostrarInformacao',
            data: {idDoacao: id},
            success: function () {
                location.href = "http://www.mypet.org/mostrarInformacao"
            },
            beforeSend: function () {
                $("#processando").css({display: "block"});
            },
            complete: function () {
                $("#processando").css({display: "none"});
            },
            error: function () {
                $("#div_retorno").html("Erro em chamar a função.");
                setTimeout(function () {
                    $("#div_retorno").css({display: "none"});
                }, 5000);
            }
        });
    } else {
        location.href = "http://www.mypet.org/deletarErro"
    }

}