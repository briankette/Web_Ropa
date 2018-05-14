<?php session_start();

$errores = '';
// si ya existe una session abierta te redirige a al contenido.
if(isset($_SESSION['usuario'])) {
   header('location: ../pagina_principal/index.php');
}
//
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];

  if (empty($usuario) or empty($pass) or empty($pass2)) {
    $errores .= '<li>Rellena todos los campos.</li>';
  } else {
    // el try / catch es para la conexion a la base de datos.
      try {
          $conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', 'brian');
      } catch (PDOExpedition $e) {
         echo "Error: " . $e->getMessage();
      }

      // acá se verifica que el usuario no exista en la base de datos.
      $statement = $conexion->prepare('SELECT * FROM usuario where usuario = :usuario LIMIT 1');
      $statement->execute(array(':usuario' => $usuario));
      $resultado = $statement->fetch();

      if ($resultado != false) {
        $errores .= '<li>Ese Email ya esta registrado.</li>';
      }
      //encripta contraseñas
      $pass = hash('sha512', $pass);
      $pass2 = hash('sha512', $pass2);

      if ($pass != $pass2) {
        $errores .= '<li>Las contraseñas no coinciden.</li>';
      }
  }

  if ($errores == '') {
    $statement = $conexion->prepare('INSERT INTO usuario (usuario, Password, Nombre, Apellido, Direccion) VALUES(:usuario, :pass, null, null, null)');
    $statement->execute(array(':usuario' => $usuario, ':pass' => $pass));

    header('Location: ../login/login.php');
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	  <meta charset="UTF-8"></meta>
	  <title>DAISING - Registro</title>
    <link rel="shortcut icon" type="image/x-icon" href="../fotos/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
</head>
<body>
    <div id="formularios">
        <form id="registro" name="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div  id="text"><h3>Registrarse</h3></div>
          <a id="home" href="../pagina_principal/index.php"><i class="material-icons">cancel</i></a>
             <div class="row">         
                <div class="input-field col s12">
                  <input id="email" type="email" name="usuario" class="validate" required value=" <?php if($errores && isset($usuario)) echo $usuario ?>"></input>
                  <label for="email" data-error="" data-success="">Email</label>
                </div>
             </div>
             <div class="row">
                <div class="input-field col s12">
                  <input id="password" name="pass" type="password" class="validate" required></input>
                  <label for="password">Contraseña</label>
                </div>
             </div>
             <div class="row">
                <div class="input-field col s12">
                  <input id="password2" name="pass2" type="password" class="validate" required></input>
                  <label for="password">Confirmar Contraseña</label>
                </div>
                <?php if(!empty($errores)): ?>
                  <div class="error">
                     <ul>
                       <?php echo $errores; ?>
                     </ul>
                  </div>
                <?php endif; ?>
             </div>

             <i id="boton2" class="btn waves-effect waves-light"  onclick="login.submit()">REGISTRARSE</i>
        </form> 
        <div id="login">
        <p>¿Ya tenes una cuenta?</p>
        <a id="registro" href="../login/login.php">ACCEDE</a>
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

        #login {
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
            height: 540px;
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

        #registro {
            margin: auto;
            width: 360px;
        }

        #boton2 {
            background-color: black;
            font-size: 13px;
            font-family: 'Marcellus SC', serif;
        }
           #boton2:hover {
               background-color: #444444;
           }
   

    </style>
</body>
</html>