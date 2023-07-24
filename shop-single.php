
<?php
 require "php/AgregarComentario.php";
    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "php/conexion.php";
if(isset($_GET["id"])){
  $resultado=$link ->query("select * from libros where id_libro= ".$_GET["id"]) or die($link->error);
  if(mysqli_num_rows($resultado)>0){
    $fila=mysqli_fetch_row($resultado);
  }else{
    header("location: principal.php");
  }
}else{
  header("location: principal.php");

}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
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
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo $fila[4];?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila[1];?></h2>
            <p><?php echo $fila[2];?></p>
            <p class="mb-4"><?php echo $fila[3];?></p>
           
          
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              
            </div>

            </div>
 
            <form id="eviopost">
      
        <input type="hidden" name="lee" id="lee"  value="<?php echo $fila[0];?>" class="campo" >

    <?php if($fila[6]<=$_SESSION["susp"] and $_SESSION["susp"]!=0 ){?>
      <input type="submit" class="buy-now btn btn-sm btn-primary" name="Leer" value="Leer">
      <?php }?>
    </form>
    <br>
    <?php if($_SESSION["susp"]===4 ){?>
      <a href="<?php echo $fila[5] ?>" class="buy-now btn btn-sm btn-danger" download=" <?php echo $fila[5] ?>"><?php $paraimprimir=$cadena = substr($fila[5], 4, -4); echo "Descargar ".$paraimprimir; ?></a>
      <?php }?>
  

          </div>
        </div>
      </div>
    </div>

    <?php if($fila[6]<=$_SESSION["susp"] and $_SESSION["susp"]!=0 ){?>
    <div class="comment-form-container">
    <form id="formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="input-row">

    <input class="form-control" type="hidden" name="id_usuario" id="name"  value="<?php echo $_SESSION["id_usuario"];?>" />
</div>

<div class="input-row">
    <p class="emoji-picker-container">
    <textarea class="input-field" id="comentario" name="comentario" rows="10" cols="50"></textarea><br>    </p>
</div>
<input type="hidden" id="libro" name="id_libro" value="<?php echo $fila[0];?>"><br>
<div>
    <input type="submit" class="btn btn-primary" id="submitButton" value="Agregar Comentario" />
    <div id="comment-message">Comentario creado con éxito!</div>
</div>


</form>
</div>

<?php }?>
	<div id="comentarios">
  <?php




$sql = "SELECT c.*, u.usuario FROM comentarios c INNER JOIN usuarios u ON c.id_usuario = u.id_usuario where id_libro=".  $fila[0];

$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
     
       
       
    
        echo "<div class='comment-row'>";
        echo "<div class='comment-info'><span class='posted-by'>" . $row["usuario"] . "</span></div>"; 
        echo "<div class='comment-text'>". $row["comentarios"] . "</div>";
        echo "</div>";
       
        
   
   
    }
} else {
    echo "No hay comentarios";
}

$link->close();

?>
    </div>
 
  </div>
<script>

  
document.addEventListener("DOMContentLoaded", function() {
  const contactForm = document.getElementById("eviopost");
  const responseDiv = document.getElementById("response");

  contactForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    const formData = new FormData(contactForm);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/pdfconec.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.hasOwnProperty("pdf")) {
          const pdfUrl = response.pdf;
          console.log(pdfUrl);
          localStorage.setItem("pdfUrl", pdfUrl);
  
  // Redireccionar a la página donde se muestra el PDF
  window.location.href = "cart.php";

        } else {
          console.error("La respuesta no contiene la URL del PDF");
        }
      }
    };
    xhr.send(formData);
  });
});



</script>
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