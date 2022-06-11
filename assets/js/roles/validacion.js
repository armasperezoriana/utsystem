  $(document).ready(function() {

        $(".EnviarUsuariosRegistrar").click(function() {
            var valido = validar();
            if (valido == true) {

                var nombre_rol = $("#AgregarUsuarioModal").find("#ombre_rol").val();                
                var descripcion= $("#AgregarUsuarioModal").find("#descripcion").val();
                var status = $("#AgregarUsuarioModal").find("#status").val();
                   console.log($("#AgregarUsuarioModal").find("#nombre_rol"));             
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
                               status: status,
                               
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
                console.log($("#ModificarRolModal").find("#nombre_rol"));
                var descripcion = $("#ModificarRolModal").find("#descripcion").val();
                console.log($("#ModificarRolModal").find("#descripcion").val());
                var status = $("#ModificarRolModal").find("#status").val();
                 console.log($("#ModificarRolModal").find("#status").val());
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
                               status: status,
                               
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


        //
        $('.editar').click(function(e){
            e.preventDefault();
            mostrar($(this).attr('data-id'), "#modificarRol", "#ModificarRolModal");
        })
        $('.consultar').click(function(e){
            e.preventDefault();
            mostrar($(this).attr('data-id'), "#consultarRol", "#ConsultarRolModal");
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

    function validar(modificar = false) {
        var form = "";
        if(!modificar){
            form = "#AgregarUsuarioModal";
        }
        else{
            form = "#modificarRol";
        }
        var expNombre = /^[A-Za-z]{3,50}$/;
        var nombre_rol = $(form).find("#nombre_rol").val();
        var rnombre = false;

        var descripcion = $(form).find("#descripcion").val();
        var rdescripcion = false;

        var status = $(form).find("#status").val();
        var rstatus = false;

        if (nombre_rol == "") {
            rnombre = false;
            $(".errorNombre").html("Debe ingresar el nombre del rol");
        } else {
            rnombre = true;
            $(".errorNombre").html("");
        }
        if (descripcion == "") {
            rdescripcion = false;
            $(".errorDescripcion").html("Debe ingresar la descripcion del rol");
        } else {
            $(".errorDescripcion").html("");
            rdescripcion = true;
        }
         if (status == "") {
            rstatus = false;
            $(".errorStatus").html("Debe seleccionar el estado del rol");
        } else {
            $(".errorStatus").html("");
            rdescripcion = true;
        }
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
                $(formulario).find("#status").val(rol.status);
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
