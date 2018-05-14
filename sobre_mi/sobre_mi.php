<?php session_start();

try{
	$conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');	
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DAISING - Sobre mi</title>
	<link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

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

	<article id="sobre">
		<div class="section">
		  <h3>Sobre mi</h3>
		  <div id="divider">
		    <hr style="float: left;"><i class="material-icons">face</i><hr style="float: right;">
		  </div>
		</div>

		<div class="row">
	      <div id="izquierda" class="col s6">
	      	<img class="z-depth-5" id="foto" src="foto/foto1.jpg">
	      </div>
	      <div id="derecha" class="col s6">
	      	<h6><span>Lorem ipsum</span></h6><br><br>
	      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		  </div>
	    </div>
			
	</article>

	<?php include("../footer/footer.html"); ?>

	<style>

		p {
			font-family: 'Cinzel', serif;
			font-size: 18px;
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
		
    	#sobre {
    		margin: auto;
    		width: 85%;
    		margin-top: 50px;
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

    </style>
	
</body>
</html>