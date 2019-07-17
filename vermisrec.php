<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";



?>
<!-- pagina orientada a ver mis recetas-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quecocino - Registro</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/letras.css" rel="stylesheet" />
<link href="css/img.css" rel="stylesheet" />
<link href="css/estilo.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
        <div class="col-sm-4"><a class="navbar-brand icono-cam" href="buscar.php">QueCocino</a> </div>
        <div class="col-sm-6"></div>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
          <?php

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
        <div class="row"><!-- inicio del titulo -->
            <div class="col-sm-4"></div>
            <div class="col-sm-4" align="center">
               <strong class="font-1">Mis Recetas</strong>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <!-- fin del titulo -->
        <!-- rellenar tablas -->
		<?php


		$conn = mysqli_connect($server, $user, $pass, $bd);

					$query = "SELECT * FROM `receta` WHERE `CorreoUs` = '".$_SESSION["us"]."' ";

					  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
        

       	echo " 	
   <div class='row'>
            <div class='col-sm-3 bg-info'>
                <p class='bla'>".$row["CorreoUs"]."<br></p>
                <p><img src='".$row["imgrec"]."' height='200px' width='200px' alt=''></p>
                <p class='bla'>valoracion</p> 
                <p class='bla'>3 estrellas</p> 
            </div>
            <div class='col-sm-9 bg-light'>
              <p> <strong class='bla' >".$row["NombreRec"]."</strong> </p>  
              <p class='bla'>Descripcion:</p>  
              <p class='bla'>".$row["resumen"]."</p>

             
                 <a class='btn btn-success' href='receta.php?idd=".$row["idReceta"]."'>Receta</a>
                   <a class='btn btn-success' href='modrec.php?idd=".$row["idReceta"]."'>Modificar</a>

            </div>
            
        </div>
        <hr>



			";

        
    }

}
else{
  echo "NO hay recetas";
}


			
	




	 
		
		

		

		?>

  
     



       
    </div>  


</body>
</html>