<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('location: ../pagina_principal/index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = hash('sha512', $pass);

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');
    } catch (PDOExpedition $e) {
        echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND Password = :pass');
    $statement->execute(array(':usuario' => $usuario, ':pass' => $pass));

    $resultado = $statement->fetch();
    if ($resultado !== false) {
    	  $_SESSION['usuario'] = $usuario;
    	  header('Location: ../pagina_principal/index.php');
    } else {
    	  $errores .= '<li>Email o contraseña incorectos.</li>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"></meta>
    <title>DAISING - Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
</head>
<body>
    <div id="formularios">
        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
            <div  id="text"><h3>Acceder</h3></div>
            <a id="home" href="../pagina_principal/index.php"><i class="material-icons">cancel</i></a>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" name="usuario" class="validate" required value=" <?php if($errores && isset($usuario)) echo $usuario ?>"></input>
                  <label for="email" data-error="" data-success="">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="pass" type="password" name="pass" class="validate" required></input>
                  <label for="password">Contraseña</label>
                </div>
                <?php if(!empty($errores)): ?>
                  <div class="error">
                     <ul>
                       <?php echo $errores; ?>
                     </ul>
                  </div>
                <?php endif; ?>
              </div>
              <i id="boton" class="btn waves-effect waves-light"  onclick="login.submit()">ACCEDER</i>    
        </form>
        <div id="registro">
            <p>¿Aun no estas registrado?</p>
            <a id="registro" href="../registro/registro.php">REGISTRATE</a>
        </div>
    </div>

    <style>

        body {
            background-image: url("imagenes/fondo2.jpg");            
        }

        h3 {
			      font-family: 'Marcellus SC', serif;
            font-size: 28px;
            margin-top: 5px;
        }

        #registro {
            font-family: 'Marcellus SC', serif;
            font-size: 14px;
            text-align: center;
            margin-top: 25px;
        }

    		p {
            margin-bottom: 0px;
            font-size: 15px;
    		}

    		a:hover {
            color: red;
    		}

        .error {
            color: red;

        }

        #formularios {
            margin: auto;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            width: 450px;
            height: 440px;
            padding-top: 30px;
            border: solid;
            -webkit-box-shadow: -2px 9px 30px -4px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 9px 30px -4px rgba(0,0,0,0.75);
            box-shadow: -2px 9px 30px -4px rgba(0,0,0,0.75);
        }

        #home {
            float: right;
            margin-right: 10px;
            margin-top: 10px;
            color: black;
        }
            #home:hover {
                color: #444444;
            }

        #text {
            width: 200px;
            margin-right: 0px;
            float: left;
        }

        #login {
            margin: auto;
            width: 360px;
            position: relative;
        }

        #boton {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
        }
            #boton:hover {
                background-color: #444444;
            }

    </style>
</body>
</html>