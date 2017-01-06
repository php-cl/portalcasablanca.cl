<?php
require_once('assets/include/function.php'); 

if(isset($_GET['id']))
{
  $numero=$_GET['id'];

  $Nombre_fichero = dameImagenX($numero);
  unlink("imagenes/".$Nombre_fichero);

  EliminarComentario($numero);
  $sql = "DELETE FROM tanuncios WHERE id = '$numero'";
  mysql_query($sql);
}
   header('location: index.php');   
   ob_end_flush();
?>