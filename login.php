<?php

    //Conexión a la Base de Datos
    require 'include/config/database.php';
    $db = conectarDB();

    //Capturamos errores de completado
    $errores = [];

    //Autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido";
        }
        if(!$password){
            $errores[] = "El password es obligatorio o no es válido";
        }
        //echo "<pre>";
        //var_dump($errores);
        //echo "</pre>";

        if(empty( $errores)){

            //Revisar si el usuario existe.
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            //var_dump($resultado);

            if( $resultado->num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);//trae toda la info de ese usuario en forma de array
                //var_dump($usuario);

                //Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);//esta funcion nos retorna un booleano, ya que compara el password hasheado con el que el usuario coloco.
                //var_dump($auth);

                if($auth){
                    //El usuario esta autenticado
                    session_start();
                    
                    // Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                    
                   
                }else{
                    $errores[] = 'El password es incorrecto';
                }
            }else{
                $errores[]= "El Usuario no existe";
            }
        }
        
    }

    // Incluye el Header
    require 'include/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>

        <?php endforeach; ?>
        <form method="POST" action="" class="formulario">
            <fieldset>
                    <legend>Email y Password</legend>

                    <label for="email">E-mail</label>
                    <input type="email" name= "email" placeholder="Tu EMail" id="email">

                    <label for="password">Password</label>
                    <input type="password" name= "password" placeholder="Tu password" id="password">

            </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>


<?php 

    incluirTemplate('footer');

?>