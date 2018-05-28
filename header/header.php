<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>navbar</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
    <script>
        $(function(){         
            $(".dropdown-trigger").dropdown();      
        });       
    </script>
</head>
<body>
	<header>
		<div class="navbar-fixed">
			<ul id="dropdown1" class="dropdown-content">
                <li id="vacio"><a href="#!">Categorias</a></li> 
                <li><a href="../hombre/hombre.php">Hombres</a></li>
                <li class="divider"></li>
                <li><a href="../mujer/mujer.php">Mujeres</a></li>
			</ul>		
			<nav>
			    <div class="nav-wrapper">
                    <a id="logo" class="brand-logo center"><img src="../header/logo.png" width="75"></a>
                    <?php 
                        if (isset($_SESSION['usuario'])) { 
                            echo '<a style="text-decoration:none" href="../cerrar_sesion/cerrar_sesion.php" id="register" class="waves-effect waves-light btn-flat">Cerrar sesion<i id="icon_user" class="material-icons right">account_circle</i></a>'; 
                        }else{ 
                            echo '<a style="text-decoration:none" href="../login/login.php" id="register" class="waves-effect waves-light btn-flat">Iniciar sesion<i id="icon_user" class="material-icons right">account_circle</i></a>'; 
                        } 
                    ?>
                    <a href="../carrito/carrito.php" id="chango" class="waves-effect waves-light btn-flat"><i id="icon_user" class="material-icons right">local_grocery_store</i></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="../pagina_principal/index.php">Inicio</a></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="../sobre_mi/sobre_mi.php">Sobre mi</a></li>
                        <li><a href="../contacto/contacto.php">Contacto</a></li>
                        <li id="boton"><a href="../buscador/buscador.php"><i class="material-icons right">search</i></a></li>   
                    </ul>			      
			    </div>
			</nav>
		</div> 
	</header>
    <style>

        #boton{
            color: #474242;
        }
            #boton:hover {
                color: white;
            }
        #dropdown1 {
            background: rgba(255, 255, 255, 0.8);
            color: #474242;
        }

    	nav {
    		height: 80px;
    		background: rgba(255, 255, 255, 0.8); 
            -webkit-box-shadow: 0px 7px 18px -8px rgba(0,0,0,0.79);
            -moz-box-shadow: 0px 7px 18px -8px rgba(0,0,0,0.79);
             box-shadow: 0px 7px 18px -8px rgba(0,0,0,0.79);
    	}
    	  nav ul {
    	  	
    	  }
    	    nav ul li a {
    	    	color: #474242;
    	    	height: 80px;
    	    	padding-top: 10px;
                font-family: 'Marcellus SC', serif;
                font-size: 16px;
                
            }        	    
    	       nav ul li a:hover {
    	       	  background: black;
    	       	  color: white;
                  text-decoration: none;
    	       } 

    	#logo  {   		
    		padding-top: 0.4%;
    	}  

    	#nav-mobile {
    		padding-left: 60px;
    	}  


    	#dropdown1 a {
            padding-top: 30px;
            text-align: center;
            color: #474242;
    	}   
    	   #dropdown1 a:hover {
    	   	    color: white;
    	   }  

        #vacio {
            background: black;
        }

        #vacio a {
            color: white;
        }    

    	hr {
    		width: 600px;    		
    	}  

    	i.right {
    		    margin-left: 0px;
    	}

    	#register {   
            position: relative; 		
    		float: right;
            margin-right: 2%;
            vertical-align:middle;    		
    		margin-top: 23px;
    		font-size: 11px; 
            font-family: 'Marcellus SC', serif;
    	}	
    	    #register:hover {    	    	
    	    	color: white;
                background: black;
    	    }

        #chango {   
            position: relative;         
            float: right;
            vertical-align:middle;          
            margin-top: 23px;
            font-size: 11px; 
            font-family: 'Marcellus SC', serif;
        }   
            #chango:hover {               
                color: white;
                background: black;
            }

    	#icon_user {
    		margin-left: 8px;            
            position: relative;
            bottom: 15px;
    	}  

    </style>        
</body>
</html>