/*
  Funcion para eliminar libros
*/
  $(document).ready(function() {
    //Accedo al boton que activa el evento
  $('.deleteBook').on("click",function(){
      //Recogemos la id del contenedor padre para posteriormente eliminar la fila con el id del usuario que se elimino
      var parent = $(this).parent().parent().attr('id');
      //Recogemos el id del boton
      var codigo = $(this).attr('data');

      var dataString = codigo;
      //console.log("parent = " + parent);
      console.log(dataString);
      $.ajax({
          type: "POST",
          url: "models/deleteBook.php", // Enlace al archivo con la funcion de eliminar eliminar en la BD
          data: {codigo: dataString},
          success: function(data) {
            if(data == 1){
              // Se borro exitosamente el libro y se remueve la fila completa del registro eliminado
              $(".mensaje").html('<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Libro eliminado</p></div>');
              $('#'+parent).remove();
            }
            else if(data == 2){

              $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No se elimino el libro</p></div>');
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
  $("#actualizarBook").on("submit",function(e){
    e.preventDefault();
    nombre= $("#nombre").val();
    editorial= $("#editorial").val();
    descripcion= $("#descripcion").val();
    categoria= $("#categoria").val();
    precio= $("#precio").val();
    codigo= $("#codigo").val();

            $.ajax({
                type: "POST",
                url: "models/bookUpdate.php",        // enlace del archivo que contiene la funcionalidad de actualizar libros en la BD
                data: {
                  nombre: $("#nombre").val(),
                  editorial: $("#editorial").val(),
                  descripcion: $("#descripcion").val(),
                  categoria: $("#categoria").val(),
                  precio: $("#precio").val(),
                  codigo: $("#codigo").val()
                },
                beforeSend: function(){

                },
                success: function(data){
                  console.log(data);
                // Si el servidor devuelve una respuesta se ejecuta lo siguiente dependiendo del resultado
                if(data == 1){

                    $(".mensaje").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Libro '+ $('#nombre').val() + ' actualizado</p></div>');

                    }
                    else if (data == 2) {

                          $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error al actualizar</p></div>');
                    }
                    else if (data == 3) {
                          $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Error en la base de datos</p></div>');
                    }else if (data == 4) {
                        $(".mensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No selecciono el libro a actualizar</p></div>');
                    }

                 }
            });
  })
});
