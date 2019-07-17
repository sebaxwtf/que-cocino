<?php
session_start();
$resc = $_GET["idd"];
//pagina orientada a la validacion de la votacion de las recetas...
$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";


$usersio = $_SESSION["us"];

$vot = $_POST["estrellas"];

$conn = mysqli_connect($server, $user, $pass, $bd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$vari = false;
$nulens =0;
if($vot == null){

		echo "<script>alert('error');</script>";
    echo "<script>window.location = 'receta.php?=idd".$resc.".php';</script>";
}



// Check connection
$query2 = "SELECT * FROM `valoracion` ";

$result2 = mysqli_query($conn, $query2);


if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {

       if($row["Recet"] == $resc && $row["Usuari"] == $usersio){
	echo "<script>alert(' ud ya votó este manga');</script>";
  $vari = true;
    echo "<script>window.location = 'receta.php?idd=".$resc."';</script>";
       }
     
    
    
    }
    
}

if ($vari == false) {
$query = "INSERT INTO `valoracion` ( `idValoracion`, `valoracion`,  `Recet`,  `Usuari`)  VALUES  ('".$nulens."','".$vot."', '".$resc."', '".$usersio."')";


if (mysqli_query($conn, $query)) {

    echo "<script>alert(' voto registrado');</script>";
    echo "<script>window.location = 'receta.php?idd=".$resc."';</script>";
  
}
else{
  echo "Error: ".mysqli_error($conn);
}
}





?>