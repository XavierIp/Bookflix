<?php

    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4f56611993.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">



    <link rel="stylesheet" href="css/style.css">


    
    <link rel="stylesheet" href="css/estilocontacto.css">
    <title>Contactanos</title>
</head>
<body>
<?php include("./layouts/header.php"); ?> 

<div class="contenido">
    <form action="php/contact.php" method="POST">
        <label>Nombre y Apellido</label>
        <input name="nombre" id="nombreapellido" required placeholder="Escribe tu nombre" class="campo">

        <label>Correo Electrónico</label>
        <input name="correo" id="correoelectronico" required placeholder="Escribe tu email" class="campo" value="<?php echo $_SESSION["email"]?>">

        <label>Teléfono</label>
        <input name="tel" id="telef" required placeholder="Escribe tu telefono" class="campo">

        <p>
            <label>¿Como le gustaria que lo contactemos?</label><br>
            <input type="radio" name="telefono" class="x">Telefono<br>
            <input type="radio" name="email" class="x">Email<br>
            <input type="radio" name="Whatsapp" class="x">Whatsapp<br>
        </p>

        <label>Mensaje</label>
        <textarea id="msg" name="mensaje" placeholder="Deja tu Mensaje..." required></textarea>
        <input type="submit" onclick="enviarform()" class="btn-enviar" name="Enviar" value="Enviar Formulario">

        <!--<button type="submit" onclick="return enviar();" class="btn-enviar" name="Enviar" value="Enviar">Enviar</button>-->
    </form>
    
    <div class="info">
        <h2>Contáctanos</h2>
        <p>Lee y escucha libros y revistas cuando y donde quieras. Bookflix facilita a todos la búsqueda
            de nuevas y emocionantes historias.</p>
        <ul>
            <li><i class="fas fa-map-marker-alt"></i> Av. Lalalala 123 - Cercado de Lima</li>
            <li><i class="fas fa-phone fa-rotate-90"></i> 123-4567</li>
            <li><i class="fab fa-whatsapp fa-lg"></i>987-654-321</li>
            <li><i class="fas fa-envelope"></i> email@dominio.com</li>
        </ul>
    </div>
</div>

<script src="js/contactanos.js"></script>
</body>
</html>