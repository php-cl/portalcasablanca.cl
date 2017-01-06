<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="shortcut icon" href="favicon.png">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/main.css" rel="stylesheet">    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">   
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/chart.js"></script>
  <script type="text/javascript">
  </script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]--> 
  <?php
   require_once('assets/include/function.php');
   if(isset($_GET['id']))
     {
       {
         $temp=$_GET['id'];
       } 
        echo "<title>".damenCampoAnuncioporId($temp,"categoria")." | ".damenCampoAnuncioporId($temp,"titulo")."</title>";
        echo "\n";
        echo "<meta property=\"og:url\" content=\"".dameURL()."\" />";
        echo "\n";
        echo "<meta property=\"og:description\" content=\"".damenCampoAnuncioporId($temp,"fdesc")."\" />";
        echo "\n";
        echo "<meta property=\"og:image\" content=\"imagenes/".damenCampoAnuncioporId($temp,"imgmin")."\" />";
      }

     else{
        echo "<title>PortalCasablanca</title>";
     }
  
  ?>
  </head>
  <body>
  <div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>           
        <div id="navbar" class="navbar-collapse collapse">
          <nav>
                <ul class="nav navbar-nav">
                 <li class="" ><a href="index.php">Inicio</a></li>                                                        
                 
                 <?php
                 

                   if (isUserLoggedIn()){
                        echo "<li><a href=\"user_settings.php\">".$loggedInUser->displayname."</a></li>";
                        echo "<li><a href=\"buscar.php?vendedor=".$loggedInUser->displayname."\">Mis articulos <span class='badge'>".DameTotalAnunciosVendedor($loggedInUser->displayname)."</span> </a></li>";
                        echo "<li><a href=\"logout.php\">Salir</a></li>";
                        $mydisplayname  = $loggedInUser->displayname;
                   }
                   else{
                       echo "<li><a href=\"registrar.php\">Registrar</a></li>";
                       echo "<li><a href=\"login.php\">Login</a></li>";
                   }                 
                 ?>

                 <li class="" ><a href="condiciones.php">Condiciones</a></li> 
                 <li class="" ><a href="contacto.php">Contacto</a></li>                       
  
               </ul>
         </nav>          
          <form class="navbar-form navbar-right">
            <a class="btn btn-warning" href="crear_aviso.php"><i class="fa fa-hand-pointer-o"></i>
 Publicar anuncio</a>
          </form>
          <?php
          $nombre_archivo = basename($_SERVER['PHP_SELF']);
          if ($nombre_archivo != "buscar.php")   
          {
           echo " <form action='buscar.php?' method='GET'  class='navbar-form navbar-right'>"."\n";
           echo " <div class='form-group'>";
           echo " <input class='form-control' name='buscar' type='text' placeholder='Ej: casa, auto, renta'>"."\n";
           echo " </div>";
           echo " <button class='btn btn-success' type='submit'><i class='fa fa-binoculars'></i> Buscar</button>"."\n";
           echo " </form>";
         }
         ?>
     <script>
         $(document).ready(function(){  
          $('li').each(function(){
            if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1)
            {
              $(this).addClass('active').siblings().removeClass('active');
            }
          });
        })
      </script>

      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71262604-1', 'auto');
  ga('send', 'pageview');

</script>


        </div>
      </div>
    </nav>
  </div>           
