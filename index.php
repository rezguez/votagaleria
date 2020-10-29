<?php include('inc/server.php'); ?>
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
	<h4>GALERÍA DE IMÁGENES <span class="badge badge-warning" style="font-size: 0.5em;" >(puedes votar un máximo de 3)</span></h4></div>
 </nav>

 <!-- EMPIEZA container -->

 <div class='container-fluid'>


<!-- EMPIEZA mainbox -->

<div  class='mainbox  mx-auto mt-3'>
<!-- *******************  GRID DE LA PAGINA ************
<!-- EMPIEZA FILA PRINCIPAL -->
<div class='row'>

<div class='col-10 col-lg-11 mx-auto'>

<!-- ************ GALERIA ************* -->
<div class="popup-gallery">
<div class="card-deck mb-4">
		<?php
			$nums=1;
			$sql_banner_top=mysqli_query($conn,"select * from banner where estado=1");
			while($post=mysqli_fetch_array($sql_banner_top)){
		?>
  <div class="card">

      <a href="images/<?php echo $post['url_image']; ?>" ><img src="images/<?php echo $post['url_image']; ?>" class="card-img-top test-popup-link"></a>

      <div class="card-footer">
      	<div class="row">

     	<div class="col-auto mr-auto">
     <!-- if user likes post, style button differently -->
       <i <?php if (userLiked($post['id'])): ?>
          class="fa fa-thumbs-up like-btn"
         <?php else: ?>
          class="fa fa-thumbs-o-up like-btn"
         <?php endif ?>
         data-id="<?php echo $post['id'] ?>"></i>
       </div>
         <div class="col-auto">
     	 <span class="likes" id="voto-<?php echo $post['id'] ?>"><?php echo getLikes($post['id']). " voto(s)"; ?></span>
     	</div>
  		 </div>
      </div>
    </div>

<?php 
			if ($nums%5==0){
				echo '</div><div class="card-deck">';
			}
		$nums++;
			}
		?>	

</div>
</div>
<!-- ************ END GALERIA  ************* -->
</div>
</div>
</div><!-- FIN PRINCIPAL -->
    
</div><!-- FIN mainbox -->
</div><!-- FIN container -->
</main><!-- FIN MAIN -->


<?php include_once 'inc/footer.inc'; ?>



</div>
  <script src="js/scripts.js"></script>

</body>
</html>