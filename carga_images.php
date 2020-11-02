<?php
include('inc/server.php');

$carpeta = 'images';
$directorio = opendir($carpeta); // ruta actual
while ($archivo = readdir($directorio)) // obtenemos un archivo y luego otro sucesivamente
{
    if (! is_dir($archivo) && $archivo != 'Thumbs.db') // verificamos si es o no un directorio
    {
        $elem_url[] = $archivo;
    }
}

if (isset($_POST['renovar'])) {
    $orden = $_POST['orden'];
    $renovar = $_POST['renovar'];

    
    switch ($renovar) {
        case 'borrar':
            global $conn;
            $sql = "DELETE FROM `banner` WHERE 1";
            $result = mysqli_query($conn, $sql);
            
            $sql = "DELETE FROM `rating_info` WHERE 1";
            $result = mysqli_query($conn, $sql);
            break;
        case 'mantener':
            break;
        default:
            break;
    }
    
    foreach ($elem_url as $value) {
        $sql="INSERT INTO `banner`(`id`, `url_image`, `estado`, `orden`)  VALUES ('','$value',1,$orden)";
        $result = mysqli_query($conn, $sql);
    }
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Font Quicksand -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/berta.css">
  <link rel="stylesheet" href="css/berta2.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!--  <link rel="stylesheet" href="css/main.css">
  
          <!-- Mis scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/galeria.js"></script>
</head>
<body>
<!-- *************- MAIN ************* --> 

<main style='background-color:#ffeeca'>

<!-- *************- nav ************* --> 

<nav class="navbar navbar-expand-md m-0 p-0 navbar-dark caobut2">
  <div class="col-12 col-md-2">
  	<a class="navbar-brand bertateka ml-2" href="index.php">Bertateka</a>
  </div>
  <div class="col-auto mx-auto">
	<h4>GALERÍA DE IMÁGENES </h4></div>
 </nav>

 <!-- EMPIEZA container -->

 <div class='container-fluid'>


<!-- EMPIEZA mainbox -->

<div  class='mainbox  mx-auto mt-3'>
<!-- *******************  GRID DE LA PAGINA ************
<!-- EMPIEZA FILA PRINCIPAL -->
<div class='row'>

<div class='col-10 col-md-4 mx-auto'>
<div class="card">
  <form method="post" action="carga_images.php">
    <div class="card-header"><h4>CARGA DE IMÁGENES</h4></div>
    <div class="card-body">
    <div class="input-group">
        <span class="input-group-addon">Datos anteriores:</span>
        <select required id="renovar" name="renovar" class="form-control">
        <option value="borrar">Borrar</option>
        <option value="mantener">Mantener</option>
        </select> 
    </div>
    <div class="input-group">
        <span class="input-group-addon">Categoría:</span>
        <input required type="text" id="orden" name="orden" value=1 class="form-control"> 
    </div>
    <input type="submit" value="Cargar">
    </div>
  </form>
</div>
</div>
</div><!-- FIN PRINCIPAL -->
    
</div><!-- FIN mainbox -->
</div><!-- FIN container -->
</main><!-- FIN MAIN -->


<?php include_once 'inc/footer.inc'; ?>



</div>


</body>
</html>