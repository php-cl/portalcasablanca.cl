<?php  require("header.php");

if(isset($_GET['id'])){
  {
    $temp=$_GET['id'];
  }

}

else{
  $temp = DameElPrimerID(); 
} 

?> 


<?php 
if($_POST)
{
  if (isset($_POST['CoCuName']))
  {
   $nombre = $_POST['CoCuName'];
   $email = $_POST['CoCuMail'];
   $texto = $_POST['CoCuTexto'];
   $id = $_POST['CoCuID'];
   $temp = $id ;
   InsertarComentario($nombre, $email, $texto, $id);
   header("Location: articulo.php?id=".$id);
 }
}

if($_POST)
{
  if (isset($_POST['contacto_nombre']))
  {

    $temp = $_POST['ftemp'];
    $mensaje=stripcslashes($mensaje);
    $nombre = $_POST['contacto_nombre'];
    $email = $_POST['contacto_mail'];
    $telefono = $_POST['contacto_telefono'];
    $idv = $_POST['idv'];


    $dest = damenCampoVendedorporId($idv,"email");

// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
    $headers = "From: $nombre <$email>\r\n";  
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Aqui definimos el asunto y armamos el cuerpo del mensaje
    $asunto = "Contacto Portalcasablanca.cl";
    $cuerpo = "Nombre: ".$nombre."<br>";
    $cuerpo .= "Email: ".$email."<br>";
    $cuerpo .= "Telefono: ".$telefono."<br>";
    $cuerpo .= "Mensaje: ".$mensaje;

// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
    if($nombre != '' && $email != '' && $telefono != '' && $mensaje != ''){
    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
  }


}
}

?>

<div class="main-tools buscarform">
  <?php
  mysql_query ("SET NAMES 'utf8'");
  $sql = "SELECT * FROM tanuncios WHERE id = $temp";
  $res = mysql_query($sql);
  $res3 = mysql_fetch_array($res);
   // Variables
  $titulo = $res3['titulo'];
  $categoria = $res3['categoria'];
  $nombre_vendedor = $res3['iduser'];
  ?>
  <br>
  <div class="container">
   <div class="row">
    <div class="col-lg-4">
      <?php 
      if ($res3['tipo'] == 1){
        $tipo = "Vendo";
      }
      else{
        $tipo = "Compro";
      }      
      $id_vend = $res3['iduser'];
      $web = damenCampoVendedorporId($res3['iduser'],"web");
      $mailtemp = damenCampoVendedorporId($res3['iduser'],"email");
      ?>      
      <div class="jumbotronmy">
        <div class="list-group">
          <a href="#" class="list-group-item"><strong>Nombre:</strong>    <?php echo damenCampoVendedorporId($res3['iduser'],"display_name") ?></a>
          <a href="#" class="list-group-item"><strong>Mail:</strong>     <?php echo damenCampoVendedorporId($res3['iduser'],"email") ?></a>
          <a href="#" class="list-group-item"><strong>Tipo:</strong>    <?php echo $tipo ?></a>
          <a href="#" class="list-group-item"><strong>Precio:</strong> <?php echo "$ ".number_format($res3['precio']) ?></a>
        </div>
        <?php 
        if (isUserLoggedIn())
        {
         $nombrex = $loggedInUser->displayname;
         $mailx =  damenMailVendedorporName($loggedInUser->displayname);
         $idv = dameIdVenddedor($loggedInUser->displayname);
         $telefonox = damenTelefonoVendedorporId($idv);  
       }
       else{
         $nombrex = "";
         $mailx = "";
         $telefonox = "";
       }
       ?>
       <form enctype="plain" method="post" role="form">
        <input type="hidden" class="dest" value="<?php echo $mailtemp ?>" name="ftemp">
        <input type="hidden"  value="<?php echo $idv ?>" name="idv">
        <div class="form-group">
          <div class="controls">
            <div class="input-group">
              <span class="input-group-addon">
               <i class="fa fa-user"></i>
             </span>        
             <input type='hidden' class="dest" name='dest'   value="<?php echo $mailtemp ?>"/>
             <input type='text' class="form-control nombre" name='contacto_nombre'required="" placeholder="Tu nombre" value="<?php echo $nombrex ?>"/>
           </div>
         </div>
       </div>
       <div class="form-group">
        <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
             <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
           </span>
           <input type='text' class="form-control email" name='contacto_mail'required="" placeholder="Tu mail" value="<?php echo $mailx ?>" />
         </div>
       </div>
     </div>
     <div class="form-group">
      <div class="controls">
        <div class="input-group">
          <span class="input-group-addon">
           <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
         </span>
         <input type='text' class="form-control telefono" name='contacto_telefono'required="" placeholder="Tu telefono" value="<?php echo $telefonox ?>"/>
       </div>
     </div>
   </div>
   <textarea class="form-control mensaje" rows="3" placeholder="Enviar un correo" name='contacto_texto'></textarea>
   <br>
   <div class="ultimo">
    <img class="ajaxgif hide" src="assets/img/ajax.gif">
    <div class="msg"></div>
  </div>
  <br>
  <button value='Login' class="btn btn-block btn-success boton_envio2" type="submit">Enviar</button>
</form>
</div>       
</div>

<script>
$(".boton_envio2").click(function() {

  var nombre = $(".nombre").val();
  email = $(".email").val();
  validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
  telefono = $(".telefono").val();
  mensaje = $(".mensaje").val();
  dest = $(".dest").val();

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
        $('.boton_envio2').prop('disabled', true);
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


<div class="col-lg-8">
  <div class="jumbotronmy2">  
   <ol class="breadcrumb">
    <li><a href='buscar.php'>Todos</a></li>
    <li><a href='buscar.php?cat=<?php echo $categoria ?>'><?php echo $categoria ?></a></li>
  </ol>
  <div>
   <h3><?php echo $titulo ?></h3>
   <div id="content" class="jumbotronmy">
     <img class="mymedia1-img img-responsive" src="imagenes/<?php echo dameImagen($temp); ?>" alt="">
   </div> 



<?php 

$source_url = dameURL();
$url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
$xml = file_get_contents($url);
$xml = simplexml_load_string($xml);
$shares =  $xml->link_stat->share_count;
$likes =  $xml->link_stat->like_count;
$comments = $xml->link_stat->comment_count;
$total = $xml->link_stat->total_count;
$max = max($shares,$likes,$comments);

?>


 <span class="fa-stack fa-lg">
    <i class="fa fa-circle fa-stack-2x"></i>
    <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
 </span>  <?php echo $likes ?>

<span class="fa-stack fa-lg">
    <i class="fa fa-circle fa-stack-2x"></i>
    <i class="fa fa-share fa-stack-1x fa-inverse"></i>
</span>  <?php echo $shares ?>


<span class="fa-stack fa-lg">
    <i class="fa fa-circle fa-stack-2x"></i>
    <i class="fa fa-comment-o fa-stack-1x fa-inverse"></i>
</span>  <?php echo $comments ?>


<a href="http://www.facebook.com/sharer.php?u=<?php echo dameURL() ?>">    
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
    </span>
</a>

<br>
  



  <br>
  <?php 


  if (isUserLoggedIn())
  {
    if ( dameIdVenddedor($loggedInUser->displayname) == $id_vend){
     echo "<br>
     <a class='btn btn-danger' href='eliminar.php?id=".$temp."' onclick=\"if(confirm('Esta seguro que desea Eliminar?') == false){return false;}\">Borrar</a>
     <a class='btn btn-warning' href='editar_aviso.php?id=".$temp."'>Editar</a>
     <br>";
   }
 }


 ?>




 <br>
 <div class="jumbotronmy">
   <p> <?php echo $res3['fdesc'] ?> </p>
 </div>
</div>
<hr>
<h3>Comentarios:</h3>

<div class="well">


  <form action="articulo.php" enctype="plain" method="post" role="form">
    <input id="name1" class="form-control" type="hidden" readonly="" value="<?php echo $temp ?>" placeholder="Tu nombre" name="CoCuID">
    <div class="form-group">
      <label for="name1">Nombre</label>
      <input id="name1" class="form-control" type="name" required="" placeholder="nombre" name="CoCuName" value="<?php echo $nombrex ?>">
    </div>
    <div class="form-group">
      <label for="email1">Correo</label>
      <input id="email1" class="form-control" type="email" required="" placeholder="correo" name="CoCuMail" value="<?php echo $mailx ?>" >
    </div>
    <div class="form-group">
      <label for="name1">Comentario</label>
      <textarea class="form-control" rows="3" name="CoCuTexto"></textarea>
    </div>
    <button class="btn btn-success" type="submit">Enviar</button>
  </form>

</div>

<hr>






<?php
mysql_query ("SET NAMES 'utf8'");
$sql = "SELECT * FROM tcomentarios WHERE ida = $temp";
$query = mysql_query($sql);
while ($row = mysql_fetch_array($query)) 
{ 

  echo "<div class='media'>
  <a class='pull-left' href='#'>
  <img class='media-object myimg4 ' src='assets/img/comentarios.png' style='width: 50px; height: 50px;'>
  </a>  
  <div class='media-body'>
  <h4 class='media-heading'>
  ".$row['nombre']."
  <small>".$row['fecha']."</small>
  <br>
  <small>".$row['correo']."</small>
  </h4>
  ".$row['comentario']."
  </div>
  </div>";

}



?>




<br>
</div>
</div>
</div>
</div>
</div>
</div>



<?php  require("footer.php") ?>
