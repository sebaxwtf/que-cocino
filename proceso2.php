<?php 

session_start();

$laB = $_SESSION["re"];

$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";

    $us = $_SESSION["us"];
 $abc = array();

 $nom = $_POST["namer"];
 $desk = $_POST["d-receta"];

   $abc = $_POST["sel"];
    if (empty( $_POST["sel"])) {
         echo "<script>alert('Error, sin ingredientes seleccionados' );</script>";
    echo "<script>window.location = 'menu.php';</script>";
 }
 else{
 	$conn = mysqli_connect($server, $user, $pass, $bd);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "UPDATE `receta` SET `NombreRec` = '".$nom."' , `descripcion` = '".$desk."' WHERE `receta`.`idReceta` = '".$laB."'";

if (mysqli_query($conn, $query)) {
            	$conn2 = mysqli_connect($server, $user, $pass, $bd);
           $query2 = "DELETE FROM `ing_rec` WHERE `Receta_idReceta` = '".$laB."'";

if (mysqli_query($conn2, $query2)) {

$cant = count($abc);

$conn3 = mysqli_connect($server, $user, $pass, $bd);
for ($i=0; $i <$cant ; $i++) { 
   
 $query3 = "INSERT INTO `ing_rec` (`Ingrediente_idIngrediente`, `Receta_idReceta`) VALUES ('".$abc[$i]."', '".$laB."') ";
 
 mysqli_query($conn, $query3);

 
    
}

}
}
else{

        echo "Error: ".mysqli_error($conn);

}


 }




           





mysqli_close($conn);

    echo "<script>alert('Modificado correctamente' );</script>";
      unset($_SESSION["re"]);
    echo "<script>window.location = 'vermisrec.php';</script>";
    


 ?>