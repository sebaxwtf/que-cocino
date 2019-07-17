<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";
$conn = mysqli_connect($server, $user, $pass, $bd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$usuario = $_POST["txtcorreo"];
$pasi = $_POST["txtpass"];

$query = "SELECT * FROM `usuario` WHERE `Correo` LIKE '".$usuario."' AND `clave` LIKE '".$pasi."'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     
        
        	
        		    $_SESSION["us"] = $row["Correo"];
        		    $_SESSION["nom"] = $row["nombre"];
                echo "<script>alert('Bienvenido: ".$row["nombre"]."');</script>";
                    echo "<script>window.location = 'busqueda.php';</script>";

}
}
else{
	   echo "<script>alert('usuario inexistente');</script>";
                    echo "<script>window.location = 'login.html';</script>";

}

?>