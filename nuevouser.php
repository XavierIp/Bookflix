<?php 
    
    include 'php/code-register.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear nueva cuenta</title>
	<link rel="stylesheet" href="css/estiloslogin.css">
</head>
<body>
	<section>
		
		<div class="box">
			
			 <div class="container">
			 	<div class="form">
			 		<h2>Crear nueva cuenta</h2>
			 		<form  onsubmit="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			 	
						 <div class="inputBox">
							<input type="text" id="user" name="username" placeholder="Usuario"/>
							<span class="msg-error"><?php echo $username_err; ?></span>
						</div>
			 			<div class="inputBox">
			 				<input type="email" id="email" name="email" placeholder="Correo electronico"/>
							 <span class="msg-error"> <?php echo $email_err; ?></span>
			 			</div>
						
			 			<div class="inputBox">
			 				<input type="password" id="contrasena"  name="password" placeholder="Contraseña"/>
							 <span class="msg-error"> <?php echo $password_err; ?></span>
			 			</div>
						
					
			 			<div class="inputBox">
			 				<input type="submit" value="Crear Cuenta" />
			 			</div>
			 			<p class="forget">
			 				Has olvidado tu contraseña? <a href="recuperar.php">Recuperar contraseña</a>
			 			</p>
					
			 			<p class="forget">
			 				Ya tienes una cuenta? <a href="index.php">Iniciar sesión</a>
			 			</p>
			 		</form>
			 	</div>
			 </div>
		</div>
	</section>
</body>
</html>



