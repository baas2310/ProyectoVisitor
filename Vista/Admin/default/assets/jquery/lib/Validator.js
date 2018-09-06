$().ready(function () {

$("#FormFuncionario").validate({
    rules:{
        Nombre1:{
            required: true,
            minlenght: 2,
            maxlenght: 30
        },
        Apellido1: {
            required: true,
            minlenght: 2,
            maxlenght: 30
        },
        Celular: {
            required: true,
            minlenght:7,
            maxlenght:10

        },
        Cedula:{
            required: true,
            minlenght:7,
            maxlenght:15
        },

        Rango: {
            required: true,
            minlenght:4,
            maxlenght:30
        },
        Usuario:{
            required: true,
            minlenght:2
        },
        Pass:{
            required:true,
            minlenght:5
        },
        Password2:{
            required: true,
            equalTo: "#Pass"
        },
        messages:{

            Nombre1: {
                required:"Por favor ingrese su primer nombre",
                minlenght:"Ingrese un nombre válido",
                maxlenght:"Ingrese un nombre válido"
            },

            Apellido1: {
                required:"Por favor ingrese su primer apellido",
                minlenght:"Ingrese un apellido válido",
                maxlenght:"Ingrese un apellido válido"
            },

            Celular: {
                required:"Por favor ingrese su celular",
                minlenght:"Ingrese un celular válido",
                maxlenght:"Ingrese un celular válido"
            },

            Cedula: {
                required:"Por favor ingrese su cedula",
                minlenght:"Ingrese una cédula válida",
                maxlenght:"Ingrese una cédula válida"
            },

            Rango: {
                required:"Por favor ingrese su Rango",
                minlenght:"Ingrese un rango válido",
                maxlenght:"Ingrese un rango válido"
            },

            Usuario: {
                required:"Por favor ingrese un usuario",
                minlenght:"Ingrese un usuario de por lo menos 5 caracteres",
                maxlenght:"Ingrese un usuario de máximo 30 caracteres"
            },

            Pass: {
                required:"Por favor ingrese su contraseña",
                minlenght:"Su contraseña debe ser de por lo menos 5 caracteres",
                maxlenght:"Su contraseña no debe superar los 30 caracteres"
            },

            Password2: {
                required:"Por favor ingrese confirme su contraseña",
                equalTo: "Las contraseñas no coinciden, por favor verifiquelas"
            }

        }
    }

});

});

