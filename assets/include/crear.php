<?php
// Guardar los datos recibidos en variables:
$titulo = $_POST['titulo'];
$desc = $_POST['desc'];

require("conexion.php"); 
$sql="INSERT INTO tanuncios (titulo,desc) VALUES ('".$titulo."','".$desc."')";
$query = mysql_query($sql); 

echo $query;

// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
//if($nombre != '' && $email != '' && $telefono != '' && $mensaje != ''){
//    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
// }
?>