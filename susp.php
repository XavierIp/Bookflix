<?php

    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "php/conexion.php";


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bookflix</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        

  .principal{
    margin-top:50px;
    font-family: 'Roboto';
    color:black;
  }
  
  
  .imagen{
    width: 64px;
    margin-bottom: 35px;
}


  .card-header-second{
    box-shadow:1px 7px 15px #a2a2a2;
      margin:-9px -9px 0px -9px;
     
    background: rgba(255,10,10,0.7); 
  }
  
  
  .card-section-third span i{
    padding:17px;
    margin:0px 10px;
    color:#fff;
    height:50px;
    width:50px;
    box-shadow:1px 6px 24px #d2d2d2;
    background: rgba(255,0,0,1,0.5); 
  }
  
  .card-header-third span i:hover,.card-section-third span i:hover{
    box-shadow:1px 1px 15px #000;
  }
  
  /*efecto shadows para todas las tarjetas*/
  .card-section{
    box-shadow: 0 2px 5px 0 rgba(255,0,0,1,.16), 0 2px 10px 0 rgba(0,0,0,.12);
  }
  /*Para el efecto sombra al pasar por encima el mouse*/
  .card-section:hover{
    box-shadow:1px 1px 20px #d2d2d2;
  }




    </style>

  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 
    <section class="instructor container">



    <div class="container principal">
    <div class="row">
    <div class="col-lg-4 col-md-12 mb-4">
		                 <div class="card-section border rounded ml-4 mr-4">
		                    <div class="card-header card-header-second rounded">
		                       <h2 class="card-header-title mb-3 mt-1 text-center">Básico</h2>
		                    </div>
		                    <div class="card-body text-center">
                            <img class="imagen" src="img/libro1.png">
            <ul class="lista">
                <li>Comics</li>
                <li>Mangas</li>
                <li>Educación</li>
            </ul>
            <h3><sup>USD$ </sup>15</h3>
  
                                <a href="pagar.php?pago=15&nam=Básico" class="btn btn-lg btn-secondary">Comprar</a>
                               
		                    </div>
	                	</div>
	                </div>
                    <div class="col-lg-4 col-md-12 mb-4">
		                 <div class="card-section border rounded ml-4 mr-4">
		                    <div class="card-header card-header-second rounded">
		                       <h2 class="card-header-title mb-3 mt-1 text-center">Regular</h2>
		                    </div>
		                    <div class="card-body text-center">
                            <img class="imagen" src="img/libro2.png">
            <ul class="lista">
                <li>Incluye plan Básico</li>
                <li>Libros populares</li>
                <li>Novelas</li>
            </ul>
            <h3><sup>USD$ </sup>25</h3>
            <a href="pagar.php?pago=25&nam=Regular" class="btn btn-lg btn-secondary">Comprar</a>
		                    </div>
	                	</div>
	                </div>
                    <div class="col-lg-4 col-md-12 mb-4">
		                 <div class="card-section border rounded ml-4 mr-4">
		                    <div class="card-header card-header-second rounded">
		                       <h2 class="card-header-title mb-3 mt-1 text-center">Plan Premium</h2>
		                    </div>
		                    <div class="card-body text-center">
                            <img class="imagen" src="img/libro3.png">
            <ul class="lista">
                <li>Incluye el plan Básico y Regular</li>
                <li>Últimos lanzamientos</li>
                <li>Libros descargables</li>
                </ul> 
                <h3><sup>USD$ </sup>30</h3>
             
            <a href="pagar.php?pago=30&nam=Plan Premium" class="btn btn-lg btn-secondary">Comprar</a>
		                    </div>
	                	</div>
	                </div>
    
   
    
  </div></div></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>