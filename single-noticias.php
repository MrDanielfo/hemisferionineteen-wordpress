<?php get_header(); ?>

    <div class="contenedor single">

        <?php while (have_posts()) : the_post(); ?>

        <div class="contenedor-imagentitulo">
            <?php the_post_thumbnail('articulo-single', array('class' => 'img-single')); ?>
            <div class="info-contenedor articulo-single">
                <?php the_field('titulo_noticia'); ?>
            </div>
        </div>

        <div class="contenedor-extracto">
            <p class="credito-foto"><?php the_field('credito_foto'); ?><p>
            <h3><?php the_field('autor_noticia'); ?></h3>
            <div class="fecha">
                <span><?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></span>
            </div>
        </div>

        <div class="contenedor-extracto">
            <h3 class="extracto"><?php the_field('extracto_noticia'); ?></h3>
        </div>

    <?php if(get_field('numero_1') && get_field('dato_1') && get_field('numero_2') && get_field('dato_2') && get_field('numero_3') && get_field('dato_3') ) {  ?>

        <div class="contenedor-gris">

            <div class="datos-importantes">Datos importantes</div>

            <div class="contenedor-datos">
                <div class="dato">
                    <h4><span class="numero"><?php the_field('numero_1'); ?></span> <?php the_field('dato_1'); ?></h4>
                </div>
                
                <div class="dato">
                    <h4><span class="numero"><?php the_field('numero_2'); ?></span> <?php the_field('dato_2'); ?></h4>
                </div>
                
                <div class="dato">
                    <h4><span class="numero"><?php the_field('numero_3'); ?></span> <?php the_field('dato_3'); ?></h4>
                </div>
            </div>

        </div>

        <?php  } else { ?> 
            
        <?php }  ?>

        <div class="contenedor-cuerposingle">
            <?php the_field('contenido_noticia'); ?>
        </div>

        <div class="contenedor-etiquetas">
            <?php the_tags(); ?>
        </div>

        <div class="contenedor-compartir">
            <span>Compartir en: </span>
            <!-- código de AddThis -->
            <div class="addthis_inline_share_toolbox"></div>
        </div>

        <?php endwhile; ?>

    </div>

    <div class="contenedor">

        <button class="titulo-busqueda comentarios" type="submit">Deja un comentario</button>
        <!-- al hacer click mostrará los comentarios y la caja de comentarios en facebook -->

        <h4 class="recomendado">Échale un ojo a esto</h4>

        <div class="contenedor-cajaschicas pagina-single">

            <?php
                $args = array(
                    'post_type' => 'noticias',
                    'cat' => '54, 21, 24, 55',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
            ?>

            <?php $interesante = new WP_Query($args); ?>
            <?php while ($interesante->have_posts()) : $interesante->the_post(); ?>
                <div class="cajas caja-chica">
                    <?php the_post_thumbnail('articulo-chico', array('class' => 'img-articulochico')); ?>
                    <div class="info-contenedor">
                        <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="categoria-contenedor">
                        <?php the_category(); ?>
                    </div>
                </div>
            <?php  endwhile; wp_reset_postdata();  ?>

        </div>

    </div>


<?php get_footer(); ?>