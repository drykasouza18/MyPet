$(document).ready(function () {
    $("#formContato").submit(function (e) {
       e.preventDefault(); // evita que o formulário seja submetido
       
       var formData = new FormData(this);
       $.ajax({
            type: 'POST',
            url: '/contato',
            data: formData,
            cache:false,
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
    $("#formCadastro").submit(function (e) {
       e.preventDefault(); // evita que o formulário seja submetido
       var formData = new FormData(this);
       $.ajax({
            type: 'POST',
            url: '/cadastro',
            data: formData,
            cache:false,
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
            cache:false,
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
            cache:false,
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
            cache:false,
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