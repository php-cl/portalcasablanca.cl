<?php  require("header.php");
require_once('assets/include/function.php');


if(isset($_POST['submit'])){ // comprobamos que se ha enviado el formulario

            // Insertando los datos en la base de datos    
          $titulo = $_POST['ftitulo'];
          $categoria = $_POST['fcategoria'];
          $desc = $_POST['fdesc'];
          $precio = $_POST['fprecio'];
          $tipo = 0;
          $userid = dameIdVenddedor($mydisplayname);

 
          if  ($_POST['inlineRadioOptions1']=="Vendo")
          { 
             $tipo = 1;   
          } 


   // comprobar que han seleccionado una foto
    if($_FILES['foto']['name'] != ""){ // El campo foto contiene una imagen...
   // Primero, hay que validar que se trata de un JPG/GIF/PNG
      $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
      $extension = end(explode(".", $_FILES["foto"]["name"]));
      if ((($_FILES["foto"]["type"] == "image/gif")
        || ($_FILES["foto"]["type"] == "image/jpeg")
        || ($_FILES["foto"]["type"] == "image/png")
        || ($_FILES["foto"]["type"] == "image/pjpeg"))
        && in_array($extension, $allowedExts)) {
            // el archivo es un JPG/GIF/PNG, entonces...

        $extension = end(explode('.', $_FILES['foto']['name']));
        $foto = substr(md5(uniqid(rand())),0,10).".".$extension;
            $directorio = "imagenes"; // directorio de tu elección
            
            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio.'/'.$foto);
            $pcFoto = 'pc_'.$foto;
            resizeImagen($directorio.'/', $foto, 800, 800,$pcFoto,$extension);
            unlink($directorio.'/'.$foto);

          insertarArticulo($titulo,$categoria,$desc,$pcFoto,$precio,$tipo,$userid);

        } 
          else { // El archivo no es JPG/GIF/PNG
          $malformato = $_FILES["foto"]["type"];
          header("Location: crear_aviso.php?error=noFormato&formato=$malformato");
          exit;
        }
        
    } 
    else 
      { // El campo foto NO contiene una imagen
         //header("Location: crear_aviso.php?error=noImagen");
         insertarArticulo($titulo,$categoria,$desc,"0",$precio,$tipo,$userid);
      //exit;
    }

} // fin del submit

####
## Función para redimencionar las imágenes
## utilizando las liberías de GD de PHP
####

function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
  $rutaImagenOriginal = $ruta.$nombre;
  if($extension == 'GIF' || $extension == 'gif'){
    $img_original = imagecreatefromgif($rutaImagenOriginal);
  }
  if($extension == 'jpg' || $extension == 'JPG'){
    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
  }
  if($extension == 'png' || $extension == 'PNG'){
    $img_original = imagecreatefrompng($rutaImagenOriginal);
  }
  $max_ancho = $ancho;
  $max_alto = $alto;
  list($ancho,$alto)=getimagesize($rutaImagenOriginal);
  $x_ratio = $max_ancho / $ancho;
  $y_ratio = $max_alto / $alto;
    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
      $ancho_final = $ancho;
      $alto_final = $alto;
    } elseif (($x_ratio * $alto) < $max_alto){
      $alto_final = ceil($x_ratio * $alto);
      $ancho_final = $max_ancho;
    } else{
      $ancho_final = ceil($y_ratio * $ancho);
      $alto_final = $max_alto;
    }
    $tmp=imagecreatetruecolor($ancho_final,$alto_final);
    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    imagedestroy($img_original);
    $calidad=70;
    imagejpeg($tmp,$ruta.$nombreN,$calidad);
     }
  ?> 
  <div class="main-tools">
    <div class="container">
     <div class="row">    
      <div class="col-lg-12">
        <div class="jumbotronmy">    
           <h3>Insertar tú aviso</h3>
         <br>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>"
          method="POST"
          enctype="multipart/form-data">
          <div class="form-group">
           <label for="exampleInputEmail1">Categoría</label>
           <select class="form-control fcategoria" name="fcategoria" required="" >
             <?php llenarCategorias(); ?>
           </select>
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Título</label>
           <input type="text" class="form-control ftitulo" name="ftitulo" id="ftitulo" placeholder="Ejemplo" required="" value="">
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Descripción</label>
           <textarea class="form-control fdescripcion" name="fdesc" rows="6" placeholder="ejemplo"></textarea>
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Precio</label>
           $ <input name="fprecio"  type="number" onkeypress='validate(event)' class="form-control fprecio" id="fprecio" placeholder="5000" required="" value="">
         </div>

           <div class="checkbox">
    <label>
      <input type="checkbox" required=""> Usted debe acertar las condiciones que aparecen en este <strong><a href="condiciones.php">link</a><strong>
    </label>
  </div>


         <div class="form-group">
          <label for="exampleInputFile">Adjuntar Imagen</label>
          <input type="file" id="exampleInputFile1" name="foto" class="botonimagen floatmy"><div class="floatmy" id="respuesta"></div>
          <hr>
        </div>
        <p class="help-block"><strong>Tipo de formato:</strong> jpg,png,bmp </p>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="Vendo" checked> Vendo
          </label>
          <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions1" id="inlineRadio2" value="Compro"> Compro
          </label>
        </div>
        <br>
        <div class="ultimo">
          <img src="assets/img/ajax.gif" class="ajaxgif hide" />
          <div class="msg"></div>
        </div>
        <?php 
          $planVende = damePlanVendedor($loggedInUser->displayname);
          $totalAnuncios = DameTotalAnunciosVendedor($loggedInUser->displayname);

         if($totalAnuncios < $planVende)
         { 
            echo "<button type='submit' name='submit' class='btn btn-success'>Insertar</button>";
         } 

         else{
           echo "<button type='submit' name='submit' class='btn btn-success' disabled>Insertar</button>
                 <hr>
                 <div class='alert alert-danger alert-dismissible' role='alert'>
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                 <strong>Máximo de Anuncios:</strong> A alcanzado el número máximo de anuncios para su Plan, si quiere insetar un anuncio gratis tiene que borrar uno, en caso contrario contrate un plan.
                 </div>";
         }

            ?>
      </form>
      <br>
      <?php if(isset($_POST['submit'])) { ?>

      <div class="msg alert alert-success alert-dismissible" role="alert">
        <button class="close" aria-label="Close" data-dismiss="alert" type="button">
          <span aria-hidden="true">×</span>
        </button>
           El anuncio se ha cargado satisfactoriamente!
           <script>
              alert("El anuncio se ha cargado satisfactoriamente!");
           </script>
      </div>
      <?php } ?>
      <br>
    </div>
    <br>
  </div>
</div>
</div>
</div>

   <script>
   
   function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

   </script>

<?php  require("footer.php") ?>
