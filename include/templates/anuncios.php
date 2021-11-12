<?php 
    //Importar la conexión a la BD (en este caso el archivo que llama la conexion es index.php)
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();
    //Consulta BD
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //Obtener los resultados
    $resultado = mysqli_query($db, $query);

    
?>
<!--Iterar los resultados obtenidos de la BD-->
<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">
        
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen anuncio">
        

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio"><?php echo $propiedad['precio']; ?></p>

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
            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div><!--.contenido anuncio-->
    </div><!--anuncio-->
    <?php endwhile; ?>
</div><!--.contenedor-anuncios-->

<?php
    //Cerrar la conexión
    mysqli_close($db);
?>