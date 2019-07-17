<!--Este php contiene la coneccion a la bd, para obtener los comentarios de su correspondiente tabla 
y mostrarlos a el usuario a travez del receta.php -->
<?php 
/* Aquì se declaran las variables a utilizar*/
session_start();
$esto = $_POST["nomnom"];


$idr = $_SESSION["idex"];

$us = $_SESSION["us"];

$come = array();
$core = array();

$server = "localhost";
$user = "root";
$pass = "";
$bd = "qcn";

/* Coneccion al servidor para obtener los comentarios de la receta...*/ 
    $conn = mysqli_connect($server, $user, $pass, $bd);
$query = "INSERT INTO `comentarios` ( `idCom`, `Comentario`,  `CorreoUsC`,  `RecC`)  VALUES  ('0','".$esto."', '".$us."', '".$idr."')";

if (mysqli_query($conn, $query)) {

$query2 = "SELECT * FROM `comentarios` WHERE `RecC` = ".$idr."";

$result2 = mysqli_query($conn, $query2);
/* En el caso de lograr la coneccion meter la informacion en un arreglo 
para mostrarlo luego en el for siguiente*/
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
    
    $come[] = $row["Comentario"]; 
    $core[] = $row["CorreoUsC"];
    

    }
    
}
/* aquí se crea un for para que cree la estructura de como se mostrara los comentarios a los usuarios
 ... */
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
  
}
//en el caso de fallar la coneccion se sabra gracias a este "echo"
else{
  echo "Error: ".mysqli_error($conn);
}





 ?>