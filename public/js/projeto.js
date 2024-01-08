//Função de deletar, é utilizada em todos os CRUDs do sistema
function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {
    //alert(rotaUrl);
    //alert(idDoRegistro);
    if (confirm("Tem certeza que deseja deletar?")) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: idDoRegistro,
            },
            beforeSend: function () {
                $.blockUI({
                    Message: 'Carregando...',
                    timeout: 2000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            } else {
                alert("Nao foi possível deletar o registro");
            }
        }).fail(function (data) {
            $.unblockUI();
            alert("Erro ao deletar registro");
        });
    }
}

// Máscara do Front-end para alterar o valor de Ponto para Vírgula quando for salvar no banco de dados
$('#mascara_valor').mask('#.##0,00', { reverse: true})

// API do ViaCEP para preencher os campos de endereço automaticamente
$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep!= "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $('#logradouro').val(" ");
            $('#endereco').val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#endereco").val(dados.localidade.toUpperCase());
                } else {
                    alert("CEP não encontrado de forma automática, favor preencher manualmente");
                }
            });
        }
    }
});