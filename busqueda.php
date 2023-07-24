<?php

    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "php/conexion.php";
if(!isset($_GET["texto"])){
  header("location: principal.php");
}

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
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

           
            <div class="row mb-5">

            <?php

             $query = "SELECT * FROM libros where  nombre like '%".$_GET['texto']."%' or 
             genero like '%".$_GET['texto']."%' or descripcion like '%".$_GET['texto']."%'";
        $result = mysqli_query($link, $query);

        // Mostrar las imágenes en la galería
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_libro'];
            $nombre = $row['nombre'];
            $genero = $row['genero'];
            $descripcion = $row['descripcion'];
            $foto = $row['foto'];


    
           
          echo '    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">';
          echo '    <div class="block-4 text-center border">';
          echo '     <figure class="block-4-image">';
          echo '       <a href="shop-single.php"><img src="' . $foto . '" class="img-fluid" ></a>';
          echo '    </figure>';
          echo '    <div class="block-4-text p-4">';
          echo '     <h3><a href="shop-single.php?id=' . $id . '">' . $nombre . '</a></h3>';
          echo '     <p class="text-primary font-weight-bold">' . $genero . '</p>';
          echo '     </div>';
          echo '     </div>';
          echo '   </div>';
        }

        // Cerrar la conexión a la base de datos

        ?>




      


            </div>
          
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
              <?php   $re = $link->query("SELECT  DISTINCT  genero FROM libros");
     while ($f = mysqli_fetch_array($re)){


              ?>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="./busqueda.php?texto=<?php  echo $f['genero']; ?>" class="d-flex"><span><?php  echo $f['genero']; ?></span></a></li>
              
              </ul>
              <?php }         mysqli_close($link);?>
            </div>

           
          </div>
        </div>

       
        
      </div>
    </div>
   
    
  </div>

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