/*;(function(){

  var price =[];
  var product =[];

  $(document).on('ready',function(){
    $('.agregar').on('click', function(){

      var precio = $(this).parent().children('span').data('price');
      var producto = $(this).parent().find(' .producto').text();

     price.push(precio);
     product.push(producto);
     console.log(product);
     var total =0;
     for (i = 0; i < price.length; i++) {  //Recorro el arreglo para obtener los precios de los productos agregados y sumarlos
         total += parseInt(price[i]);  //
     }

     console.log(total);
        $(".miBolsa .libro").html('<p>Articulos</p><span>' + product+'</span><button style= "font-size:10px"; class="btn btn-primary agregar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>');
        $(".miBolsa .total").html('Total: $' + total);
   }); */

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
                  console.log(nombreTabla);
                  $('.miBolsa').html('');
            },
            success: function(data){
              if(data == 1){
                console.log('producto agregado');
              //  $(".mensaje").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Libro '+ nombre + ' agregado</p></div>');
                //$('#tablaCarrito tr:last').after('<tr><td>'+nombre+'</td><td>'+precio+'</td></tr>');
                $.ajax({
                    url: 'models/cargarCarrito.php',
                    type: "POST",
                    data: {
                      nombreTabla: $('#nombreTabla').val()
                    },
                    success: function(data){
                      $('.miBolsa').append(data);
                    }

                  });
              }
            }

         });//Final ajax
     });
   });




   /////// bolsa






/*function sumarProduct(){
  var total =0;

  for (i = 0; i < products.length; i++) {  //loop through the array
      total += products[i];  //Do the math!
  }

  console.log(total);
}



// Funcion para sumar con jason
function sumaProductos(price){
  var foo = {
          taxes: [
              { amount: 20, currencyCode: "USD", decimalPlaces: 0, taxCode: "YRI"},
              { amount: 50, currencyCode: "USD", decimalPlaces: 0, taxCode: "YRI"},
              { amount: 10, currencyCode: "USD", decimalPlaces: 0, taxCode: "YRI"}
          ]
      },
      total = 0,  //set a variable that holds our total
      taxes = foo.taxes,  //reference the element in the "JSON" aka object literal we want
      i;
  for (i = 0; i < taxes.length; i++) {  //loop through the array
      total += taxes[i].amount;  //Do the math!
  }
  console.log(total);  //display the result
}
*/
