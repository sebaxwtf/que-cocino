<?php 
session_start();

$idr = $_GET["idd"];
$_SESSION["re"] = $idr;
$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";
$nomb ="";
$cor = "";
$desk = "";
$im = "";
$ing = array();
$ing2 = array();

    $conn = mysqli_connect($server, $user, $pass, $bd);

                    $query = "SELECT * FROM `receta` WHERE `idReceta` = '".$idr."' ";

                      $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
    $nomb = $row["NombreRec"];
    $cor = $row["CorreoUs"];
    $desk = $row["descripcion"];
    $im = $row["imgrec"];
  }
}
mysqli_close($conn);

  $conn2 = mysqli_connect($server, $user, $pass, $bd);

                    $query2 = "SELECT * FROM `ing_rec` WHERE `Receta_idReceta` = '".$idr."' ";

                      $result2 = mysqli_query($conn2, $query2);
                       if (mysqli_num_rows($result2) > 0) {

  while($row = mysqli_fetch_assoc($result2)) {
  
    $ing[] = $row["Ingrediente_idIngrediente"];

  }
}
mysqli_close($conn2);

  $conn3 = mysqli_connect($server, $user, $pass, $bd);


               $query3 = "SELECT * FROM `ingrediente` ";

                      $result3 = mysqli_query($conn3, $query3);
                       if (mysqli_num_rows($result3) > 0) {

  while($row = mysqli_fetch_assoc($result3)) {
  
    $ing2[] = $row["NombreIng"];

  }
}


  

       
mysqli_close($conn3);


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
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

    <div class="container-fluid" >
        <div class="row"><!-- inicio del titulo -->
           
           <div class="col-sm-12"><form action="proceso2.php" method="post" enctype="multipart/form-data" class="register-form" >
            <p>
              <h1>Crear Receta</h1>
            </p>
                <p>
                   Nombre de la receta
                </p>
                <?php echo "  <input type='text' name='namer' id='' value='".$nomb."'>"; ?>
              
                <p>
                   Ingredientes 
                </p>
            </div>
             
                 <div class="col-sm-4"> 
                  <?php 
                  $varix = 0;
                  for ($i=0; $i < 7; $i++) { 
                    $varix = $i +1;
                    if (in_array($varix, $ing)) {

                          echo "<input type='checkbox'  name='sel[]' value='".$varix."' checked > ".$ing2[$i]." <br>";
                    }
                    else{
                          echo " <input type='checkbox' name='sel[]' value='".$varix."' >".$ing2[$i]."<br>";
                    }

                
                  }

                   ?>
                    
                   
                 </div>
                 <div class="col-sm-8">
                  <?php  
                  $varix = 0;
                  for ($i=7; $i < 16; $i++) { 
                    $varix = $i +1;
                    if (in_array($varix, $ing)) {

                          echo "<input type='checkbox'  name='sel[]' value='".$varix."' checked> ".$ing2[$i]." <br>";
                    }
                    else{
                          echo " <input type='checkbox' name='sel[]' value='".$varix."'>".$ing2[$i]."<br>";
                    }

                
                  } ?>
                  
                 </div>
                <div class="col-sm-12">
                        <p>
                                Proceso de cocina
                             </p>
                             <textarea name="d-receta" id="d-receta" cols="30" rows="10"><?php echo "".$desk.""; ?></textarea>
                             
                     
                </div>
                <div class="col-sm-4">
                     
                        
                </div>
                 
            <div class="col-sm-8">
                
            </div>
            <div class="col-sm-4">
                <br>
                    <input class="btn btn-info" type="submit" value="Enviar">
            </div>
                </form>
        </div>
        <!-- fin del titulo -->
        <!-- rellenar tablas -->


        <!-- TODO LO DE AQUÍ DENTRO ES LA MATRIZ PARA EL RESTO DE RECETAS-->
        <div class="row">
           
            
        </div><!-- fin del primer row-->
        <hr>
    </div>  


</body>
</html>