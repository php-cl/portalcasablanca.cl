<?php
 require_once('conexion.php'); 
  // Funcion para imprimir familia

function imprimefamilia($familia){
  mysql_query ("SET NAMES 'utf8'");
  $sql = "SELECT * FROM ".$familia." ORDER BY nombre ";
  $query = mysql_query($sql);
  while ($row = mysql_fetch_array($query)) 
     {
	      $cant = DameTotalCategoria($row['nombre'],'tanuncios');
        if ( $cant > 0) {
              echo "<a class='negrita' href=\"buscar.php?cat=".str_replace(" ", "_",$row['nombre'])."&pos=1\">".$row['nombre'];
              echo " (".$cant.")";
              echo "</a></br>";
        }
        else{
             echo $row['nombre'];
             echo "</a></br>";
        }
     }
}

function insertarArticulo($Categoria,$titulo,$fdesc,$foto,$precio,$tipo,$userid){
    mysql_query ("SET NAMES 'utf8'");
    $date = date("Y-m-d");
    $q = "INSERT INTO tanuncios (titulo, categoria, fdesc, fecha, imgmin, precio, tipo, iduser ) VALUES ('$Categoria','$titulo','$fdesc', '$date', '$foto','$precio', '$tipo' , '$userid')";
    echo $q;
    $rs = mysql_query($q);
}


function EditarArticulo($titulo, $categoria,$fdesc,$foto,$precio,$tipo,$userid,$id){
    mysql_query ("SET NAMES 'utf8'");
    $Nombre_fichero = dameImagenX($id);
    unlink("imagenes/".$Nombre_fichero);
    $date = date("Y-m-d");
    $q = "UPDATE tanuncios SET titulo='$titulo', fdesc='$fdesc' , precio='$precio' , imgmin='$foto' , categoria='$categoria' WHERE id='$id'";
    echo $q;
    $rs = mysql_query($q);
}




function DameTotalAnuncio($sql){
        // Calculamos el total de registros
         $sqltemp = $sql;
         $resultemp = mysql_query($sqltemp);
         $total_registros = mysql_num_rows($resultemp);
         return $total_registros;
       }



function imprimeproductos($texto,$categoria,$vendedor,$ini){

  //echo "Texto:".$texto.",Cat:".$categoria.",Vendedor:".$vendedor.",".$ini;


   mysql_query ("SET NAMES 'utf8'"); 
   $limit_end = 25; 
   $init = ($ini-1) * $limit_end;
   $select = " LIMIT $init, $limit_end";
   $url = basename($_SERVER ["PHP_SELF"]);


   if ($categoria == "*")  $categoria = "";
   if ($texto == "*")  $texto = "";
     

    if ($vendedor == "*")
    {

            $sql = "SELECT * FROM tanuncios WHERE titulo like '%".$texto."%' and categoria like '%".$categoria."%'  ORDER BY fecha DESC";
            $sql_temp = $sql; 
            $sql .= " LIMIT $init, $limit_end";
   }

  else
   {
    $id = dameIdVenddedor($vendedor);
    $sql = "SELECT * FROM tanuncios WHERE iduser = '$id'  ORDER BY fecha DESC";
    $sql_temp = $sql; 
    $sql .= " LIMIT $init, $limit_end";
  }
  
   $total_registros = DameTotalAnuncio($sql_temp);
   $total = ceil($total_registros/$limit_end);

  if ($total_registros != 0)
  {
   echo "<table class=\"table table-hover\">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Foto</th>                        
            <th>Titulo</th>
            <th>Vendedor</th>
          </tr>
        </thead>
        <tbody>
         ";
 }
 else{
   echo "<div class='alert alert-danger alert-dismissible' role='alert'>
<button class='close' aria-label='Close' data-dismiss='alert' type='button'>
<span aria-hidden='true'>×</span>
</button>
<strong>No existen registros:</strong>
Pruebe con otro valor
</div>";
 }

  $query = mysql_query($sql);
  while ($row = mysql_fetch_array($query)) 
    { 
       
       if ($row['tipo'] == 0) {
        echo "<tr class='danger'>";
       }
       else{
         echo "<tr>";
       }
       $date = date("Y-m-d");
       if ($row['fecha'] == $date){
          echo "<th scope=\"row\"> Hoy </th>";
       }
       else{
        echo "<th scope=\"row\">".$row['fecha']."</th>";
       }
       
       $precio = number_format($row['precio']);


       echo "<th scope=\"row\">$".$precio."</th>";
       echo "<td>";
       echo "<a href='articulo.php?id=".$row['id']."'>";
       echo "<div class='caja-imagen'>";
       if ($row['imgmin'] == ""){
           echo"<img class=\"media-object mymedia-img\"  data-src=\"holder.js/64x64\"  src=\"imagenes/0.jpg \" data-holder-rendered=\"true\">";
          } 
          else{
           echo"<img class=\"media-object mymedia-img\"  data-src=\"holder.js/64x64\"  src=\"imagenes/".chequeaImagen($row['imgmin'])."\" data-holder-rendered=\"true\">";
 
          }
       echo "</div>";
       echo "</a>";
       echo "</td>";
       $unaParteDemiTexto = substr($row['fdesc'], 0, 200)."...";
       echo "<td><strong>".$row['titulo']." </strong> ".$unaParteDemiTexto."</td>";
       echo "<td>";
       $nombre = damenCampoVendedorporId($row['iduser'],"display_name");
       echo "<p><a href='buscar.php?vendedor=".$nombre."'><strong>".$nombre."</strong></a></br>"; 
       //echo "".damenTelefonoVendedorporId($row['iduser'])."</br>";       
       echo "<a href=\"mailto:".damenMailVendedorporId($row['iduser'])."\">".damenMailVendedorporId($row['iduser'])."</a></br>";
       echo "<br>";
       echo "<a href='articulo.php?id=".$row['id']."' class='btn btn-success'>Ver más</a>";
       echo "</p>";
       echo "</td>";
       echo "</tr>";
     }

     echo "        </tbody>
      </table>
    </div>";

    // Paginacion

  $cadenalink = "";
  //echo "Texto:".$texto.",Cat:".$categoria.",Vendedor:".$vendedor.",".$ini;

  if ($categoria != "") $cadenalink = "&cat=".$categoria;
  if ($texto != "") $cadenalink = $cadenalink."&texto=".$texto;
  if ($vendedor != "*") $cadenalink = $cadenalink."&vendedor=".$vendedor;    

       if($total != 0){

 echo " <nav class='centrado'>";

  /* numeración de registros [importante]*/
  echo "<ul class='pagination'>";
  /****************************************/
  if(($ini - 1) == 0)
  {
    echo "<li><a href='#'>«</a><li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini-1).$cadenalink."'><b>«</b></a></li>";
  }
  /*********************************** *****/
  for($k=1; $k <= $total; $k++)
  {
    if($ini == $k)
    {
      echo "<li><a href='#'><b>".$k."</b></a></li>";
    }
    else
    {
      echo "<li><a href='$url?pos=$k".$cadenalink."'>".$k."</a></li>";
    }
  }
  /****************************************/
  if($ini == $total)
  {
    echo "<li><a href='#'>»</a></li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini+1).$cadenalink."'><b>»</b></a></li>";
  }
  /*******************END*******************/
  echo "</ul>";
  echo"</nav>";
}


}




function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}
  




function damenNombreVendedorporId($id){
         $sql="SELECT * FROM uc_users WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['user_name'];
}





function damenCampoAnuncioporId($id,$campo){
         mysql_query ("SET NAMES 'utf8'"); 
         $sql="SELECT * FROM tanuncios WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3["$campo"];
}


function damenCampoVendedorporId($id,$campo){
         $sql="SELECT * FROM uc_users WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3["$campo"];
}




function dameIdVenddedor($nombrevisual){
         $sql="SELECT * FROM uc_users WHERE display_name = '$nombrevisual'";

         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['id'];
}



function damenTelefonoVendedorporId($id){
         $sql="SELECT * FROM uc_users WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['telefono'];
}

function damenMailVendedorporId($id){
         $sql="SELECT * FROM uc_users WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['email'];
}

function damenMailVendedorporName($name){
         $sql="SELECT * FROM uc_users WHERE display_name = '$name'";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['email'];
}



function dameImagen($id){
         $sql="SELECT * FROM tanuncios WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return chequeaImagen($res3['imgmin']);
}


function dameImagenX($id){
         $sql="SELECT * FROM tanuncios WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['imgmin'];
}


function dameNombre($id){
         $sql="SELECT * FROM tanuncios WHERE id = $id";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return damenNombreVendedorporId($res['ida']);
}





function chequeaImagen($nombre){
  $file = "imagenes/".$nombre;
  if (file_exists($file)) 
     {
       return $nombre;
     }      
     else {
       return "0.jpg";
  }
}



function DameTotal($tabla){
        // Calculamos el total de registros
         $sqltemp = "SELECT * FROM ".$tabla;  // sentencia sql
         $resultemp = mysql_query($sqltemp);
         $total_registros = mysql_num_rows($resultemp);
         return $total_registros;
       }



function damePlanVendedor($nombre){
         $sql="SELECT * FROM uc_users WHERE display_name = '$nombre'";
         $res = mysql_query($sql);
         $res3 = mysql_fetch_array($res);
         return $res3['Plan'];
}



function DameTotalCategoria($categoria,$tabla){
         $sqltemp = "SELECT * FROM ".$tabla." WHERE categoria = '$categoria'";  // sentencia sql
         $resultemp = mysql_query($sqltemp);
         $total_registros = mysql_num_rows($resultemp);
         return $total_registros;
}

function DameTotalAnunciosVendedor($nombre){
         $id = dameIdVenddedor($nombre);
         $sqltemp = "SELECT * FROM tanuncios WHERE iduser='$id' ";  // sentencia sql
         $resultemp = mysql_query($sqltemp);
         $total_registros = mysql_num_rows($resultemp);
         return $total_registros;   
}



function DameElPrimerID(){
       $sql = "SELECT * FROM tanuncios limit 1";  // sentencia sql
       $res = mysql_query($sql);
       $res3 = mysql_fetch_array($res);
       return $res3['id'];
}


function DameTotalGrupo($tabla){
  mysql_query ("SET NAMES 'utf8'");
  $sql = "SELECT * FROM ".$tabla;
  $query = mysql_query($sql);
  $temp = 0;
   while ($row = mysql_fetch_array($query)) 
     {
        $campo = $row['nombre'];
        $temp = DameTotalCategoria($campo,'tanuncios') + $temp; 
     }
    
   if ($temp == 0){
      
   }
   else{
      echo "<span class='badge'>".$temp."</span>";
   }
   
}



function llenarCategorias($selecionado)
{
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> - Inmuebles - </option>";
  imprime_familia_option('tc_inmuebles',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> - Vehículos - </option>";
  imprime_familia_option('tc_vehiculos',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> - Hogar - </option>";
  imprime_familia_option('tc_hogar',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> - Servicios - </option>";
  imprime_familia_option('tc_servicios',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Electrónica - </option>";
  imprime_familia_option('tc_electronica',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Empleo  - </option>";
  imprime_familia_option('tc_empleo',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Moda  - </option>";
  imprime_familia_option('tc_moda',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Locales  - </option>";
  imprime_familia_option('tc_locales');
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Salud  - </option>";
  imprime_familia_option('tc_salud',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Deporte  - </option>";
  imprime_familia_option('tc_deporte',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Turismo  - </option>";
  imprime_familia_option('tc_turismo',$selecionado);
  echo "<option disabled='disabled' style='background-color:#dcdcc3;font-weight:bold;'> -  Hospedaje  - </option>";
  imprime_familia_option('tc_hospedaje',$selecionado);
}



function imprime_familia_option($familia,$selecionado){
  mysql_query ("SET NAMES 'utf8'");
  $sql = "SELECT * FROM ".$familia." ORDER BY nombre ";
  $query = mysql_query($sql);
  while ($row = mysql_fetch_array($query)) 
     {
       if ($selecionado == $row['nombre']){
         echo "<option selected  value='".$row['nombre']."'> ".$row['nombre']." </option>";
       }
       else{
         echo "<option value='".$row['nombre']."'> ".$row['nombre']." </option>";
       }
       
     }
}

function InsertarComentario($nombre, $correo, $comentario, $id){
    $date = date("Y-m-d");
    $q = "INSERT INTO tcomentarios (nombre, correo, comentario, ida,fecha ) VALUES ('$nombre','$correo','$comentario','$id' , '$date')";
    $rs = mysql_query($q);
    // Confirmando comentario
    $para= damenMailVendedorporId($id);
    $titulo = "Comentario:".$date;
    $mensaje   = $comentario;
    $de   = $correo;
    $mensaje=stripcslashes($mensaje);
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabeceras .= 'From: Portal Casablanca <'.$de.'>' . "\r\n";     
    mail($valor, $titulo, $mensaje, $cabeceras);
}

function EliminarComentario($id){
  $sql = "DELETE FROM tcomentarios WHERE ida='$id' ";
  $rs = mysql_query($sql);
  echo $sql;
  if($rs == false) {
   echo '<p>Error al eliminar los campos en la tabla.</p>';
  }  else{
    echo '<p>Los datos se han eliminado correctamente.</p>';
  }
}

function EliminarImagen($img){
   unlink("imagenes/".$img);
}





?>