<?php session_start();

try{
	$conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');	
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
	header('Location: ../pagina_principal/index.php');
}

$statement = $conexion->prepare('SELECT * FROM producto WHERE id = :id');
$statement->execute(array(':id' => $id));

$articulo = $statement->fetch();

if (!$articulo) {
	header('Location: ../pagina_principal/index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>DAISING - Producto</title>
	<link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
	<script>
		  $(document).ready(function(){
		    $('.materialboxed').materialbox();
		  });
	</script>
</head>
<body>

	<?php include("..\header\header.php"); ?>

	<article id="detalle">
		<div class="section">
		  	<h3>Detalle de producto</h3>
		  	<div id="divider">
		    	<hr style="float: left;">
		    	<i class="material-icons">zoom_in</i>
		    	<hr style="float: right;">
		  	</div>
		</div>

		<div class="row">
	      	<div id="izquierda" class="col s6">
	      		<img class="z-depth-5 materialboxed" id="foto" src="../fotos/<?php echo $articulo['Foto']; ?>">
	      	</div>
	      	<div id="derecha" class="col s6">
	      		<p id="nombre">
	      			<?php if (!empty($articulo['Descripcion'])) { echo $articulo['Descripcion']; } ?>
	      		</p>
	      		<p id="genero">
	      			<?php echo $articulo['Categoria']; ?>
	      		</p>
	      		<hr>
	      		<p id="precio">
	      			$<?php echo $articulo['Precio']; ?>
	      		</p>
				<div id="tyc">
		      		<select style="float: left;" id="talle" class="form-control">
		      	  	<option disabled selected>Talle :</option>
				  	<option>S</option>
				  	<option>M</option>
				  	<option>X</option>
				  	<option>XL</option>
					</select>
					<a style="text-decoration:none" href="../carrito/carrito.php?id=<?php echo $articulo['id']; ?> " id="añadir" class="waves-effect waves-light btn-flat"><i id="icono" class="material-icons right">local_grocery_store</i>AÑADIR</a>
				</div>
			</div>
	    </div>			
	</article>

	<?php include("../footer/footer.html"); ?>

	<style>

		body {
    		background-color: #F0F0F0;
    	}

		.row {
			width: 100%;
			margin-top: 60px;
		}

		#foto {
			width: 400px;
		}

		.section {
			padding-bottom: 0;
		}
		
		h3 {
			font-family: 'Marcellus SC', serif;
			font-size: 30px;
		}

        hr {
        	width: 47%;
			background-color: grey;
        }
		
    	#detalle {
    		margin: auto;
    		width: 85%;
    		margin-top: 30px;
        	margin-bottom: 100px;
    		text-align: center;
        }
        
        footer {
        	width: 100%;
        }

        h6 {
        	font-size: 25px;
        	font-family: 'Cinzel', serif;
        }

        #comprar {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
        }
           #comprar:hover {
               background-color: #444444;
           }

        #cart {
			padding-left: 10px;
		}

		#nombre {
			font-size: 25px;
			font-family: 'Cinzel', serif;
			margin-bottom: 0px;
			margin-top: 20px;
		}

		#genero {
			font-family: 'Cinzel', serif;
		}

		#precio {
			color: red;
			font-size: 35px;
			margin-bottom: 30px;
			font-family: 'Cinzel', serif;
		}

		#talle {
			width: 35%;
			font-family: 'Cinzel', serif;
			color: black;
			color-rendering: black;
		}

		#tyc {
			width: 55%;
			margin: auto;
		}

        #añadir {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
            color: white;
        }
           #añadir:hover {
               background-color: #444444;
           }

    	#icono {
			padding-left: 10px;
		}
    
    </style>
	
</body>
</html>