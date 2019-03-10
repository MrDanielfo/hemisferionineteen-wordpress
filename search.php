<?php get_header(); ?>

    <div class="contenedor">

        <?php get_sidebar(); ?>

        <div class="contenedor-extracto">
            <h2 class="titulo-busqueda"><?php echo sprintf( __('%s resultados de la búsqueda de: '), $wp_query->found_posts); echo get_search_query(); ?></h2>
        </div>

        <div class="contenedor-cajaschicas pagina-single">
            <?php while (have_posts()) : the_post(); ?>
                <div class="cajas caja-chica">
                    <?php the_post_thumbnail('articulo-chico', array('class' => 'img-articulochico')); ?>
                    <div class="info-contenedor">
                        <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>

        <ul class="paginador">
        <?php if (previous_posts_link('&laquo; Anterior') || next_posts_link('Siguiente &raquo;') ) { ?>
        
            <?php previous_posts_link('&laquo; Anterior'); ?>
            <?php next_posts_link('Siguiente &raquo;'); ?>
        
        <?php 
        } else { ?>
                
        <?php  } ?>

        </ul>

    </div>


<?php get_footer(); ?>