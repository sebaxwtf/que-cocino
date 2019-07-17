<?php 
session_start();
/*pagina orientada a mostrar las recetas recetas, sus votaciones e informacion*/
$idr = $_GET["idd"];
$_SESSION["idex"] = $idr;

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
$vots = 0;
$vots2 = array();
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

  for ($i=0; $i < count($ing) ; $i++) { 
               $query3 = "SELECT * FROM `ingrediente` WHERE `idIngrediente` = '".$ing[$i]."' ";

                      $result3 = mysqli_query($conn3, $query3);
                       if (mysqli_num_rows($result3) > 0) {

  while($row = mysqli_fetch_assoc($result3)) {
  
    $ing2[] = $row["NombreIng"];

  }
}


  }

       
mysqli_close($conn3);
$conn4 = mysqli_connect($server, $user, $pass, $bd);

  
               $query4 = "SELECT * FROM `valoracion` WHERE `Recet` = '".$idr."' ";

                      $result4 = mysqli_query($conn4, $query4);
                       if (mysqli_num_rows($result4) > 0) {

  while($row = mysqli_fetch_assoc($result4)) {
  
    $vots = $vots + $row["valoracion"];
    $vots2[] = $row["valoracion"];


  }
  $voti = count($vots2);
  
  $vots = bcdiv($vots, $voti , 1);
}




  

mysqli_close($conn4);

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quecocino - Registro</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


  <script src="js/jquery-3.2.1.min.js"></script>  


<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/letras.css" rel="stylesheet" />
<link href="css/img.css" rel="stylesheet" />
<link rel="stylesheet" href="fha-iconos/icons.css" type="text/css" />
 <link rel="stylesheet" href="css/estilo.css">
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

    <div class="container-fluid">
        <div class="row"><!-- inicio del row -->
       
    <div class="col-sm-4">
        <?php 
        echo "<img src='".$im."' alt='' height='200px' width='200px'>
    <h3>puntaje:</h3>
    <p>".$vots."</p>";

 echo " <form method='POST' action='voto.php?idd=".$idr."'>
          
          <p class='clasificacion' >   
    <input id='radio1' type='radio' name='estrellas' value='5'><!--
    --><label for='radio1'>★</label><!--
    --><input id='radio2' type='radio' name='estrellas' value='4'><!--
    --><label for='radio2'>★</label><!--
    --><input id='radio3' type='radio' name='estrellas' value='3'><!--
    --><label for='radio3'>★</label><!--
    --><input id='radio4' type='radio' name='estrellas' value='2'><!--
    --><label for='radio4'>★</label><!--
    --><input id='radio5' type='radio' name='estrellas' value='1'><!--
    --><label for='radio5'>★</label>

    <br>
     <p><button type='submit' class='btn btn-info' style='background:pink;''>Votar</button></p>
  
</form>";


    ?>
    
    </div>

    <div class="col-sm-8">
        <?php 

        echo "<h3>Titulo: </h3><p>".$nomb."</p>
    <h3>Autor: </h3><p>".$cor."</p>";



         ?>
    
    <h3>Ingredientes:</h3>
    <ul>
        <?php 
        for ($i=0; $i < count($ing2) ; $i++) { 
            echo "<li>".$ing2[$i]."</li>";
        }

         ?>
        
      
    </ul>
    <h3>Como lo hago?</h3>
    <?php 

    echo "<p>
        ".$desk."
    </p>";


     ?>
    

<?php 



 ?>

    
    <h3>Comentarios</h3>
    <div class="row" id="intento">
    <?php 


$come = array();
$core = array();



    $conn5 = mysqli_connect($server, $user, $pass, $bd);



$query5 = "SELECT * FROM `comentarios` WHERE `RecC`  ";

$result5 = mysqli_query($conn5, $query5);

if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result5)) {
    
    $come[] = $row["Comentario"]; 
    $core[] = $row["CorreoUsC"];
    

    }
    
}

for ($i=count($come)-1; $i > -1 ; $i--) { 
  
  echo"   <div class='col-sm-12'>
        
 <h4>".$core[$i]."</h4>
    <p>
  ".$come[$i]."
      </p>
    
      </div>
      <br>
      <hr>";

}
  
     ?>
   
    
 
    
    
    </div>
      <form class="">
              <div class="form-group">
                <textarea name="textareaxd" id="nomnom" cols="80" rows="10" ></textarea>
              </div>
    
      
        
        <button class="btn btn-info" type="button" id="cargar">agregar comentario</button>

        </div><!-- fin del col 8-->
        <hr>
    </div>  

 <script>
    $(document).ready(function() {

      $("#cargar").click(function(){

        var parametros = {

          nomnom: $("#nomnom").val()

        };
                
               $.ajax({
                url: 'ajcom.php',
                type:'post',
                data : parametros,

                success: function(parametroRetorno){

                  $("#intento").html(parametroRetorno);

                }

               });

      });


    }); 

  </script>

</body>
</html>