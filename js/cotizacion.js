
   $(document).on('ready', function(){
     $('.agregar').on("click",function(){
       var precio = $(this).parent().children('span').data('price');
       var nombre = $(this).parent().find(' .producto').text();
       var nombreTabla =$('#nombreTabla').val();
         $.ajax({
            url: "models/carrito.php",
            type: "POST",
            data: {
              nombre: $(this).parent().find('.producto').text(),
              precio: $(this).parent().children('span').data('price'),
              nombreTabla: $('#nombreTabla').val()

            },
            beforeSend: function(){
                  $('.miBolsa').html('');
            },
            success: function(data){
              if(data == 1){
                $.ajax({
                    url: 'models/cargarCarrito.php',
                    type: "POST",
                    data: {
                      nombreTabla: $('#nombreTabla').val()
                    },
                    success: function(data){
                    //  $('.miBolsa').append(data);
                      location.href="buyBook.php";
                    }

                  });
              }
            }

         });//Final ajax
     });
   });

/* Funcion para eliminar los items del carrito */

$(document).on('ready', function(){
  $('.deleteItem').on("click",function(){
    var id = $(this).data('id');
    var nombreTabla =$('#nombreTabla').val();
      $.ajax({
         url: "models/deleteItem.php",
         type: "POST",
         data: {
           id: $(this).data('id'),
           nombreTabla: $('#nombreTabla').val()
         },
         beforeSend: function(){
               $('.miBolsa').html('');

         },
         success: function(data){
           console.log(data);
           if(data == 1){
             $.ajax({
                 url: 'models/cargarCarrito.php',
                 type: "POST",
                 data: {
                   nombreTabla: $('#nombreTabla').val()
                 },
                 success: function(data){
                   //$('.miBolsa').append(data);
                   location.href="buyBook.php";
                 }

               });
           }
         }

      });//Final ajax

  });

});


//Funcion para  Redireccionar a la pagina de confirmacion del pedido


$(document).on('ready', function(){

  $('.confirmarPedido').on('click', function(){

             location.href="orderDetail.php";
  });

});

$(document).on('ready', function(){

  $('#purchase').on('submit',function(e){
      e.preventDefault();
      var id_user = $('#usuario').data('user');
      var nombreTabla = $('#nombreTabla').data('tabla');
      var direccion = $('#direccion').val();
      var total = $('#total').data('total')
      var telefono = $('#telefono').val();

      $.ajax({
          url: 'purchase.php',
          type: "POST",
          data: {
              id_user: $('#usuario').data('user'),
              total: $('#total').data('total'),
              nombreTabla: $('#nombreTabla').data('tabla'),
              direccion: $('#direccion').val(),
              telefono: $('#telefono').val()
          },
          beforeSend: function(){
              console.log(id_user,direccion,total,telefono,nombreTabla);
          },
          success: function(data){
            $('#btn-comprar').html('Compra realizada');
            $('#btn-comprar').attr("disabled", true);
            $('.infoFactura').css("display","block");
          }

        });
     //$(this).attr("disabled", true);
  });

});
