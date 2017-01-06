<?php  require("header.php");
require_once('assets/include/function.php');
?>  

<div class="container">
 	
	<div class="main-contacto">
	  <div class="row centered">
          <div class="col-lg-8 col-lg-offset-2">
		<h1>Contacto</h1>
		<br>
		<form class="contacto" enctype="plain" method="post" role="form">
			<div class="form-group">
				<label for="name1">Tu nombre</label>
				<input id="name1" class="form-control nombre" type="text" required="" placeholder="Tu nombre" name="Name">
			</div>
			<div class="form-group">
				<label for="name1">Tu teléfono</label>
				<input id="name1" class="form-control telefono" type="text" required="" placeholder="Telefono" name="telefono">
			</div>
			<div class="form-group">
				<label for="email1">Tu correo</label>
				<input id="email1" class="form-control email" type="email" required="" placeholder="Tu correo" name="Mail">
			</div>
			<div class="form-group">
				<label>Tu texto</label>
				<textarea class="form-control mensaje" required="" rows="3" name="Message"></textarea>
			</div>
			<br>
			<div class="ultimo">
				<img class="ajaxgif hide" src="assets/img/ajax.gif">
				<div class="msg"></div>
			</div>
			<br>
			<button class="btn btn-large btn-success boton_envio" type="submit">ENVIAR</button>
		</form>
	   </div>
	</div>

    </div>
    </div>	
</div>

</div>

<script>
	    $(".boton_envio").click(function() {
 
        var nombre = $(".nombre").val();
            email = $(".email").val();
            validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            telefono = $(".telefono").val();
            mensaje = $(".mensaje").val();
            dest = "mfalcon@portalcasablanca.cl";
 
        if (nombre == "") {
            $(".nombre").focus();
            return false;
        }else if(email == "" || !validacion_email.test(email)){        	
            $(".email").focus();    
            return false;
        }else if(telefono == ""){
            $(".telefono").focus();
            return false;
        }else if(mensaje == ""){
            $(".mensaje").focus();
            return false;
        }else{
            $('.ajaxgif').removeClass('hide');
            var datos = 'nombre='+ nombre + '&email=' + email + '&telefono=' + telefono + '&mensaje=' + mensaje + '&dest=' + dest;
            $.ajax({
                type: "POST",
                url: "assets/include/proceso_mail.php",
                data: datos,
                success: function() {
                    $('.boton_envio').prop('disabled', true);
                    $('.ajaxgif').hide();
                    $('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);  
                },
                error: function() {
                    $('.ajaxgif').hide();
                    $('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);                 
                }
            });
            return false;
        }
 
    });

	</script>


<?php  require("footer.php") ?>
