<?php session_start();

try{
	$conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');	
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
$postPorPagina = 10;

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM producto LIMIT $inicio, $postPorPagina");

$articulos->execute();
$articulos = $articulos->fetchAll();

if (!$articulos) {
	header('location: index.php');
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

$numeroPaginas = ceil($totalArticulos / $postPorPagina);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0, maximum-scale=1.0">
	<title>DAISING - Inicio</title>
	<link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">

	<script>
		$(document).ready(function(){
	      $('.slider').slider();
	      $('.slider').height('550');
	      $('.slides').height('550');
	    });
	</script>
	
</head>
<body>
	<?php include("..\header\header.php"); ?>
    

    <article>
      <div class="slider">
	    <ul class="slides">
	      <li>
	        <img src="fotos/moda_d.jpg">
	        <div class="caption left-align">
	          <h3 class="titulo">Tendencia, diseño y calidad</h3>
	          <h5 style="font-size: 20px;" class="titulo">20% off hasta 30 de noviembre.</h5>
	        </div>
	      </li>	
	      <li>
	        <img src="fotos/moda_h2.jpg">
	        <div class="caption right-align">
	          <h3 style="color: white; font-size: 40px;">Indumentaria Masculina</h3>
	          <a href="../hombre/hombre.php"><h5 id="slide_boton" class="waves-effect waves-light btn-flat" style="color: white;">VER CATEGORIA</h5></a>
	        </div>
	      </li>	      
	      <li>
	        <img src="fotos/moda_i.jpg"">
	        <div class="caption right-align">
	          <h3 style="color: black; font-size: 40px;">Indumentaria Femenina</h3>
	          <a href="../mujer/mujer.php"><h5 id="slide_boton2" class="waves-effect waves-light btn-flat" style="color: black; ">VER CATEGORIA</h5></a>
	        </div>
	      </li>
	    </ul>
	  </div> 
    </article>

    <div class="divider"></div>
	
	
    <article id="productos">
		<div class="section">
			<h3>Toda la colección</h3>
			<div id="divider">
				<hr style="float: left;"><i class="material-icons">store</i><hr style="float: right;">
			</div>
		</div>
		<div class="row">

    <?php foreach ($articulos as $articulo): ?>
    	
    	<div class="row">
        	<div id="seleccion_producto" class="col s12 m6 l3">
		    	<a style="text-decoration:none" href="../producto/Producto.php?id=<?php echo $articulo['id']; ?> ">
		    		<img id="foto" src="../fotos/<?php echo $articulo['Foto']; ?>" >
		    		</br>
		    		<p id="nombre_producto"><?php echo $articulo['Descripcion']; ?></p>
		    		<hr style="margin-top: 5px; margin-bottom: 5px;"> 
		    		<p id="precio_producto">$<?php echo $articulo['Precio']; ?></p>
		    	</a>
            </div>
		</div>

    <?php endforeach; ?>	
       
        </div>

        <ul class="pagination">
			<!-- Establecer cuando el boton de 'anterior' esta deshabilitado-->
			<?php if ($pagina == 1): ?>
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			<?php else: ?>
			<li>
				<a href="?pagina=<?php echo $pagina - 1 ?> "><i class="material-icons">chevron_left</i></a>
			</li>
		    <?php endif ?> 
			<!-- Se ejecuta el ciclo para mostrar las paginas-->
			<?php 
			for ($i=1; $i <=$numeroPaginas ; $i++) { 
				if ($pagina == $i) {
					echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
				} else {
					echo "<li class='waves-effect'><a href='?pagina=$i'>$i</a></li>";
				}
			}
			?>
			<!-- Establecer cuando el boton de 'siguiente' esta deshabilitado-->
			<?php if ($pagina == $numeroPaginas): ?>
			<li class="disabled">
				<a href="#!"><i class="material-icons">chevron_right</i></a>
			</li>
			<?php else: ?>
			<li>
				<a href="?pagina=<?php echo $pagina + 1 ?> "><i class="material-icons">chevron_right</i></a>
			</li>
		    <?php endif ?>		    
		</ul>
    </article>

    <?php include("../footer/footer.html"); ?>

    <style>
		body {
			background-color: #F0F0F0;
		}

    	a {
    		text-decoration: none;
    	}

		#precio_producto {
			color: #ff0000; 
			font-size: 18px; 
			font-family: 'Spectral SC', serif;
			color: red;
		}

    	#nombre_producto {
    		margin-bottom: 5px; 
    		margin-top: 10px; 
    		font-family: 'Spectral SC', serif; 
    		font-size: 15px;
    		color: #343a40;
    	} 

		.section {
			padding-bottom: 0;
		}

		#seleccion_producto {
			padding-top: 11.5px;
			position: unset;
			border: solid;
			border-width: 0.5px;
			border-color: #F0F0F0;
		}

			#seleccion_producto:hover {
				border-color: grey;
			}

		#seleccion_producto {
			transition: border-color 0.5s;

		}

		#foto {
			width: 200px;
		}

		.titulo {
			font-family: 'Marcellus SC', serif;
			font-size: 45px;
			position: relative;
			right: 16%;
			top: 90px;
		}

		h3 {
			font-family: 'Marcellus SC', serif;
			font-size: 30px;
		}

		.row {
			margin-top: 30px;
		}

        hr {
        	width: 47%;
			background-color: grey;
        }		
		
        .pagination {
        	margin-left: 42%;
        	margin-top: 30px;
        }
        	.pagination li.active {
				background-color: black;
			}

        #productos {
        	width: 85%;
        	margin: auto;
        	text-align: center;
        	margin-top: 50px;
        	margin-bottom: 100px;
        }

        #slide_boton:hover {    	    	
    	    	color: white;
                background: black;
    	    }

    	#slide_boton2:hover {    	    	
    	    	color: white;
                background: white;
    	    }
		
    	article {
    		margin-top: 16px;
    		width: 100%;
    	}

    	img {
    		max-width: 100%;
    	}
        
    </style>
</body>
</html>