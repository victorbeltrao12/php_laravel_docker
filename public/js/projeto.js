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


$('#mascara_valor').mask('#.##0,00', { reverse: true})