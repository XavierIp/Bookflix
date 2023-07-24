<?php

    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "php/conexion.php";
$dato= $_GET["nam"];$id=$_SESSION["id_usuario"];

  

if(!isset($_GET["pago"])){
  header("location: principal.php");
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AQ36Nvs9lALn00nHuXTkbn1t2hsBcu14K6S_isLMxnwYvvZYdxXab9KnJS5-xdBPoI9ERcPyxvw0niy6&currency=USD"></script>
  
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
    <?php include("./layouts/header.php");?> 
    
    <div class="site-section">
      <div class="container">
  
        
          

        
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Carrito</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5" id="cart-table">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                    <tbody id="cart-body">
                      <tr>
                        <td><?php echo $_GET["nam"]?> </td>
                        <td>USD$ <?php echo $_GET["pago"]?></td>
                      </tr>
                     
                    
                    </tbody>
                    
                    


<!-- Carrito de compra -->

                    
                  </table>
                  <div id="total"></div>

                  <h2>Servicios Adicionales</h2>
               
                  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Servicio 1 - $10
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Sin interrupcion publicitaria
       <br> <button type="button" class="btn btn-success" onclick="addToCart('Servicio 1', 10)" id="btn-service1">Agregar</button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Servicio 2 - $15
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
    Perzonaliza bookflix a los accesos de los exclusivos colores del acceso premiun<br>
        <button type="button" class="btn btn-success" onclick="addToCart('Servicio 2', 15)" id="btn-service2">Agregar</button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Servicio 3 - $20
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Desarrolla tu creatividad e imaginacion escribiendo tus propios libros. <br>
        <button type="button" class="btn btn-success" onclick="addToCart('Servicio 3', 20)" id="btn-service3">Agregar</button>
      </div>
    </div>
  </div>

                 
                  <div class="border p-3 mb-3">

                  
<script>
    var cartItems = [];
    var datosrecib=<?php echo $_GET["pago"]?>;
       
    var total =datosrecib ;

    function addToCart(service, price) {
      if (!cartItems.includes(service)) {
        cartItems.push(service);
        total += price;

        var cartTable = document.getElementById('cart-table');
        var cartBody = document.getElementById('cart-body');

        var row = document.createElement('tr');

        var serviceCell = document.createElement('td');
        serviceCell.textContent = service;

        var priceCell = document.createElement('td');
        priceCell.textContent = "USD$ " + price;

        var removeCell = document.createElement('td');
        var removeButton = document.createElement('button');
        removeButton.className = 'remove-button';
        removeButton.textContent = 'Eliminar';
        removeButton.onclick = function() {
          removeFromCart(service, price);
        };
        removeCell.appendChild(removeButton);

        row.appendChild(serviceCell);
        row.appendChild(priceCell);
        row.appendChild(removeCell);

        cartBody.appendChild(row);

        var totalDiv = document.getElementById('total');
        totalDiv.textContent = "Total: $" + total;

        // Deshabilitar el botón después de agregarlo al carrito
        if (service === 'Servicio 1') {
          var btnService1 = document.getElementById('btn-service1');
          btnService1.disabled = true;
        } else if (service === 'Servicio 2') {
          var btnService2 = document.getElementById('btn-service2');
          btnService2.disabled = true;
        } else if (service === 'Servicio 3') {
          var btnService3 = document.getElementById('btn-service3');
          btnService3.disabled = true;
        }
      }
    }

    function removeFromCart(service, price) {
      var index = cartItems.indexOf(service);
      if (index > -1) {
        cartItems.splice(index, 1);
        total -= price;

        var cartBody = document.getElementById('cart-body');
        var rows = cartBody.getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
          var row = rows[i];
          if (row.getElementsByTagName('td')[0].textContent === service) {
            cartBody.removeChild(row);
            break;
          }
        }

        var totalDiv = document.getElementById('total');
        totalDiv.textContent = "Total: $" + total;

        // Habilitar el botón después de quitarlo del carrito
        if (service === 'Servicio 1') {
          var btnService1 = document.getElementById('btn-service1');
          btnService1.disabled = false;
        } else if (service === 'Servicio 2') {
          var btnService2 = document.getElementById('btn-service2');
          btnService2.disabled = false;
        } else if (service === 'Servicio 3') {
          var btnService3 = document.getElementById('btn-service3');
          btnService3.disabled = false;
        }
      }
    }
  </script>
                  <style>
    #paypal-button-container{
      margin: auto;
    }
  </style>

  <div id="paypal-button-container" style="max-width: 400px;">
    <script>
      paypal.Buttons({
        style:{
          layout:'vertical',
          disableMaxWidth:true,
          color: 'blue',
          shape: 'pill',
          label: 'pay'
        },
        createOrder: function(data,actions){
          return actions.order.create({
            purchase_units:[{
              amount:{
                value: total
              }
            }]
          });
        },

        onApprove: function(data, actions){
          actions.order.capture().then(function(detalles){
            console.log(detalles)
            alert("¡Felicidades por tu subscripción!");
            <?php 
            if( $dato==="Básico"){
              $sql = "Update usuarios Set id_suscripcion=1 Where id_usuario=".$id;
                      
              if ($link->query($sql) === TRUE) {
                  $men =  "usuario modificado correctamente ";
              } else {
                  $men =  "Error modificando: " . $link->error;
              }
        
          }elseif ($dato==="Regular") {
              $sql = "Update usuarios Set id_suscripcion=3 Where id_usuario=".$id;
                      
              if ($link->query($sql) === TRUE) {
                  $men =  "usuario modificado correctamente ";
              } else {
                  $men =  "Error modificando: " . $link->error;
              }
        
          }else{
              $sql = "Update usuarios Set id_suscripcion=4 Where id_usuario=".$id;
                      
              if ($link->query($sql) === TRUE) {
                  $men =  "usuario modificado correctamente ";
              } else {
                  $men =  "Error modificando: " . $link->error;
              }
        };
        
        
        
            ?>
            window.location.href="gracias.php"
          });
        },

        onCancel: function(data){
          alert("Pago cancelado");
          console.log(data);
        }

      }
    ).render('#paypal-button-container');
  </script>
  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
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