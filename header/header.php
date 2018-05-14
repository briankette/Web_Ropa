<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>navbar</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
    <script>
		$( document ).ready(function(){
              $(".dropdown-button").dropdown();
              $("#boton").click(function(){
                  $("#contenido").fadeToggle("fast");
              });
        });
    </script>
</head>
<body>
	<header>
		<div class="navbar-fixed">
			<ul id="dropdown1" class="dropdown-content">
			  <li id="vacio"><a style="text-decoration:none" href="#!">Categorias</a></li> 
			  <li><a style="text-decoration:none" href="../hombre/hombre.php">Hombres</a></li>
              <li class="divider"></li>
              <li><a style="text-decoration:none" href="../mujer/mujer.php">Mujeres</a></li>
			</ul>		
			<nav>
			    <div class="nav-wrapper">
			      <a style="text-decoration:none"  id="logo" class="brand-logo center"><img src="../header/logo.png" width="75"></a>
                  <?php if (isset($_SESSION['usuario'])) { echo '<a style="text-decoration:none" href="../cerrar_sesion/cerrar_sesion.php" id="register" class="waves-effect waves-light btn-flat">Cerrar sesion<i id="icon_user" class="material-icons right">account_circle</i></a>'; }else{ echo '<a style="text-decoration:none" href="../login/login.php" id="register" class="waves-effect waves-light btn-flat">Iniciar sesion<i id="icon_user" class="material-icons right">account_circle</i></a>'; } ?>
			      <ul id="nav-mobile" class="left hide-on-med-and-down">
		             <li><a style="text-decoration:none" href="../pagina_principal/index.php">Inicio</a></li>
		             <li><a style="text-decoration:none" class="dropdown-button" href="#!" data-activates="dropdown1">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
		             <li><a style="text-decoration:none" href="../sobre_mi/sobre_mi.php">Sobre mi</a></li>
		             <li><a style="text-decoration:none" href="../contacto/contacto.php">Contacto</a></li>
		             <li id="boton"><a style="text-decoration:none"><i class="material-icons right">search</i></a></li>   
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
    		margin-right: 3%;
            vertical-align:middle;    		
    		margin-top: 23px;
    		font-size: 11px; 
            font-family: 'Marcellus SC', serif;
    	}	
    	    #register:hover {    	    	
    	    	color: white;
                background: black;
    	    }

    	#icon_user {
    		margin-left: 8px;            
            position: relative;
            bottom: 15px;
    	}  

    	#contenido {
    		display: none;
    		padding-left: 330px;    		
    		position: fixed;
            z-index: 100;
    	}  

    	#search {
    		padding-left: 50px;    		
    		width: 300px;
    		margin-bottom: 0;
    		display: flex;
    		background: rgba(255, 255, 255, 0.9);     		
    		border-bottom: none;
    	} 

    	#busca {
    		border-style: none;
    		border-bottom: none;
    		width: 300px;
    		display: flex;
    		-webkit-box-shadow: 0px 3px 24px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 3px 24px -1px rgba(0,0,0,0.75);
            box-shadow: 0px 3px 24px -1px rgba(0,0,0,0.75);
            z-index: 100;
    	}

    </style>
    
    <div id="contenido">
      <form>
        <div id="busca" class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
        </div>
      </form>
    </div>     
</body>
</html>