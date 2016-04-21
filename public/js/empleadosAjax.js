$("form#form_empleados").validate({
    rules: {
        name: {
            required: true
        },
        cedula: {
            required: true,
            number: true
        },
        rif: {
            required: true
        },
        fecha_ingreso: {
            required: true
        },
        cargo: {
            required: true
        },
        email: {
            required: true,
            email:true
        },
        usuarioSlack: {
            required: true
        }
    },
    messages: {
        name: {
            required: 'Ingrese nombre y apellido'
        },
        cedula: {
            required: 'Ingrese número de cédula',
            number: 'Ingrese solo números sin puntos ni letras'
        },
        rif: {
            required: 'Ingrese rif'
        },
        fecha_ingreso: {
            required: 'Ingrese la fecha de ingreso'
        },
        cargo: {
            required: 'Seleccione un cargo'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        usuarioSlack: {
            required: 'Ingrese el nombre se usuario en slack'
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
        alertMessage += '<h4><i class="icon fa fa-check"></i> Empleado '+accion+' satisfactoriamente</h4>';
        alertMessage += '</div>';

        var cargando = '<img src="../images/loader.gif" />';

        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#form_empleados")[0]);

        $.ajax({
            url:  $("form#form_empleados").attr('action'),
            type: $("form#form_empleados").attr('method'),
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
                    $('#form_empleados').reset();
                }
                $('.btn-danger').attr('disabled', false);
                $('.btn-info').attr('disabled', false);
                $('.callout').fadeOut(10000);
            }
        })

        return false;
    }
});

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true
    //startDate: '-3d'
});