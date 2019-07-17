<?php
// linea que declara que en el php se va a trabajar con sesiones
session_start();


?>
<!DOCTYPE html>




<html lang="es">
<!--en el head de todas las pantallas se encontrara lo mismo o parecido, debido a que aquí se especifica el
título, el meta para obtener la responsibiadad del sitio, los link de estilos como boostrap, imagenes y letras,
además del llamado a los script, para avilitar y utilizar js dentro del apartado, este ultimo no es requerido
en todos los head. -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quecocino - Registro</title><!-- titulo de la pagina-->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<!-- meta para la responsibidad, permite la escalabilidad de la pagina..-->
<link href="css/bootstrap.min.css" rel="stylesheet" /><!--link de estilo css de bosstrap -->
<link href="css/letras.css" rel="stylesheet" /><!--link de estilo para las fuentes de las letras -->
<link href="css/img.css" rel="stylesheet" /><!-- link de estilo para el tamaño de las imagenes -->
<script src="js/jquery-3.2.1.min.js"></script><!--llamado al script de jquery que permitira ejecutar los efectos js -->
<script type="text/javascript" src="js/busqueda.js"></script><!--llamada al script busqueda que nos permitira
activar el efecto de activado y desactivado de la lista de cosas que buscaremos para nuestra receta.... -->
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top"><!-- barra nav resposiva, que utilia estilos boostrap
    navbar, es para especificar a boostrap que se usara una nav, luego el -expand-sm espara especificar el 
    tamaño maximo que es para tablet, smartphones de 5" para arriba y pc convencionales, bg-info para
    especificar el color celesta para la barra, navbar-dark, para decirle al sistema que las letras sean
    blancas y fixed-top para que siempre este arriba y no se desplace para ningun lado ni desaparesca...-->
        <div class="col-sm-4"><a class="navbar-brand icono-cam" href="busqueda.php">QueCocino</a> </div>
        <!--los col-sm-nª son parte del grid de boostrap permiten la responsividad siendo del 1 al 12 maximo
        siendo este ultimo el ancho completo de la pantalla, al decir que es col-sm-4 indica que es solo
        una esquina  -->
        <div class="col-sm-6"></div>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span><!--este span permite agregar la hamburgesa
          de menu cuando la pantalla se reduce lo suficiente, para convertirlo en responsivo para 
          dispositivos moviles... -->
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <?php
/* aquí se utiliza este if con la sesion para verificar el usuario conectado actualmente, 
si este esta conectado se mostrara el div con el perfil y el salir, sino se mostrara el 
login y registro para que la persona se registre o logee en el caso de tener cuenta para poder
utilizar por completo la aplicacion web.
*/
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

<form action="consulta.php" method="POST">
    <div class="container-fluid"><!-- container-fluid nos permite utilizar todo el ancho de la pantalla
    para el sistema-->
        <div class="row"><!--row nos permite crear una fila nueva para la malla de boostrap y tener todo bien 
        ordenado segun el tamaño de nuestras pantallas -->
            <!-- inicio de la busqueda-->
   <!--primera columna de imagenes, estando del lado izquierdo de la olla -->
            <div class="col-sm-2">
                    <img src="img/arroz.jpg" id="1" alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/azucar.jpg" id="2" alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/berenjena.jpg"id="3"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
            </div>
            <!-- seunda culmna de imagenes, estando del lado izquierdo de la olla -->
            <div class="col-sm-2">
                    <img src="img/brocoli.jpg" id="4"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/limon.jpg" id="5"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/pimentonverde.jpg" id="6"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/pollo.jpg" id="7"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/salmon.png" id="8"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
            </div>
            <!-- columna de la olla estando en el centro de todo, donde podran cliquear para comenzar 
            la busqueda de sus ingredientes -->
            <div class="col-sm-4 ">
                
                <h6> Seleccione los ingredientes que tiene, luego presione la olla para buscarlos </h6>
                <br><!--este input aparece con un type="hidden" por que asi no es visible para el usuario
                y por lo tanto no editable para el manualmente y solo a travez del sistema de cliquear
                las imagenes para seleccionar sus productos que posee en casa para armar su receta
                , esto además permite evitar errores y una imagen mas estetica del sistema -->
                  <input type="hidden" id="nomnom" name="nomnom" class="" required>
                  <br>
            <button type="submit" id="olla"  class="olla " alt="imagen de olla"> 


            </div>
            <!--tercera columna de imagenes, estando del lado derecho del la olla -->
            <div class="col-sm-2">
                    <img src="img/sal.jpg" id="9"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/camaron.jpg" id="10"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/palta.jpg" id="11"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/zanahoria.jpg"id="12"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/aceitedeoliva.jpg" id="13"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
            </div>
            <!--cuarta columna de imagenes, estando del lado derecho de la olla -->
            <div class="col-sm-2">
                    <img src="img/aceitunasnegras.jpg" id="14"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                    <img src="img/ajirojo.jpg" id="15"  alt="" class="prod" value="" onClick = "accion(this)" ><br><br>
                    <img src="img/almendras.jpg" id="16"  alt="" class="prod" value="" onClick = "accion(this)"><br><br>
                   
            </div> <!-- fin de la busqueda-->
        
          
    
            <br>
           
<!--<script src="js/jquery-3.2.1.min.js"></script>  -->
<script>
/* aquí se creo un arreglo llamado lista, para almacenar la lista de productos seleccionados, que
será enviado a consulta.php, la que recibira el dato y mostrara los resultados de recetas, con los
ingredientes seleccionados en el sistema anterior*/ 
    var lista = [];
  function accion(b){


var xd = b.id;




if( lista.indexOf(xd) === -1){
     lista.push(xd);
    document.getElementById("nomnom").value=lista.join();
}
else{
   var av = lista.indexOf(xd);

   if (av > -1) {
   lista.splice(av, 1);
    document.getElementById("nomnom").value=lista.join();
}
}

  }

</script>
            
        </div>
    </div>
   
</form>


</body>
</html>