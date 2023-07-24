<?php
include 'php/recuperacnt.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recuperar contraseña</title>
	<link rel="stylesheet" href="css/estiloslogin.css">
</head>
<body>
	<section>
		
		<div class="box">
		
			 <div class="container">
			 	<div class="form">
			 		<h2>Recuperar contraseña</h2>
			 		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
			 			<div class="inputBox">
			 				<input type="text" name="email"  placeholder="Correo electronico"/>
			 			</div>
			 			<div class="inputBox">
			 				<input type="submit" value="Enviar" />
			 			</div>
						 <span class="msg-error"><?php echo $men; ?></span>
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