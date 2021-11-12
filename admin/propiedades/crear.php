<?php 

    //proteger URL
    require '../../include/funciones.php';
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /');
    }

    //Base de datos
    require "../../include/config/database.php";
    $db = conectarDB();
    //  var_dump($db);

    //Consultar para obtner los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query( $db, $consulta);

    //Creamos Arreglo con mensajes de errores
    $errores = [];

    //Inicializamos las variables, para almacenar datos

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    //Ejecutar el código después de que el usuario envia el formulario    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        /*echo "<pre>";
        var_dump($_POST);
        echo "</pre>";*/
        /*echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";*/

        $titulo = mysqli_real_escape_string($db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string($db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un título";
        }
        if(!$precio){
            $errores[] = "Debes añadir un precio";
        }
        if( strlen( $descripcion) < 20 ){
            $errores[] = "La descripción es obligatoria y debe tener al menor 20 caracteres";
        }
        if(!$habitaciones){
            $errores[] = "El número de habitaciones es obligatorio";
        }
        if(!$wc){
            $errores[] = "El número de Baños es obligatorio";
        }
        if(!$estacionamiento){
            $errores[] = "El número de lugares de estacionamiento es obligatorio";
        }
        if(!$vendedorId){
            $errores[] = "Elige un vendedor";
        }
        if(!$imagen['name'] || $imagen['error']){
            $errores[] = 'La Imagen es Obligatoria';
        }
        //Validamos por tamaño (1mb max)

        $medida = 1000 * 1000; //convierte de bites a kilobytes
        if($imagen['size'] > $medida){
            $errores[] = 'La Imagen es muy pesada';
        }

        
        //echo "<pre>";
        //var_dump($errores);
        //echo "</pre>";

        //Revisar que el array de errores este vacios, para insertar datos en BD

        if(empty( $errores )){

            /**SUBIDA DE ARCHIVOS */

            //Creamos una carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //Genera un nombre único (para poder subir mas de una img)
            $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";
            

            //Subir la Imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen  );

            //Insertar en la Base de Datos
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, vendedorId, creado ) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId', '$creado' ) ";
            
            
            // echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=1');
            }
        }        
    }
    
    incluirTemplate('header');
    
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo"  placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
                
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input 
                type="number" 
                id="habitaciones" 
                name="habitaciones" 
                placeholder="Ej: 3" 
                min='1' 
                max='9' 
                value="<?php echo $habitaciones; ?>">

                <label for="baños">Baños:</label>
                <input type="number" id="baños" name="wc" placeholder="Ej: 3" min='1' max='9' value="<?php echo $wc; ?>">
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min='1' max='9' value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
                        <option <?php echo $vendedorId == $vendedor['id'] ? 'selected' : '';?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile;?>

                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>


<?php 

    incluirTemplate('footer');

?>