<?php
    
    require "php/code-login.php";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloslogin.css">
    <title>Document</title>
   
</head>

<body>
<section class="inicio">
        <div class="contenido">
            <h2>BOOKFLIX</h2>
            <p>Una forma mas facil de empezar a leer de una manera mas rapida y eficiente desde una sola plataforma.</p>
            <a href="nuevouser.php">Empezar</a>
        </div>
        <div class="login">
            <h2>Inicia Sesion</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="cajalog">
                   
                    <input type="text" name="email" id="" >
                    <label for="">Usuario</label>
                </div>
                <div class="cajalog">
                   
                    <input type="password" name="password" id="" >
                    <label for="">Ingrese contraseña</label>
                </div>
               <div class="olvido">
                <a href="recuperar.php">Recuperar tu contraseña?</a>
               </div>
               <input type="submit" class="btnlogin" value="Iniciar" />
              
              
            </form>
        </div>
    </section>



</body>

</html>
