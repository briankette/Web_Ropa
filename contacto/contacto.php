<?php session_start();

try{
	$conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');	
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

$errores = '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>DAISING - Contacto</title>
	<link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
</head>
<body>

	<?php include("..\header\header.php"); ?>
		
	<article id="contacto">
		<div class="section">
			<h3>Contactame</h3>
			<div id="divider">
				<hr style="float: left;"><i class="material-icons">question_answer</i><hr style="float: right;">
			</div>
		</div>

		<div id="formulario" class="row">
		    <form class="col s12">
		      	<div class="row">
		        	<div class="input-field col s12">
		          		<i class="material-icons prefix">assignment_ind</i>
		          		<input id="nombre" type="text" class="validate">
		          		<label for="icon_prefix">Nombre</label>
		        	</div>
		      	</div>
		      	<div class="row">
		        	<div class="input-field col s12">
		          		<i class="material-icons prefix">mail</i>
		          		<input id="email" type="email" class="validate">
		          		<label for="email">Email</label>
		        	</div>
		      	</div>
		      	<div class="row">
		        	<div class="input-field col s12">
		          		<i class="material-icons prefix">mode_edit</i>
		          		<textarea id="mensaje" class="materialize-textarea"></textarea>
		         		<label for="icon_prefix2">Mensaje</label>
		        	</div>
		      	</div>
		    </form>
		</div>		  
		<button id="enviar" class="btn btn-dark" type="submit" name="action">ENVIAR
		    <i id="flecha" class="material-icons right">send</i>
		</button>      
	</article>

	<?php include("../footer/footer.html"); ?>

	<style>

		body {
			background-color: #F0F0F0;
		}

		#flecha {
			padding-left: 10px;
		}

		#contacto {
        	width: 85%;
        	margin: auto;
        	text-align: center;
        	margin-top: 50px;
        	margin-bottom: 100px;
        }
		
		h3 {
			font-family: 'Marcellus SC', serif;
			font-size: 30px;
		}

		hr {
        	width: 47%;
			background-color: grey;
        }

        #formulario {
        	margin-top: 50px;
        	width: 60%;
        }

        #enviar {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
        }
           #enviar:hover {
               background-color: #444444;
           }

	</style>
	
</body>
</html>