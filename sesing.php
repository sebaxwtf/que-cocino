<!DOCTYPE html>
<html lang="es">
<head>
    <!-- pagina orientada a la descripcion e informacion de la receta-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quecocino - Registro</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/letras.css" rel="stylesheet" />
<link href="css/img.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
        <div class="col-sm-4"><a class="navbar-brand icono-cam" href="index.html">QueCocino</a> </div>
        <div class="col-sm-6"></div>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
                <div class="col-sm-1"><a class="nav-link" href="index.html">Login</a></div>
        </li>
        <li class="nav-item">
                <div class="col-sm-1"><a class="nav-link" href="register.html">Registro</a></div>
         
            
          </li>
      </ul>
      </div>
    </nav><!-- fin del nav-->
<br>
<br>
<br>

    <div class="container-fluid">
        <div class="row"><!-- inicio del row -->
       
    <div class="col-sm-4">
   <img src="img/arroz.jpg" height="200px" width="200px" alt="">
    <h3>puntaje:</h3>
    <p>3.5</p>
    </div>

    <div class="col-sm-8">
    <h3>Titulo: </h3><p>Ratatuile</p>
    <h3>Autor: </h3><p>Juan Carlos Bodoque</p>
    <h3>Ingredientes:</h3>
    <ul>
        <li>aceite</li>
        <li>pimenton verde</li>
        <li>berenjena</li>
        <li>sal</li>
    </ul>
    <h3>Como lo hago?</h3>
    <p>
        Hechale aceite, calientalo y mientras, laba y corta en rodajas el pimenton verde y als berenjenas
        , luego de eso metelas en el sarten a fuego lento y paff.. a esperar.. cuando este a medias,
        hechale sal.
    </p>
    <h3>Comentarios</h3>
    <h4>usuario:</h4><p>pepe paloma</p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repudiandae esse neque error 
        soluta, architecto atque enim eos tenetur, porro saepe. Unde, tenetur eaque exercitationem 
        perferendis suscipit dolore itaque voluptatibus.
        <button class="btn btn-info">editar</button>
    </p>
    <hr><!-- fin del primer comentario -->
    <h4>usuario:</h4><p>carlos colina</p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repudiandae esse neque error 
        soluta, architecto atque enim eos tenetur, porro saepe. Unde, tenetur eaque exercitationem 
        perferendis suscipit dolore itaque voluptatibus.
        <button class="btn btn-info">editar</button>
    </p>
    <hr>
    <form action="agregarreceta.php" method="post">
        <textarea name="textarea" id="" cols="30" rows="10"></textarea>
        <br>
        <button type="submit" class="btn btn-info">agregar comentario</button>
    </form>
    
    </div>

        </div><!-- fin del primer row-->
        <hr>
    </div>  


</body>
</html>