<?php 

    require 'include/funciones.php';

    
    incluirTemplate('header');
    
?>
    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>
    
        <?php
            $limite =10;
            include 'include/templates/anuncios.php'
        ?>
    </main>

<?php 

    incluirTemplate('footer');

?>