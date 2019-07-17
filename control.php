<?php 
//linea que declara que en el php se va a trabajar con sesiones
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>quecocino</title>
</head>
<body>
	 <?php


 $abc = array();

 

 if (empty( $_POST["sel"])) {
         echo "<script>alert('Error, sin ingredientes seleccionados' );</script>";
    echo "<script>window.location = 'menu.php';</script>";
 }
else{

    $abc = $_POST["sel"];
  # definimos la carpeta destino
    $carpetaDestino="img/";
 
    # si hay algun archivo que subir
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"])
    {
 

            # si es un formato de imagen
            if($_FILES["archivo"]["type"]=="image/jpeg" || $_FILES["archivo"]["type"]=="image/pjpeg" || $_FILES["archivo"]["type"]=="image/gif" || $_FILES["archivo"]["type"]=="image/png")
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {   
                    $nomie =explode('.', $_FILES["archivo"]["name"]);
                    $extension = end($nomie);
                    $nombrefichero = time();
                    $origen=$_FILES["archivo"]["tmp_name"];
                    $destino=$carpetaDestino.$nombrefichero .".".$extension;
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                     

$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";

    $us = $_SESSION["us"];

 $idi = 0;
 $nom = $_POST["namer"];
 $desk = $_POST["d-receta"];

$conn = mysqli_connect($server, $user, $pass, $bd);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "INSERT INTO `receta` ( `idReceta`, `NombreRec`,  `descripcion`,  `CorreoUs`,  `imgrec`,  `resumen`)  VALUES  ('".$idi."','".$nom."', '".$desk."', '".$us."', '".$destino."', '".$desk."')";


if (mysqli_query($conn, $query)) {
           

    $conn2 = mysqli_connect($server, $user, $pass, $bd);

    $query2 = "SELECT MAX(`idReceta`) AS id FROM `receta` ";
$result2 = mysqli_query($conn2, $query2);

  $row = mysqli_fetch_object($result2);

    $veamos = $row->id;

    mysqli_close($conn2);

$cant = count($abc);

$conn3 = mysqli_connect($server, $user, $pass, $bd);
for ($i=0; $i <$cant ; $i++) { 
   
 $query3 = "INSERT INTO `ing_rec` (`Ingrediente_idIngrediente`, `Receta_idReceta`) VALUES ('".$abc[$i]."', '".$veamos."') ";
 
 mysqli_query($conn3, $query3);

 
    
}
mysqli_close($conn3);

mysqli_close($conn);

    echo "<script>alert('Creado correctamente' );</script>";
    echo "<script>window.location = 'menu.php';</script>";
    
}
else{

        echo "Error: ".mysqli_error($conn);

}



                    }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
                }
            }else{
                echo "<br>".$_FILES["archivo"]["name"]." - NO es imagen jpg, png o gif";
            }
        
    }else{
        echo "<br>No se ha subido ninguna imagen";
    }




}

  

    ?>
	
</body>
</html>