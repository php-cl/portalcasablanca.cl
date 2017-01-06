<?php  require("header.php");
require_once('assets/include/function.php');


// Si estas buscando por Categoria [1]
if(isset($_GET['cat']))
{
  {
    $temp_cat=str_replace("_", " ",$_GET['cat']);
  } 
}

else {
 $temp_cat="*";
}


// Si estas buscando por Vendedor [2]
if(isset($_GET['vendedor']))
{
  $vendedor = $_GET['vendedor'];
}

else{
  $vendedor = "*";
}

$varlor_buscar="";



// Si estas buscando por Descripcion [3]

if (isset($_GET['buscar']))
  {
     $varlor_buscar = $_GET['buscar'];     
  }


else {
 $varlor_buscar ="*";
}




// Si estas buscando por Posicion[4]
if (isset($_GET['pos']))
              $ini=$_GET['pos'];
          else
             $ini=1; 

?>


<div class="main-tools buscarform">
  <br>
  <div class="container">
   <div class="row">
    <div class="col-lg-4">
      <div class="jumbotronmy">
       <form role="form" enctype="plain" class="contacto" method="GET" action="buscar.php">          
         
         
         <div class="input-group">
           <input name="pos" type="text" value="<?php echo $ini ?>" hidden>
        </div>



         <div class="input-group">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-search"></i>
          </span>
          <input name="buscar" class="form-control ng-valid ng-dirty" type="text"  placeholder="Ej: casa, auto, renta">
        </div>



       <br>
       <button type="submit" class="btn btn-success">Buscar</button>  
       </form>                          
     </div>


    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Categoria:</strong> <?php echo $temp_cat ?>
    </div>

    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Valor buscado:</strong> <?php echo $varlor_buscar ?>
    </div>

    <!--
    <div>
       <img src="publicidad/zona3_navidad_1.jpg" class="img-responsive" alt="">
    </div>

    <br>

    <div>
        <img src="publicidad/zona4_navidad.jpg" class="img-responsive" alt="">
    </div>
   -->
  



  </div>
  <div class="col-lg-8">
   <ol class="breadcrumb">
    <li><a href='buscar.php'>Todos</a></li>
    <li><a href='buscar.php?cat=<?php echo $temp_cat ?>'><?php echo $temp_cat ?></a></li>
  </ol>
  <div class="jumbotronmy2">
    <div class="bs-example" data-example-id="hoverable-table">

          <?php
             imprimeproductos($varlor_buscar,$temp_cat,$vendedor,$ini);
          ?>         

  </div>
</div>
</div>
</div>
</div>
<?php  require("footer.php") ?>
