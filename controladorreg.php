<?php 
session_start();
/* pagina orientada a validar los datos recibidos del register.html y re
gistrar al usuario en caso de estra todo bien*/ 
// datos para la coneccion de la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";
$conn = mysqli_connect($server, $user, $pass, $bd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$usu = $_POST["corr"];
$nom = $_POST["name"];
$pax = $_POST["passta"];

$query = "SELECT * FROM `usuario` WHERE `Correo` LIKE '".$usu."' ";

$result = mysqli_query($conn, $query);

//validacion de si el usuario existe o no, en el caso de que si se envia al login para que este inicie sesion,
//sino este continuara en el register.html, se le enviara un error indicando el problema y
// le permitira registrarse correctamente 
if (mysqli_num_rows($result) > 0) {

  echo "<script>alert('Error usuario ya registrado');</script>";
                    echo "<script>window.location = 'register.html';</script>";



}
else{
$query2 = "INSERT INTO `usuario` ( `Correo`, `nombre`,  `clave`)  VALUES  ('".$usu."','".$nom."', '".$pax."')";
if (mysqli_query($conn, $query2)) {

   echo "<script>alert('Registrado con exito');</script>";
                    echo "<script>window.location = 'login.html';</script>";

}
}


 ?>