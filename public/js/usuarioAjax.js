$("form#form_user").validate({
    rules: {
        file: {
            required: true
        },
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        username: {
            required: true
        },
        password: {
            required: true
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        },
        rol: {
            required: true
        }
        
    },
    messages: {
        file: {
            required: 'Ingrese una imagen'
        },
        name: {
            required: 'Ingrese nombre y apellido'
        },
        username: {
            required: 'Ingrese un nombre de usuario'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        password: {
            required: 'Ingrese una contraseña'
        },
        password_confirmation: {
            required: 'Repita la contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        },
        rol: {
            required: 'Seleccione un rol'
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
        alertMessage += '<h4><i class="icon fa fa-check"></i> Usuario '+accion+' satisfactoriamente</h4>';
        alertMessage += '</div>';

        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#form_user")[0]);

        $.ajax({
            url:  $("form#form_user").attr('action'),
            type: $("form#form_user").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,

            success:function(){
                $('#m-alertas').html(alertMessage);
                $('.callout').fadeIn();
                if($("button#submit").attr('data') == 1)
                {
                    $('#form_user').reset();
                }
                $('.callout').fadeOut(10000);
            }
        })

        return false;
    }
});

$("form#form_user_edit").validate({
    rules: {
        file: {
            required: false
        },
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        username: {
            required: true
        },
        password: {
            required: false
        },
        password_confirmation: {
            required: false,
            equalTo: "#password"
        },
        rol: {
            required: true
        }
        
    },
    messages: {
        file: {
            required: 'Ingrese una imagen'
        },
        name: {
            required: 'Ingrese nombre y apellido'
        },
        username: {
            required: 'Ingrese un nombre de usuario'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        password: {
            required: 'Ingrese una contraseña'
        },
        password_confirmation: {
            required: 'Repita la contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        },
        rol: {
            required: 'Seleccione un rol'
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
        alertMessage += '<h4><i class="icon fa fa-check"></i> Usuario '+accion+' satisfactoriamente</h4>';
        alertMessage += '</div>';

        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#form_user_edit")[0]);

        $.ajax({
            url:  $("form#form_user_edit").attr('action'),
            type: $("form#form_user_edit").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,

            success:function(){
                $('#m-alertas').html(alertMessage);
                $('.callout').fadeIn();
                if($("button#submit").attr('data') == 1)
                {
                    $('#form_user_edit').reset();
                }
                $('.callout').fadeOut(10000);
            }
        })

        return false;
    }
});