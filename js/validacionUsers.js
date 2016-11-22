function login(){
  var email = $("#email").val();
  var pass = $("#password").val();
          $.ajax({
              type: "POST",
              url: "models/identifica.php",
              data: ("email="+email+"&pass="+pass),
              beforeSend: function(){
               $("#password").parent().children("span").html('<font >Iniciando sesión ...</font> <img class="img-load" src="img/loading.gif"/>').show();
              },
      success: function(data){
                  if(data == "1"){
                      window.location="dashboardAdmin.php";
                  }
                  else if(data == "2"){
                      window.location="dashboardAdmin.php";
                        }
                  else   if(data == "3"){
                          $("#password").parent().children("span").html('Hola cliente').show();
                        }
                   else if(data == "4"){
                          $("#password").parent().children("span").html('Usuario o contraseña incorrectos').show();
                        }
                  else if(data == "5"){
                          $("#password").parent().children("span").html('Error en la conexión, consulte con el administrador').show();
                          }
                  else if(data == "6"){
                             $("#password").parent().children("span").html('Debe llenar los campos').show();
                          }

               }//cierra funcion success
         }); //cierra ajax
    }


function Ccorreo(){
    if(validaMail("email")==true){
    var email = $("#email").val();
            $.ajax({
                type: "POST",
                url: "models/comprobar.php",
                data: ("dato="+email+"&caso=mail"),
                beforeSend: function(){
                  $("#iconoemail").remove();
                  $().parent().removeClass("has-error");
                  $("#email").parent().children("span").html('<font class="sombra">Verificando</font> <img class="img-load" src="img/loading.gif"/>').show();

                //  $("#email").parent().children("span").html('<font class="sombra">Verificando</font>').show();
                },
        success: function(data){
                    $("#iconoemail").remove();
                    $("#email").parent().addClass("has-success has-feedback");
                    $("#email").parent().children("span").html('').hide();
                    $("#email").parent().append("<span id='iconoemail' class='glyphicon glyphicon-ok form-control-feedback'></span>");

                    if(data == "2"){
                    $("#iconoemail").remove();
                    $("#email").parent().addClass("has-error has-feedback");
                    $("#email").parent().children("span").html('Este correo ya existe.').show();
                    $("#email").parent().append("<span id='iconoemail' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    $("#email").focus();
                    $("#email").val('');
                    }
                 }
            });
        }
    }

     function validaTexto(id) {

       var letras = /[A-Za-z]/;
       var numeros = /[a-zA-Z0-9]/;

       if ($("#"+id).val().match(letras)) {
         $("#icono"+id).remove();
         $("#"+id).parent().removeClass("has-error");
         $("#"+id).parent().addClass("has-success  has-feedback");
         $("#"+id).parent().children("span").text("").hide();
         $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
         return true;
       }


      else if($("#"+id).val().match(numeros))   {
        $("#icono"+id).remove();
        $("#"+id).parent().addClass("has-error has-feedback");
        $("#"+id).parent().children("span").text("Este campo no puede tener numeros").show();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
      }

     };

    function validaMail(id){
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    if( $("#"+id).val() == null || $("#"+id).val() == "" ){
        $("#icono"+id).remove();
        $("#"+id).parent().addClass("has-error has-feedback");
        $("#"+id).parent().children("span").text("Debe ingresar algun caracter").show();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;

    }
    else if( !emailreg.test($("#"+id).val()) ) {
        $("#icono"+id).remove();
        $("#"+id).parent().addClass("has-error has-feedback");
        $("#"+id).parent().children("span").text("ingresa un email correcto como mail@ejemplo.com").show();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
    }
    else{
        $("#icono"+id).remove();
        $("#"+id).parent().removeClass("has-error");
        $("#"+id).parent().addClass("has-success  has-feedback");
        $("#"+id).parent().children("span").text("").hide();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
    }
}

function validaUser(id){
  if($("#"+id).val().length < 8){
      $("#icono"+id).remove();
      $("#"+id).parent().addClass("has-error has-feedback");
      $("#"+id).parent().children("span").text("El nombre de usuario debe contener al menos 8 caracteres").show();
      $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
      return false;
  }
  else{
      $("#icono"+id).remove();
      $("#"+id).parent().removeClass("has-error");
      $("#"+id).parent().addClass("has-success  has-feedback");
      $("#"+id).parent().children("span").text("").hide();
      $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
      return true; // se devuelve true para enviar formulario
  }
}

function validaContra(id){
    var contra= /^[a-zA-Z0-9]$/;
    if( $("#"+id).val() == null || $("#"+id).val() == "" ){
        $("#icono"+id).remove();
        $("#"+id).parent().addClass("has-error has-feedback");
        $("#"+id).parent().children("span").text("Este campo no puede estar vacio.").show();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;

    }
    else if($("#"+id).val().length < 6){
        $("#icono"+id).remove();
        $("#"+id).parent().addClass("has-error has-feedback");
        $("#"+id).parent().children("span").text("Este campo debe contener al menos 6 caracteres").show();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
    }
    else{
        $("#icono"+id).remove();
        $("#"+id).parent().removeClass("has-error");
        $("#"+id).parent().addClass("has-success  has-feedback");
        $("#"+id).parent().children("span").text("").hide();
        $("#"+id).parent().append("<span id='icono"+id+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
    }
}


//comprobamos si el password introducido coincide con la comprobacion
function repass(e) {
        var pass = $("#password").val();
        var re_pass=$("#repass").val();
	 if(pass != re_pass)
        {
                  $("#iconorepass").remove();
                  $("#repass").parent().addClass("has-error has-feedback");
                  $("#repass").parent().children("span").html('las contraseñas no coinciden').show();
                  $("#repass").parent().append("<span id='iconorepass' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;
        }
        else if(pass == re_pass)
        {
                  $("#iconorepass").remove();
                  $("#repass").parent().removeClass("has-error has-feedback");
                  $("#repass").parent().addClass("has-success has-feedback");
                  $("#repass").parent().children("span").html('').show();
                  $("#repass").parent().append("<span id='iconorepass' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            return true;
	// Si el script ha llegado a este punto, todas las condiciones
	// se han cumplido, por lo que se devuelve el valor true

        }
    }//fin keyup repass
