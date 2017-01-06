<?php  require("header.php");
require_once('assets/include/function.php');
?>  
<div class="barrainfo">
 <h1>www.portalcasablanca.cl</h1>
 <p>Ya tenemos <?php echo DameTotal('tanuncios'); ?> anuncios, esperamos el tuyo!</p>
</div>

<div>
   <div class="container">
        <div class="row centrado">
                    <a class="btn btn-danger" href="registrar.php">
<i class="fa fa-hand-pointer-o"></i>
Registrarse gratis!
</a>
        </div>
   </div>
</div>
<!--
    <div class="publicidad">
       <div class="container">
           <div class="row">
               <div class="col-lg-3">
                   <img src="publicidad/zona3_navidad_1.jpg" class="img-responsive" alt="">
               </div>
                              <div class="col-lg-3">
                   <img src="publicidad/zona4_navidad.jpg" class="img-responsive" alt="">
               </div>
                              <div class="col-lg-3">
                   <img src="publicidad/zona9_navidad.jpg" class="img-responsive" alt="">
               </div>
                              <div class="col-lg-3">
                   <img src="publicidad/zona11_2.jpg" class="img-responsive" alt="">
               </div>
           </div>
       </div>
    </div>
  -->
  <div class="categorias">
    <div class="container">
     <div class="row">

       <div class="centrado">
        <h3>CATEGORIAS</h3>
      </div>
      <div class="col-lg-3">
       <div class="categoria-header">    		 	  	  	
        <span class="fa-stack fa-lg">
         <i class="fa fa-circle fa-stack-2x circulo1"></i>
         <i class="fa fa-building-o fa-stack-1x fa-inverse"></i>
       </span>
       Inmuebles <?php echo DameTotalGrupo('tc_inmuebles')?> 
     </div>

     <div class="categoria-body">
      <?php 
      imprimefamilia('tc_inmuebles');
      ?>
    </div>
  </div>
  <div class="col-lg-3">
   <div class="categoria-header">    		 	  	  	
    <span class="fa-stack fa-lg">
     <i class="fa fa-circle fa-stack-2x circulo2"></i>
     <i class="fa fa-car fa-stack-1x fa-inverse"></i>
   </span>
   Vehículos <?php echo DameTotalGrupo('tc_vehiculos')?> 
 </div>

 <div class="categoria-body">
  <?php 
  imprimefamilia('tc_vehiculos');
  ?>
</div>
</div>
<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo3"></i>
   <i class="fa fa-home fa-stack-1x fa-inverse"></i>
 </span>
 Hogar <?php echo DameTotalGrupo('tc_hogar')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_hogar');
  ?>
</div>
</div>
<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo4"></i>
   <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
 </span>
 Servicios <?php echo DameTotalGrupo('tc_servicios')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_servicios',$conexion);
  ?>
</div>
</div>

</div>
</div>
<br>
<div class="container">
 <div class="row">
  <div class="col-lg-3">
   <div class="categoria-header">    		 	  	  	
    <span class="fa-stack fa-lg">
     <i class="fa fa-circle fa-stack-2x circulo5"></i>
     <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
   </span>
   Electrónica <?php echo DameTotalGrupo('tc_electronica')?> 
 </div>

 <div class="categoria-body">
  <?php 
  imprimefamilia('tc_electronica',$conexion);
  ?>
</div>
</div>
<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo6"></i>
   <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
 </span>
 Empleo <?php echo DameTotalGrupo('tc_empleo')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_empleo',$conexion);
  ?>
</div>
</div>
<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo7"></i>
   <i class="fa fa-user fa-stack-1x fa-inverse"></i>
 </span>
 Moda <?php echo DameTotalGrupo('tc_moda')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_moda',$conexion);
  ?>
</div>
</div>
<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo8"></i>
   <i class="fa fa-arrows fa-stack-1x fa-inverse"></i>
 </span>
 Locales <?php echo DameTotalGrupo('tc_locales')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_locales',$conexion);
  ?>
</div>
</div>				
</div>
</div>
<br>
<div class="container">
 <div class="row">
  <div class="col-lg-3">
   <div class="categoria-header">    		 	  	  	
    <span class="fa-stack fa-lg">
     <i class="fa fa-circle fa-stack-2x circulo9"></i>
     <i class="fa fa-heart-o fa-stack-1x fa-inverse"></i>
   </span>
   Salud <?php echo DameTotalGrupo('tc_salud')?> 
 </div>

 <div class="categoria-body">
  <?php 
  imprimefamilia('tc_salud',$conexion);
  ?>
</div>
</div>
<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo10"></i>
   <i class="fa fa-futbol-o fa-stack-1x fa-inverse"></i>
 </span>
 Deporte <?php echo DameTotalGrupo('tc_deporte')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_deporte',$conexion);
  ?>
</div>
</div>

<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo11"></i>
   <i class="fa fa-binoculars fa-stack-1x fa-inverse"></i>
 </span>
 Turismo <?php echo DameTotalGrupo('tc_turismo')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_turismo',$conexion);
  ?>
</div>
</div>

<div class="col-lg-3">
 <div class="categoria-header">    		 	  	  	
  <span class="fa-stack fa-lg">
   <i class="fa fa-circle fa-stack-2x circulo12"></i>
   <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
 </span>
 Hospedaje <?php echo DameTotalGrupo('tc_hospedaje')?> 
</div>

<div class="categoria-body">
  <?php 
  imprimefamilia('tc_hospedaje',$conexion);
  ?>
</div>
</div>				
</div>
</div>

<div class="centrado">
  <a class="btn btn-success" href="buscar.php"><i class='fa fa-binoculars'></i> Ver Todos</a>
</div>   
</div>

<div class="productosdestacados hidden-xs">


  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-md-9">
          <h3>
            ÚLTIMOS PRODUCTOS </h3>
          </div>
          <div class="col-md-3">
            <!-- Controls -->
            <div class="controls pull-right hidden-xs">
              <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
              data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
              data-slide="next"></a>
            </div>
          </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">                   

                <?php 
                $sql = "SELECT * FROM tanuncios ORDER BY fecha DESC  LIMIT 0, 4";
                $query = mysql_query($sql);
                while ($row = mysql_fetch_array($query)) 
                { 
                  echo "<!-- ITEM -->
                  <div class='col-sm-3'>

                  <div class='col-item'>
                  <div id='content' class='photo photo-caja'>
                  <img src='imagenes/".chequeaImagen($row['imgmin'])."' class='img-responsive' alt='' />
                  </div>
                  <div class='info'>
                  <div class='row'>
                  <div class='price col-md-12'>
                  <h5>".$row['titulo']."</h5>
                  <h5 class='price-text-color'>$ ".number_format($row['precio'])."</h5>
                  <br>
                  </div>
                  </div>
                  <div class='separator clear-left'>
                  <p class='btn-add'>
                  <i class='fa fa-clock-o'></i><a href='articulo.php?id=".$row['id']."' class='hidden-sm'>".$row['fecha']."</a></p>
                  <p class='btn-details'>
                  <i class='fa fa-list'></i><a href='articulo.php?id=".$row['id']."' class='hidden-sm'>Ver Producto</a></p>
                  </div>
                  <div class='clearfix'>
                  </div>
                  </div>
                  </div>
                  </div>
                  <!-- ITEM --> ";
                }
                ?>

              </div>
            </div>
            <div class="item">
              <div class="row">
               <?php 
               $sql = "SELECT * FROM tanuncios ORDER BY fecha DESC  LIMIT 5, 4";
               $query = mysql_query($sql);
               while ($row = mysql_fetch_array($query)) 
               { 
                echo "<!-- ITEM -->
                <div class='col-sm-3'>

                <div class='col-item'>
                <div id='content' class='photo photo-caja'>
                <img src='imagenes/".$row['imgmin']."' class='img-responsive' alt='a' />
                </div>
                <div class='info'>
                <div class='row'>
                <div class='price col-md-12'>
                <h5>".$row['titulo']."</h5>
                <h5 class='price-text-color'>$ ".number_format($row['precio'])."</h5>
                <br>
                </div>
                </div>
                <div class='separator clear-left'>
                <p class='btn-add'>
                <i class='fa fa-clock-o'></i><a href='articulo.php?id=".$row['id']."' class='hidden-sm'>".$row['fecha']."</a></p>
                <p class='btn-details'>
                <i class='fa fa-list'></i><a href='articulo.php?id=".$row['id']."' class='hidden-sm'>Ver Producto</a></p>
                </div>
                <div class='clearfix'>
                </div>
                </div>
                </div>
                </div>
                <!-- ITEM --> ";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
	<div class="social">
		<div class="container">
			<a href="#">		
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
				</span>
			</a>
						<a href="#">		
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
				</span>
			</a>
		</div>	
	</div>



<div class="planes hidden-xs" >
	<div class="container">
   <div class="row text-center">
            <div class="col-md-12">
            <br/><br/>
            <h3>
                CONOCE NUESTROS PLANES
            </h3>
            <br/><br/>
            </div>
    </div>     
   <div class="row db-padding-btm db-attached">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup>$</sup>0
                                <small>Por mes</small>
                        </div>
                        <div class="type">
                            PLAN INICIO
                        </div>
                        <ul>
                            <li><i class="glyphicon glyphicon-flag"></i>3 Anuncios Grátis </li>
                        </ul>
                        <div class="pricing-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                 <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-two popular">
                    <div class="price">
                        <sup>$</sup>25,000
                                <small>Por mes</small>
                    </div>
                    <div class="type">
                        PLAN PYME
                    </div>
                    <ul>
                        <li><i class="glyphicon glyphicon-flag"></i>100 Anuncios </li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">Contratar</a>
                    </div>
                </div>
                     </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                 <div class="db-wrapper">
                <div class="db-pricing-eleven db-bk-color-three">
                    <div class="price">
                        <sup>$</sup>50,000
                                <small>Por Mes</small>
                    </div>
                    <div class="type">
                        PLAN EMPRESA
                    </div>
                    <ul>

                       <li><i class="glyphicon glyphicon-flag"></i>500 Anuncios </li>
                    </ul>
                    <div class="pricing-footer">

                        <a href="#" class="btn db-button-color-square btn-lg">Contratar</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  -->
</div>
<?php  require("footer.php") ?>
