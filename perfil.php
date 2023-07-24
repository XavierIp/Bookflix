<?php

    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "php/conexion.php";

include 'php/recuperarctcperfil.php'; 
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
    <link rel="stylesheet" href="css/perfil.css">
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 
    <header class="masthead   text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0"><?php echo $_SESSION["usuario"];?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Plan de Suscripción - <?php if( $_SESSION["susp"]===1){echo "Básico";}elseif ($_SESSION["susp"]===3) {echo "Regular";}elseif ($_SESSION["susp"]===0) {echo "Pollito";}else{echo "Premium";};?></p>
                <br>
                <p class="masthead-subheading font-weight-light mb-0"><?php echo $_SESSION["email"];?></p>

            </div>
        </header>
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Mis Comentarios
</h2>
                <!-- Icon Divider-->
            
                <div id="comentarios">
  <?php


$comen=$_SESSION["id_usuario"];

$sql = "SELECT c.*, u.usuario , d.nombre FROM comentarios c INNER JOIN usuarios u ON c.id_usuario = u.id_usuario inner join libros d on c.id_libro=d.id_libro  where u.id_usuario=".  $comen;

$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
     
       
       
    
        echo "<div class='comment-row'>";
        echo "<div class='comment-info'><span class='posted-by'> Libro - " . $row["nombre"] . "</span></div>"; 
        echo "<div class='comment-text'>". $row["comentarios"] . "</div>";
        echo "</div>";
       
        
   
   
    }
} else {
    echo "No hay comentarios";
}



?>
    </div>
            </div>
        </section>
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cambiar Contraseña
</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="actual" type="password" placeholder="Enter your name..." required />
                                <label for="name">Contraseña actua</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="nueva" type="password" placeholder="name@example.com" required />
                                <label for="email">Nueva Contraseña:</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" name="repetir" type="password" placeholder="(123) 456-7890" required />
                                <label for="phone">Confirmar Contraseña:</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                <input class="form-control" id="phone" name="usuario_id" type="hidden" value="<?php echo $comen;?>" required />
                                <input class="form-control" id="phone" name="email" type="hidden" value="<?php echo $_SESSION['email'];?>" required />

                            </div>
                            <!-- Message input-->
                            
                            <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Cambiar Contraseña</button>
                        </form>
                        <?php
    // Mostrar mensajes de error o éxito
    if (!empty($error)) {
        echo '<div style="color: red;">' . $error . '</div>';
    }
    if (!empty($exito)) {
        echo '<div style="color: green;">' . $exito . '</div>';
    }
    ?>
                    </div>
                </div>
            </div>
        </section>
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