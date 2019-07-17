<?php
//linea que declara que en el php se va a trabajar con sesiones
/* Aquí se declaran las variables a utilizar*/
session_start();
/* datos para la coneccion a la base de dato*/ 
$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";
$conn = mysqli_connect($server, $user, $pass, $bd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*aquí se valida que se halla realizado la busqueda correctamente, sino es asi, se le envia al php de busqueda,
 en cambio si se ha realizado con exito se mostraran las recetas que coinciden y en caso de que no existan 
 recetas con los ingredientes mencionados se muestra un error diciendo que no existen recetas con
 dichos ingredientes, además en el caso de que existan alguna receta con ingredientes que coincidan pero
 no esten todos entonces tambien se mostrara un error indicando el hecho.*/
if (empty($xd = $_POST["nomnom"])) {
	    echo "<script>alert('Error, sin ingredientes seleccionados' );</script>";
    echo "<script>window.location = 'busqueda.php';</script>";
}
else{
	$xd = $_POST["nomnom"];
	$xdd = explode(',', $xd);
	$cant =count($xdd);
	$recs = array();
	

for ($i=0; $i < $cant ; $i++) { 

if ($i === 0) {

$query = "SELECT * FROM `ing_rec` WHERE `Ingrediente_idIngrediente` = '".$xdd[$i]."' ";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
        
        $recs[] = $row["Receta_idReceta"];
        
    }

}
 else{
    	echo "<script>alert('Error, No existen recetas con este ingrediente' );</script>";
    echo "<script>window.location = 'busqueda.php';</script>";
    }


}
else{

	$recs2 =array();


$query = "SELECT * FROM `ing_rec` WHERE `Ingrediente_idIngrediente` = '".$xdd[$i]."' ";

  $result = mysqli_query($conn, $query);

 if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
        
        $recs2[] = $row["Receta_idReceta"];

        
    }
   
$cant2 = count($recs2);
		$recsf = array();
for ($i=0; $i < $cant2; $i++) { 

	if (in_array($recs2[$i], $recs)) {
		
			$recsf[] = $recs2[$i];
	}

}

$recs = $recsf;


}
else{
	 	echo "<script>alert('Error, No existen recetas con todos estos ingreidntes' );</script>";
    echo "<script>window.location = 'busqueda.php';</script>";
}


}

}

}

mysqli_close($conn);


?>
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
        <div class="row"><!-- inicio del titulo -->
            <div class="col-sm-4"></div>
            <div class="col-sm-4" align="center"><!--align="center" permite alinear al centro del div 
            el contenido de este -->
               <strong class="font-1">Recetas</strong><!--font-1 es el tamaño de letra mas grande encontrado en
               el css letras -->
            </div>
            <div class="col-sm-4"></div>
        </div>
        <!-- fin del titulo -->
        <!-- rellenar tablas -->
		<?php
/*aquí se realiza la query coneccion a la tabla de la bd, para mostrar los resultados de recetas que coinciden
con su busqueda obtenidos de esta tabla*/ 
		$cantidad = count($recs);

		$conn2 = mysqli_connect($server, $user, $pass, $bd);

			for ($i=0; $i < $cantidad ; $i++){

					$query2 = "SELECT * FROM `receta` WHERE `idReceta` = '".$recs[$i]."' ";

					  $result2 = mysqli_query($conn2, $query2);

  if (mysqli_num_rows($result2) > 0) {

  while($row = mysqli_fetch_assoc($result2)) {
        
/*aquí se crea la estructura para mostrar de una forma desenta y bonita la informacion obtenida de la tabla */
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
              <p class='bla'>".$row["resumen"]."</p>";

             if (isset($_SESSION["us"])) {
               echo  " <a class='btn btn-success' href='receta.php?idd=".$row["idReceta"]."'>Receta</a>";
             }
             else{
                     echo "  <a class='btn btn-success' onClick='den()'>Receta</a>";
             }
              
            echo "

            </div>
            
        </div>
        <hr>

			";
    
    }

}

			}

		?>
<!--en el caso de que la persona clickee el boton para ver la receta se debe registrar o iniciar 
sesion en el caso de tener una. -->
  
     
<script>
  function den(){
    alert('Si desea obtener toda la informacion de las recetas inicie sesion o cree una cuenta' );
    window.location = 'login.html';
  }
</script>

   
    </div>  


</body>
</html>