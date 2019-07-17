<?php 
session_start();

 ?>
 <!-- pagina orientada a mostrar el perfil del usuario registrado-->
<!DOCTYPE html>
<html lang="es">
<head><!--etquetas que ayudan a saber de la pagina(titulo), mejoran 
responsividad y linkean estilos css necesarios. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quecocino - Agregar receta</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/letras.css" rel="stylesheet" />
<link href="css/img.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
        <div class="col-sm-4"><a class="navbar-brand icono-cam" href="busqueda.php">QueCocino</a> </div>
        <div class="col-sm-6"></div>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
   <?php
/*verifica si existe un usuario logeado, si lo hay muestra el boton de perfil y el de salir, sino
muestra login y registro dentro del nav*/
        if (isset($_SESSION["us"])) {
           
            echo "     <li class='nav-item'>

                <div class='col-sm-1'><a class='nav-link' href='perfil.php'>Perfil</a></div>
        </li>

        <li class='nav-item'>
                <div class='col-sm-1'><a class='nav-link' href='salir.php'>Salir</a></div>
          </li> ";



        }
        else{
            echo "

              <li class='nav-item'>
                <div class='col-sm-1'><a class='nav-link' href='login.html'>Login</a></div>
        </li>

        <li class='nav-item'>
                <div class='col-sm-1'><a class='nav-link' href='register.html'>Registro</a></div>
          </li>

            ";
        }



        ?>
      </ul>
      </div>
    </nav><!-- fin del nav-->
<br>
<br>
<br>

    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-4">
               <img src="img/brocoli.jpg" alt="">
           </div>
           <div class="col-sm-8">
             <!-- aqui comienza la declaracion y coneccion a la base de datos -->
             <!-- luego de esto, se crea la query para traer los datos del usuario de la base de datos
             para mostrarlos-->
            <?php 
             
            $server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";
$cuantas = array();
$conn = mysqli_connect($server, $user, $pass, $bd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM `receta` WHERE `CorreoUs` = '".$_SESSION["us"]."' ";

$result = mysqli_query($conn, $query);

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
        
        $cuantas[] = $row["idReceta"];

        
    }
    }

 $numm = count($cuantas);
/* se muestran los datos obtenidos con la query */
  echo "<h3>Usuario:</h3><p>".$_SESSION["nom"]."</p>
  <h3>Correo:</h3><p>".$_SESSION["us"]."</p>
                <h3>Recetas subidas:</h3><p>".$numm."</p>
                <h2>Mi cocina</h2>
                <p>
                   <a href='vermisrec.php'><input class='btn btn-success' type='submit' value='Ver Mis Recetas'></a>
                     <a href='menu.php'><input class='btn btn-success' type='submit' value='Crear Receta'></a>
                </p>";


             ?>
              
           </div>
        
        </div><!-- fin del primer row-->
        <hr>
    </div>  


</body>
</html>