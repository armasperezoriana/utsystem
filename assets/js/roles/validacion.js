  $(document).ready(function() {

        $(".EnviarUsuariosRegistrar").click(function() {
            var valido = validar();
            if (valido == true) {

                var nombre_rol = $("#AgregarUsuarioModal").find("#nombre_rol").val();                
                var descripcion= $("#AgregarUsuarioModal").find("#descripcion").val();    
                swal.fire({
                    title: "¿Desea guardar los datos ingresados?",
                    text: "Estos datos serán guardados.",
                    type: "question",
                    showCancelButton: true,
                    // confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Guardar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                }).then((isConfirm) => {
                    if (isConfirm.value) {
                        $.ajax({
                            url: './Roles/RegistrarRol',
                            type: 'POST',
                            data: {
                                nombre_rol: nombre_rol,
                                descripcion: descripcion,
                               
                            },
                            success: function(respuesta) {
                                 alert(respuesta);
                                if (respuesta == "1") {
                                    swal.fire({
                                        type: 'success',
                                        title: 'Registro guardado exitosamente',
                                    }).then((isConfirm) => {
                                        location.href = './Roles';
                                    });
                                }
                                if (respuesta == "2") {
                                    swal.fire({
                                        type: 'error',
                                        title: 'Error al guardar los datos',
                                        text: 'Contacte con el soporte',
                                    });
                                }
                                if (respuesta == "3") {
                                    swal.fire({
                                        type: 'warning',
                                        title: 'Datos repetidos',
                                        text: 'Vuelva a intentar',
                                    });
                                }
                            }
                        });
                    } else {
                        swal.fire({
                            type: 'error',
                            title: '¡Proceso cancelado!',
                        });
                    }
                });


            }

        });
        $(".ModificarRolModal").click(function() {
            var valido = validar(true);
               
            if (valido == true) {

               var nombre_rol = $("#ModificarRolModal").find("#nombre_rol").val();
                var descripcion = $("#ModificarRolModal").find("#descripcion").val();
                console.log($("#ModificarRolModal").find("#descripcion").val());
                // alert(pass);
                swal.fire({
                    title: "¿Desea guardar los datos ingresados?",
                    text: "Estos datos serán guardados.",
                    type: "question",
                    showCancelButton: true,
                    // confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Guardar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                }).then((isConfirm) => {
                    if (isConfirm.value) {
                        $.ajax({
                            url: './Roles/Modificar',
                            type: 'POST',
                            data: {
                                nombre_rol: nombre_rol,
                                descripcion: descripcion,
                               
                            },
                            success: function(respuesta) {
                                // alert(respuesta);
                                if (respuesta == "1") {
                                    swal.fire({
                                        type: 'success',
                                        title: 'Registro modificado exitosamente',
                                    }).then((isConfirm) => {
                                        location.href = './Roles';
                                    });
                                }
                                if (respuesta == "2") {
                                    swal.fire({
                                        type: 'error',
                                        title: 'Error al modificar los datos',
                                        text: 'Contacte con el soporte',
                                    });
                                }
                                if (respuesta == "3") {
                                    swal.fire({
                                        type: 'warning',
                                        title: 'Datos repetidos',
                                        text: 'Vuelva a intentar',
                                    });
                                }
                            }
                        });
                    } else {
                        swal.fire({
                            type: 'error',
                            title: '¡Proceso cancelado!',
                        });
                    }
                });


            }

        });
        $("#PermisosRolForm").submit(function(e) {
            e.preventDefault();
            var ba = false;
            var permisos = $(this).find('input[name="permisos[]"]');                  
            $.each(permisos, function (j, element) {             
                if(element.checked==true){
                    ba = true;
                }
            });
            if (!ba) {
                Swal.fire(
                    'Indique los Permisos',
                    'Debe seleccionar al menos 1 permiso',
                    'warning'
                );
                return false;
            }
            let datos = new FormData(document.querySelector('#PermisosRolForm'));
            $.ajax({
                type: "POST",
                url: "./Roles/Modificar",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    console.log(respuesta);
                    if (respuesta == "1") {
                        swal.fire({
                            type: 'success',
                            title: 'Registro modificado exitosamente. Ahora debe agregar los permisos de este usuario',
                        }).then((isConfirm) => {
                            location.href = './Roles';
                        });
                    }
                    else {
                        swal.fire({
                            type: 'error',
                            title: 'Error al modificar los datos',
                            text: 'Contacte con el soporte',
                        });
                    }                    
                },
                error: (response) => {
                    console.log(response);
                    swal.fire({
                        type: 'error',
                        title: '¡Ocurrió un error!',
                    });
                }
            });
        });
        //
        $('.editar').click(function(e){
            e.preventDefault();
            mostrar($(this).attr('data-id'), "#modificarRol", "#ModificarRolModal");
        })
        $('.consultar').click(function(e){
            e.preventDefault();
            mostrar($(this).attr('data-id'), "#consultarRol", "#ConsultarRolModal");
        })
         $('.permisos').click(function(e){
            e.preventDefault();
            mostrar($(this).attr('data-id'), "#PermisosRolForm", "#PermisosRolModal");
        })


        // Inhabilitar Usuario
        $('body').on('click', '.inhabilitar', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Está Seguro?',
                text: "El rol sera inhabilitado en el sistema",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.value) {
                    inhabilitar($(this).attr('data-id'));
                }
            })
        });
        // Habilitar Usuario
        $('body').on('click', '.habilitar', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Está Seguro?',
                text: "El rol será habilitado en el sistema",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si!'
            }).then((result) => {
                if (result.value) {
                    habilitar($(this).attr('data-id'));
                }
            })
        });

    });

    function validar(modificar = false){
        var form = "";
        var expDescripcion = /^[a-zA-ZÀ-ÿ\s]{6,40}$/;
        var expNombre = /^[a-zA-ZÀ-ÿ\s]{4,40}$/;
        if(!modificar){
            form = "#AgregarUsuarioModal";
        }
        else{
            form = "#modificarRol";
        }
        var nombre_rol = $(form).find("nombre_rol").val();
        var rnombre = false;

        var descripcion = $(form).find("#descripcion").val();
        var rdescripcion = false;


        if (nombre_rol == ""|descripcion == "") {
            swal.fire({
                                        type: 'warning',
                                        title: 'Campos obligatorios',
                                        text: 'Asegurate de completar todos los campos',
                                    });
            $(".errorNombre").html("Debe ingresar el nombre del rol");
                $(".errorDescripcion").html("Debe ingresar la descripcion del rol");
                return false;

        }else{
    if(!expNombre.test(nombre_rol)){
                $(".errorNombre").html("El campo nombre solo acepta caracteres, minimo 4 caracteres");
                    rnombre = false;
                    //preventDefault();
        }else{
                $(".errorNombre").html("Campo validado");
                $(".errorNombre").attr("style", "color:green");
                rnombre = true;
            }
        if (!expDescripcion.test(descripcion)) {
            $(".errorDescripcion").html("Ingrese una descripcion mas detallada, mayor a 6 caracteres. No se aceptan numeros");
        rdescripcion = false;
         //preventDefault();
        } else {
            $(".errorDescripcion").html("Campo validado");
            $(".errorDescripcion").attr("style", "color:green");
            rdescripcion = true;
        }
         
    }
    return true;
}

    const mostrar = (id, formulario, modal) => {
        $.ajax({
            type: "POST",
            url: "Roles/Mostrar/"+id,
            success: function (response) {
                let json = JSON.parse(response);
                let rol = json.data;
                $(formulario).find("#nombre_rol").val(rol.nombre_rol);
                $(formulario).find("#descripcion").val(rol.descripcion);
                $(modal).modal('show');
            },
            error: function (response) {
                console.log(response.getAllResponseHeaders())
            }
        });
    }
    const inhabilitar = (id) => {
        $.ajax({
            type: "POST",
            url: "Roles/Inhabilitar/" + id,
            success: function(response) {
                const json = JSON.parse(response);
                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                )
                if (json.tipo == 'success') {
                    // table.ajax.reload();
                    location.reload();
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    const habilitar = (id) => {
        $.ajax({
            type: "POST",
            url: "Roles/Habilitar/" + id,
            success: function(response) {
                const json = JSON.parse(response);
                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                )
                if (json.tipo == 'success') {
                    // table.ajax.reload();
                    location.reload();
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }

