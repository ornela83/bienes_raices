<?php 
    //Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);//Validamos que sea un entero
    //var_dump($id);
    if(!$id) {
        header('Location: /');
    }
    
    //Conexion a Base de datos
    require "include/config/database.php";
    $db = conectarDB();
    //  var_dump($db);

    //Realizar la consulta
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";

    //Obtener los datos de la propiedad
    $resultado = mysqli_query($db, $consulta);

    //echo "<pre>";
    //var_dump($resultado->num_rows);
    //echo "</pre>";
    if(!$resultado->num_rows){
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'include/funciones.php';
    
    incluirTemplate('header');
    
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">
        
        <div class="resumen-propiedad"> 
            <p class="precio"><?php echo $propiedad['titulo']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <?php echo $propiedad['descripcion']; ?>
        </div>
    </main>

<?php 
    //Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');

?>