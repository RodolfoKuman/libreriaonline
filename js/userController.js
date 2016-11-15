/*
  Funcion para agregar usuarios
*/

function addUser(){
    // Obtengo los valores con el id de los campos
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var user = $("#user").val();
    var email = $("#email").val();
    var type = $("#type").val();
    var password = $("#password").val();
    var parent = $(this).parent().parent().attr('id');
            $.ajax({
                type: "POST",
                url: "models/insertUser.php",        // enlace del archivo que contiene la funcionalidad de insertar usuarios en la BD
                data: {
                      nombre: $('#nombre').val(),     // Paso los parámetros en formato JSON
                      apellido: $('#apellido').val(),
                      user: $('#user').val(),
                      email: $('#email').val(),
                      type: $('#type').val(),
                      password:$('#password').val(),
                      },
                beforeSend: function(){

                  $("#noti").html('<font >Un momento porfavor...</font> <img class="img-load" src="img/loading.gif"/>').show();

                },
                success: function(data){
                // Si el servidor devuelve una respuesta se ejecuta lo siguiente dependiendo del resultado
                if(data == 1){

                      $(".mensaje").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Agregado con exito</p></div>');
                      //$('#'+parent).add();
                    }
                    else if (data == 2) {
                        $("#noti").html('Error al insertar Usuario.').show();
                    }
                    else if (data == 3) {
                          $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Debe llenar todos los campos</p></div>');
                    }else if (data == 4) {
                        $("#noti").html('error con base de datos.').show();
                    }

                 }
            },3000);

    }



/*
  Funcion para eliminar usuarios
*/
    $(document).ready(function() {
      //Accedo al boton que activa el evento
    $('.botonEliminar').on("click",function(){
        //Recogemos la id del contenedor padre para posteriormente eliminar la fila con el id del usuario que se elimino
        var parent = $(this).parent().parent().attr('id');
        //Recogemos el id del boton
        var codigo = $(this).attr('data');

        var dataString = codigo;
        //console.log("parent = " + parent);
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "models/deleteUser.php", // Enlace al archivo con la funcion de eliminar usuarios en la BD
            data: {codigo: dataString},
            success: function(data) {
              if(data == 1){
                // Se borro exitosamente el usuario y se remueve la fila completa del registro eliminado
                $(".mensaje").html('<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Usuario eliminado</p></div>');
                $('#'+parent).remove();
              }
              else if(data == 2){

                $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No se elimino el usuario</p></div>');
              }
              else if(data == 3){

                $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error en la conexion a la base de datos</p></div>');
              }
              else if(data == 4){

                $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No se especifico el id</p></div>');
              }
            }
        });
    });
  });


  /*  Funcion para editar ussuarios en proceso... xD */

  $(document).ready(function() {

  $('.botonEliminar').on("click",function(){
      //Recogemos la id del contenedor padre
      var parent = $(this).parent().parent().attr('id');
      //Recogemos el id del boton
      var codigo = $(this).attr('data');

      var dataString = codigo;
      //console.log("parent = " + parent);
      console.log(dataString);
      $.ajax({
          type: "POST",
          url: "models/userUpdate.php",
          data: {codigo: dataString},
          success: function(data) {
            if(data == 1){
              console.log(data);
              $(".mensaje").html('<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Usuario eliminado</p></div>');
              $('#'+parent).remove();
            }
            else if(data == 2){
              console.log(data);
              $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No se elimino el usuario</p></div>');
            }
            else if(data == 3){
              console.log(data);
              $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error en la conexion a la base de datos</p></div>');
            }
            else if(data == 4){
              console.log(data);
              $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No se especifico el id</p></div>');
            }
          }
      });
  });
});
