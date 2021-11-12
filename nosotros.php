<?php 

    require 'include/funciones.php';

    
    incluirTemplate('header');
    
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de Experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur error voluptas consequatur a, fugiat praesentium eius perspiciatis repellendus fugit earum rem accusamus at ipsum incidunt quae odio soluta fuga mollitia.
                Porro repellendus quas numquam commodi laborum perspiciatis sed assumenda obcaecati dolorem officia ipsam molestiae cum veniam quia deserunt quo vitae sapiente tenetur voluptate, totam pariatur necessitatibus? Tenetur, minima? Reprehenderit, ducimus!</p>
                <p>Cum assumenda laborum commodi velit. Repudiandae commodi magnam, molestias consectetur ullam soluta, minima repellendus, eos ipsa non quasi? Perferendis consectetur esse incidunt nam quis minima doloribus tempore inventore libero sequi!
                Ex asperiores, vitae et quidem ea fuga, sint dolorem tenetur eveniet omnis vero, magni animi? Atque, doloremque placeat rerum tempore adipisci exercitationem ipsam labore distinctio laudantium nobis temporibus, assumenda nulla.</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, similique expedita? Dignissimos porro impedit culpa provident. Repellat, illo quis quia explicabo maiores mollitia placeat officia sequi unde, inventore saepe architecto?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, similique expedita? Dignissimos porro impedit culpa provident. Repellat, illo quis quia explicabo maiores mollitia placeat officia sequi unde, inventore saepe architecto?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, similique expedita? Dignissimos porro impedit culpa provident. Repellat, illo quis quia explicabo maiores mollitia placeat officia sequi unde, inventore saepe architecto?</p>
            </div>
        </div><!--.iconos-->
    </section>


<?php 

    incluirTemplate('footer');

?>