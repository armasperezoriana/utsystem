$(document).ready(function() {
  $("#recuperarClave").on("submit", function (e) {
      e.preventDefault();
  
           var pass = $("#recuperarClave").find("#pass").val();
           console.log(pass);
                  $.ajax({
                      url: './Login/modificarClaveUsuario',
                      type: 'POST',
                      data: {
                          pass: pass,

                      },
                      success: function(response) {
                          swal.fire({
                              type: 'success',
                             title: 'Contrasena modificada correctamente',
                          }).then((isConfirm) => {
                             location.href = './Login';
                          });
                      },
                      error: (response) => {
                          console.log(response);
                          Swal.fire("¡Error!",  "Verifique el codigo porfavor", "error");
                        }
                  });
              } )
                  });
//}