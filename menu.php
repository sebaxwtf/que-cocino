<?php 
session_start();
 ?>
 <!-- pagina orientada a la creacion de mas recetas -->
<!DOCTYPE html>
<html lang="es">
<head> <!--etiquetas que ayudan a saber de la pagina(titulo), mejoran 
responsividad y linkean estilos css necesarios. -->
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
      /*se verifica la sesion y se imprime en la barra el link de perfil y el salir, en caso contrario
      se imprime login y registro*/
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
           <!--en esta parte se comienza a ordenar el formulario para la creacion de las recetas.. -->
           <div class="col-sm-12"><form action="control.php" method="post" enctype="multipart/form-data" class="register-form" >
            <p>
              <h1>Crear Receta</h1>
            </p>
                <p>
                   Nombre de la receta
                </p>
                <input type="text" name="namer" id="">
                <p>
                   Ingredientes 
                </p>
            </div>
             <!--chekbox que permite la seleccion de productos para la creacion de la receta -->
                 <div class="col-sm-4"> 
                     <input type="checkbox" name="sel[]" value="1">arroz<br>
                    <input type="checkbox" name="sel[]" value="2">azucar<br>
                    <input type="checkbox" name="sel[]" value="3" >berenjena<br>
                    <input type="checkbox" name="sel[]" value="4" >brocoli(arbolitos verdes)<br> 
                    <input type="checkbox" name="sel[]" value="5" >limones<br> 
                    <input type="checkbox" name="sel[]" value="6" >pimenton verde<br> 
                    <input type="checkbox" name="sel[]" value="7" >pollo<br> 
                 </div>
                 <div class="col-sm-8">
                        <input type="checkbox" name="sel[]" value="8" >salmon<br> 
                        <input type="checkbox" name="sel[]" value="9" >sal<br> 
                        <input type="checkbox" name="sel[]" value="10" >camarones<br> 
                        <input type="checkbox" name="sel[]" value="11" >palta<br> 
                        <input type="checkbox" name="sel[]" value="12" >zanahoria<br>  
                        <input type="checkbox" name="sel[]" value="13" >aceite de oliva<br> 
                        <input type="checkbox" name="sel[]" value="14" >aceituna<br> 
                        <input type="checkbox" name="sel[]" value="15" >aji<br> 
                        <input type="checkbox" name="sel[]" value="16" >almendras<br> 
                 </div>
                <div class="col-sm-12">
                        <p>
                                Proceso de cocina
                             </p>
                             <textarea name="d-receta" id="d-receta" cols="30" rows="10"></textarea>
                             
                     
                </div>
                <div class="col-sm-4">
                       <input type="file" name="archivo" id="archivo" ><!-- esta linea permite adjuntar un archivo-->
                        
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