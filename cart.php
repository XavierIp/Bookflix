<?php

    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "php/conexion.php";

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
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
    <link rel="stylesheet" type="text/css" href="css/stylesppdf.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
  <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
    <div class="container">
    <div class="pdf-container">
      <div id="pdf-viewer"></div>
      <div class="page-controls">
        <button id="prevPage"><i class="fas fa-chevron-left"></i> Anterior</button>
        <span id="page-num"></span>
        <button id="nextPage">Siguiente <i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
    <div class="container">
      
      <div class="row">
    <div class="col-12 col-md-12"> 
          <!-- Contenido -->
		
  </div>

 
  </div>

<script>window.onload = function() {
    // Obtener el div donde se mostrarán los comentarios
    var comentariosDiv = document.getElementById("comentarios");

    // Función para obtener los comentarios y mostrarlos en la página
    function obtenerComentarios() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "php/obtener_comentarios.php", true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                comentariosDiv.innerHTML = xhr.responseText;
            }
        };

        xhr.send();
    }

    // Llamar a la función para obtener los comentarios al cargar la página
    obtenerComentarios();
};
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
  <script src="js/scriptpdf.js"></script>
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