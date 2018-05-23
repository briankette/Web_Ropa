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

$busca="";
if ($_POST) {
	$busca = $_POST['busqueda'];
}

$articulos = $conexion->prepare(
	"SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE Descripcion LIKE '%".$busca."%' LIMIT $inicio, $postPorPagina"
);

$articulos->execute();
$articulos = $articulos->fetchAll();

if (!$articulos) {
	echo "<script>";
	echo "alert('No hay ninguna coincidencia.');";  
	echo "window.location = 'buscador.php';";
	echo "</script>"; 
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

$numeroPaginas = ceil($totalArticulos / $postPorPagina);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>DAISING - Buscador</title>
	<link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
</head>
<body>

	<?php include("..\header\header.php"); ?>

	<article id="productos">
		<div class="section">
			<h3>Buscador</h3>
			<div id="divider">
				<hr style="float: left;"><i class="material-icons">search</i><hr style="float: right;">
			</div>
		</div>

     	<form class="row" method="POST">
        	<div id="busca" class="input-field" class="col s6">
        		<input id="search" type="search" name="busqueda" required>
        		<label class="label-icon" for="search">
        			<i class="material-icons">search</i>
        		</label>
        	</div>
        	<div class="col s6">
        		<button id="boton_buscar" class="btn btn-dark" type="submit">Buscar</button>
        	</div>
     	</form>

 		<div class="row">

    	<?php foreach ($articulos as $articulo): ?>

    	<div class="row">
    	  	<div id="seleccion_producto" class="col s12 m6 l3">
		    	<a id="a" href="../producto/Producto.php?id=<?php echo $articulo['id']; ?> ">
		    		<img src="../fotos/<?php echo $articulo['Foto']; ?>" width="200px">
		    		</br>
		    		<p id="descripcion"><?php echo $articulo['Descripcion']; ?></p>
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
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			<?php else: ?>
			<li>
				<a href="?pagina=<?php echo $pagina + 1 ?> "><i class="material-icons">chevron_right</i></a>
			</li>
		    <?php endif ?>	    
		</ul>
	</article>

    <?php include("../footer/footer.html"); ?>

    <style>

		#precio_producto { 
			font-size: 18px; 
			font-family: 'Spectral SC', serif;
			color: red;
		}

    	#descripcion {
    		margin-bottom: 5px; 
    		margin-top: 10px; 
    		font-family: 'Spectral SC', serif; 
    		font-size: 15px;
    		color: #343a40;
    	}

		#a {
			text-decoration: none;
		}

		.section {
			padding-bottom: 0;
		}

		#seleccion_producto {
			padding-top: 11.5px;
			position: unset;
			border: solid;
			border-width: 0.5px;
			border-color: white;
			transition: border-color 0.5s;
		}

			#seleccion_producto:hover {
				border-color: grey;
			}

		.breadcrumb{
			font-size: 15px;
		}

        #barra {
			margin-top: 17px;
			height: 40px;
		}

        #bread {
        	color: black;
        	font-family: 'Spectral SC', serif;
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
        	margin-left: 41%;
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

    	article {
    		margin-top: 17px;
    		width: 100%;

    	}
        
        footer{
        	width: 100%;
        }

    	#search {
    		padding-left: 50px;    		
    		width: 100%;
    		margin-bottom: 0;
    		display: flex;
    		background: rgba(255, 255, 255, 0.9);     		
    		border-bottom: none;
    		font-size: 18px;
    		font-family: 'Marcellus SC', serif;
    	} 

    	#busca {
    		border-style: none;
    		border-bottom: none;
    		width: 80%;
    		display: flex;
    		-webkit-box-shadow: 0px 3px 24px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 3px 24px -1px rgba(0,0,0,0.75);
            box-shadow: 0px 3px 24px -1px rgba(0,0,0,0.75);
            z-index: 100;
    	}

    	 #boton_buscar {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
            margin-top: 20px;
        }
           #boton_buscar:hover {
               background-color: #444444;
           }
    </style>
</body>
</html>