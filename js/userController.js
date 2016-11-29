/*
  Funcion para agregar usuarios
*/
  $(document).ready(function(){
    $("#addUser").on("submit",function(e){

      e.preventDefault();

              $.ajax({
                  type: "POST",
                  url: "models/insertUser.php",        // enlace del archivo que contiene la funcionalidad de insertar usuarios en la BD
                  data: $('#addUser').serialize(),    // Serializo los valores del formulario en un solo objeto
                  beforeSend: function(){

                    $("#noti").html('<font >Un momento porfavor...</font> <img class="img-load" src="img/loading.gif"/>').show();

                  },
                  success: function(data){
					  console.log(data);
                  // Si el servidor devuelve una respuesta se ejecuta lo siguiente dependiendo del resultado
                  if(data == 1){

                        $(".mensaje").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Agregado con exito</p></div>');
                        window.setTimeout('location.reload()', 2000); // Regargo la página en dos segundos para mostrar el nuevo registro
                      }
                      else if (data == 2) {
                        $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error al insertar</p></div>');

                      }
                      else if (data == 3) {
                            $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Debe llenar todos los campos</p></div>');
                      }else if (data == 4) {
                          $("#noti").html('error con base de datos.').show();
                      }

                   }
              });
  });
  });




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


  /*  Funcion para editar ussuarios en */

  $(document).ready(function(){
    $("#actualizarUser").on("submit",function(e){
      e.preventDefault();
	  var nombre = $("#nombre").val();
      var apellido = $("#apellido").val();
      var user = $("#user").val();
      var email = $("#email").val();
      var type = $("#type").val();
      var codigo= $("#codigo").val();

              $.ajax({
                  type: "POST",
                  url: "models/userUpdate.php",        // enlace del archivo que contiene la funcionalidad de actualizar
                  data: {
      					   nombre: $("#nombre").val(),
      					   apellido: $("#apellido").val(),
      					   user: $("#user").val(),
      					   email: $("#email").val(),
      					   type: $("#type").val(),
      					   codigo: $("#codigo").val()

				            },
                  beforeSend: function(){

                  },
                  success: function(data){


                  // Si el servidor devuelve una respuesta se ejecuta lo siguiente dependiendo del resultado
                  if(data == 1){

                        $(".mensaje").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Usuario '+ nombre + ' actualizado</p></div>');

                      }
                      else if (data == 2) {

                            $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error al actualizar</p></div>');
                      }
                      else if (data == 3) {
                            $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error en la base de datos</p></div>');
                      }else if (data == 4) {
                          $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No selecciono el registro a actualizar</p></div>');
                      }

                   }
              });
    })
  });


  // Actualizar perfil personal

  $(document).ready(function(){
    $("#updatePerfil").on("submit",function(e){
      e.preventDefault();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var user = $("#user").val();
        var codigo= $("#codigo").val();
              $.ajax({
                  type: "POST",
                  url: "models/perfilUpdate.php",        // enlace del archivo que contiene la funcionalidad de actualizar
                  data:{ nombre: $("#nombre").val(),
      					   apellido: $("#apellido").val(),
      					   user: $("#user").val(),
      					   codigo: $("#codigo").val()
                 },

                  beforeSend: function(){

                  },
                  success: function(data){

                      console.log(data);
                  // Si el servidor devuelve una respuesta se ejecuta lo siguiente dependiendo del resultado
                  if(data == 1){

                        $(".mensaje").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Perfil actualizado</p></div>');

                      }
                      else if (data == 2) {

                            $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error al actualizar</p></div>');
                      }
                      else if (data == 3) {
                            $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error en la base de datos</p></div>');
                      }else if (data == 4) {
                          $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No selecciono el registro a actualizar</p></div>');
                      }

                   }
              });
    })
  });
