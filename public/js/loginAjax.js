$("form#formLogin").validate({
    rules: {
        username: {
            required: true
        },
        password: {
            required: true
        }
    },
    messages: {
        username: {
            required: 'Ingrese un usuario'
        },
        password: {
            required: 'Ingrese una contraseña'
        }
    }/*,
    submitHandler: function () {
        //return false;
    }*/
});

$("#botonIngresar").click(function() { 
	$("form#formLogin").valid(); 
});