$("form#form_cargos").validate({
    rules: {
        nombre: {
            required: true
        },
        salario_mensual: {
            required: true,
            number: true,
            min:1
        }
    },
    messages: {
        nombre: {
            required: 'Ingrese nombre del cargo'
        },
        salario_mensual: {
            required: 'Ingrese un monto',
            number: 'Solo debe agregar números',
            min: 'El monto debe ser igual o superior a uno (1)'
        }
    },
    submitHandler: function () {

        var accion = '';
        if($("button#submit").attr('data') == 1)
        {
            accion = 'agregado';
        }
        else if($("button#submit").attr('data') == 0)
        {
            accion = 'actualizado';
        }
        var alertMessage = '<div class="callout callout-success" style="display: none">';
        alertMessage += '<h4><i class="icon fa fa-check"></i> Cargo '+accion+' satisfactoriamente</h4>';
        alertMessage += '</div>';

        var cargando = '<img src="../images/loader.gif" />';

        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#form_cargos")[0]);

        $.ajax({
            url:  $("form#form_cargos").attr('action'),
            type: $("form#form_cargos").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $('#m-alertas').html(cargando);
                $('.btn-danger').attr('disabled', true);
                $('.btn-info').attr('disabled', true);
            },
            success:function(){
                $('#m-alertas').html(alertMessage);
                $('.callout').fadeIn();
                if($("button#submit").attr('data') == 1)
                {
                    $('#form_cargos').reset();
                }
                $('.btn-danger').attr('disabled', false);
                $('.btn-info').attr('disabled', false);
                $('.callout').fadeOut(10000);
            }
        })

        return false;
    }
});