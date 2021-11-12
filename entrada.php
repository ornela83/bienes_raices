<?php 

    require 'include/funciones.php';

    
    incluirTemplate('header');
    
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la Decoraciónde tu hogar</h1>
       
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021 </span>por: <span>Admin</span></p>
        <div class="resumen-propiedad"> 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur error voluptas consequatur a, fugiat praesentium eius perspiciatis repellendus fugit earum rem accusamus at ipsum incidunt quae odio soluta fuga mollitia.
            Porro repellendus quas numquam commodi laborum perspiciatis sed assumenda obcaecati dolorem officia ipsam molestiae cum veniam quia deserunt quo vitae sapiente tenetur voluptate, totam pariatur necessitatibus? Tenetur, minima? Reprehenderit, ducimus!</p>
            <p>Cum assumenda laborum commodi velit. Repudiandae commodi magnam, molestias consectetur ullam soluta, minima repellendus, eos ipsa non quasi? Perferendis consectetur esse incidunt nam quis minima doloribus tempore inventore libero sequi!
            Ex asperiores, vitae et quidem ea fuga, sint dolorem tenetur eveniet omnis vero, magni animi? Atque, doloremque placeat rerum tempore adipisci exercitationem ipsam labore distinctio laudantium nobis temporibus, assumenda nulla.</p>
        </div>
    </main>


<?php 

    incluirTemplate('footer');

?>