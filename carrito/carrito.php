<?php session_start();

	try{
		$conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');	
	}catch(PDOException $e){
	    echo "Error: " . $e->getMessage();
	    die();
	}

	$errores = '';

	if (isset($_SESSION['carrito'])) {
		if(isset($_GET['id'])){
			$arreglo = $_SESSION['carrito'];
			$encontro = false;
			$numero=0;
			for ($i=0;$i<count($arreglo);$i++) { 
				if($arreglo[$i]['id']==$_GET['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			if($encontro==true){
				$arreglo[$numero]['Canti']=$arreglo[$numero]['Canti']+1;
				$_SESSION['carrito']=$arreglo;
			}else{
				$nombre="";
				$precio=0;
				$imagen="";
				$re= $conexion->prepare("SELECT * FROM producto WHERE id =" .$_GET['id']);
				$re->execute();
				while ($f = $re->fetch(PDO::FETCH_ASSOC)) {
					$nombre=$f['Descripcion'];
					$precio=$f['Precio'];
					$imagen=$f['Foto'];
				}
				$datosNuevos = array('id'=>$_GET['id'],
								'Des'=>$nombre,
								'Price'=>$precio,
								'Imagen'=>$imagen,
								'Canti'=>1);

				array_push($arreglo, $datosNuevos);
				$_SESSION['carrito']=$arreglo;
			}
	}

	}else{
		if (isset($_GET['id'])) {
			$nombre="";
			$precio=0;
			$imagen="";
			$re= $conexion->prepare("SELECT * FROM producto WHERE id =".$_GET['id']);
			$re->execute();
			while ($f = $re->fetch(PDO::FETCH_ASSOC)) {
				$nombre=$f['Descripcion'];
				$precio=$f['Precio'];
				$imagen=$f['Foto'];
			}
			$arreglo[]=array('id'=>$_GET['id'],
							'Des'=>$nombre,
							'Price'=>$precio,
							'Imagen'=>$imagen,
							'Canti'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>DAISING - Carrito</title>
	<link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="carrito.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
</head>
<body>

	<?php include("..\header\header.php"); ?>
		
	<article id="carrito">

		<div class="section">
			<h3>Carrito de compras</h3>
			<div id="divider">
				<hr style="float: left;">
				<i class="material-icons">local_grocery_store</i>
				<hr style="float: right;">
			</div>
		</div>
		<?php 
			if (isset($_SESSION['carrito'])) {	
				echo  '<table id="tabla" class="table-responsive">
							<thead>
								<tr>
									<th scope="col"></th>
									<th scope="col">Producto</th>
									<th scope="col">Precio</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Total</th>
								</tr>
							</thead>';		 
			}
 		?>
			  
		<?php 
			$total=0;
			if(isset($_SESSION['carrito'])){
				$datos=$_SESSION['carrito'];
				$total=0;
				for($i=0;$i<count($datos);$i++){
		?>

			<tbody class="producto">
			    <tr>
			    	<td><img src="../fotos/<?php echo $datos[$i]['Imagen'];?>" width="70"></td>
			    	<td><?php echo $datos[$i]['Des'];?></td>
			    	<td>$<?php echo $datos[$i]['Price'];?></td>
			    	<td id="ca">
			    		<input id='i_cantidad' class="cantidad" class="form-control" type="text" value="<?php echo $datos[$i]['Canti'];?>"
			    		data-precio="<?php echo $datos[$i]['Price'];?>"
			    		data-id="$<?php echo $datos[$i]['id'];?>">
			    	</td>
			    	<td class="subtotal">$<?php echo $datos[$i]['Canti']*$datos[$i]['Price'];?></td>
			    </tr>

		<?php 
				$total=($datos[$i]['Price']*$datos[$i]['Canti'])+$total;
				}
			}

			if (isset($_SESSION['carrito'])) {	
				echo ' <tr id="num_total">
						 <td>Total a pagar: </td>
						 <td></td>
						 <td></td>
						 <td></td>
						 <td style="color: red;">$'.$total.'</td>
					   </tr>
					 ';
		 
			}else{
				echo '<center><h4 id="mensaje">El carrito de compras está vacio.</h4></center>';
			}
 		?>
				
			</tbody>
		</table> 		
		
		<a style="text-decoration:none" href="../pagina_principal/index.php" id="volver" class="waves-effect waves-light btn-flat"><i id="icono" class="material-icons right">local_grocery_store</i>Volver a la tienda</a>

		<?php 

			if(isset($_SESSION['carrito'])){
				echo '<button id="enviar" class="btn btn-dark" type="submit" name="action">Finalizar compra</button>';
			}	

		?> 

	</article>

	<?php include("../footer/footer.html"); ?>

	<style>

		body {
			background-color: #F0F0F0;
		}

		#tabla {
			margin-top: 40px;
			margin-bottom: 50px;
			font-family: 'Cinzel', serif;
			font-size: 18px;
		}
		
		#num_total {
			font-size: 24px;
			background-color: #DEDEDE;
		}

		td {
			vertical-align: middle;
			width: 25%;
		}

		#ca {
			font-family: 'Cinzel', serif;
		}

		#i_cantidad {
			margin: 0;
			width: 10%;
		}

		#mensaje {
			margin: 50px;
		}

		#carrito {
        	width: 85%;
        	margin: auto;
        	text-align: center;
        	margin-top: 50px;
        	margin-bottom: 100px;
        }
		
		h3 {
			font-family: 'Marcellus SC', serif;
			font-size: 30px;
			margin: 30px;
		}

		h4 {
			font-family: 'Marcellus SC', serif;
			font-size: 20px;
		}

		hr {
        	width: 47%;
			background-color: grey;
        }

        #enviar {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
        }
           #enviar:hover {
               background-color: #444444;
           }

        #volver {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
            color: white;
        }
           #volver:hover {
               background-color: #444444;
           }

    	#icono {
			padding-left: 10px;
		}

	</style>
</body>
</html>