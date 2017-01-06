<?php  require("header.php");
require_once('assets/include/function.php');
?>  
 		

 <div class="main-tools">
 	<div class="container">

			<div class="row">
                <div class="col-lg-12">
                    <div class="jumbotronmy">
                    	<h3>Insertar tú aviso grátis</h3>
                    	<br>
                           <form role="form" method="post" enctype="plain" class="contacto" method="POST"> 
                    		<div class="form-group">
                    			<label for="exampleInputEmail1">Categoría</label>
                    			<select class="form-control fcategoria" name="fcategoria" required="" >
                    				<option id="cat1000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="1000"> -- Inmuebles -- </option>
                    				<option id="cat1020" value="1020"> Departamentos y piezas </option>
                    				<option id="cat1040" value="1040"> Casas </option>
                    				<option id="cat1060" value="1060"> Oficinas </option>
                    				<option id="cat1080" value="1080"> Comercial e industrial </option>
                    				<option id="cat1100" value="1100"> Terrenos </option>
                    				<option id="cat1120" value="1120"> Estacionamientos, bodegas y otros </option>
                    				<option id="cat2000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="2000"> -- Vehículos -- </option>
                    				<option id="cat2020" value="2020"> Autos, camionetas y 4x4 </option>
                    				<option id="cat2060" value="2060"> Motos </option>
                    				<option id="cat2040" value="2040"> Camiones y furgones </option>
                    				<option id="cat2100" value="2100"> Accesorios y piezas para vehículos </option>
                    				<option id="cat2080" value="2080"> Barcos, lanchas y aviones </option>
                    				<option id="cat2120" value="2120"> Otros vehículos </option>
                    			</select>
                    		</div>


                    		<div class="form-group">
                    			<label for="exampleInputPassword1">Título</label>
                    			<input type="text" class="form-control ftitulo" id="ftitulo" placeholder="" required="" value="Ejemplo">
                    		</div>

                    		<div class="form-group">
                    			<label for="exampleInputPassword1">Descripción</label>
                    			<textarea class="form-control fdescripcion" rows="6">ejemplo</textarea>
                    		</div>

                    		<div class="form-group">
                    			<label for="exampleInputPassword1">Precio</label>
                    			$ <input type="text" class="form-control fprecio" id="fprecio" placeholder="" required="" value="5000">
                    		</div>

                    		



                    		<div class="form-group">
                    			<label for="exampleInputFile">Adjuntar Imagenes</label>
                    			<input type="file" id="exampleInputFile1">
                    			<input type="file" id="exampleInputFile2">
                    			<input type="file" id="exampleInputFile3">
                    			<p class="help-block"><strong>Tipo de formato:</strong> jpg,png,bmp. <strong>Tamaño máximo:</strong> 1 mega</p>
                    		</div>

<div class="form-group">
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> Vendo
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Compro
</label>
</div>


                    </div>

<?php   

          echo "            <br>";
     echo "    <button type=\"submit\" class=\"btn btn-default\">Submit</button>";
 echo "   </form>";

                  



?>




<script>
	    $(".boton_envio").click(function() {
 
        var categoria = $(".fcategoria").val();
            titulo = $(".ftitulo").val();
            desc = $(".fdescripcion").val();
            precio = $(".fprecio").val();

            nombre = $(".fnombre").val();
            ftelefono = $(".ftelefono").val();
            email = $(".fcorreo").val();
            password = $(".fpassword").val();
            validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            
 
        if (categoria == "") {
            $(".fcategoria").focus();            
            return false;
        }else if(email == "" || !validacion_email.test(email)){        	
            $(".fcorreo").focus();    
            return false;
        }else if(telefono == ""){
            $(".ftelefono").focus();
            return false;
        }else if(desc == ""){
            $(".fdescripcion").focus();
            return false;
        }else{
            $('.ajaxgif').removeClass('hide');
            var datos = 'nombre='+ nombre + '&email=' + email + '&telefono=' + telefono + '&mensaje=' + mensaje;
            $.ajax({
                type: "POST",
                url: "assets/include/proceso_mail.php",
                data: datos,
                success: function() {
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




</div>


                 </div>
   </div>
 </div>




	<?php  require("footer.php") ?>
