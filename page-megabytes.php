<?php get_header(); ?>

    <div class="contenedor">

        <?php get_sidebar(); ?>

        <div class="contenedor-cajaschicas">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1 ?>
            <?php
                $args = array(
                    'post_type' => 'noticias',
                    'cat' => 21,
                    'posts_per_page' => 10,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => $paged
                );
            ?>

            <?php $entradas = new WP_Query($args); ?>
            <?php while ($entradas->have_posts()) : $entradas->the_post(); ?>

                <div class="cajas caja-chica">
                    <?php the_post_thumbnail('articulo-chico', array('class' => 'img-articulochico')); ?>
                    <div class="info-contenedor">
                        <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>

        <div class="contenedor-cajasespeciales">

            <?php
            $args = array(
                'post_type' => 'noticias',
                'cat' => '21, 24, 54, 55',
                'posts_per_page' => 10,
                'orderby' => 'date',
                'order' => 'desc'
            );
            ?>

            <?php $recomendadas = new WP_Query($args); ?>

            <div class="cajas caja-especial seccion-lateral">
                <h2 class="lateral">Recomendadas</h2>

                <?php while ($recomendadas->have_posts()) : $recomendadas->the_post(); ?>
                
                <div class="noticia-thumbnail">
                    <?php the_post_thumbnail('laterales-widget', array('class' => 'img-thumbnail')); ?>
                    <h3 class="titulo-sidebar"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>

                <?php endwhile; wp_reset_postdata(); ?>
                
            </div>

        </div>
        
        <ul class="paginador">
        <?php if(previous_posts_link('&laquo; Anterior', $entradas->max_num_pages) || next_posts_link('Siguiente &raquo;', $entradas->max_num_pages) ) {   ?>
        
            <?php previous_posts_link('&laquo; Anterior', $entradas->max_num_pages); ?>
            <?php next_posts_link('Siguiente &raquo;', $entradas->max_num_pages); ?>
        
        <?php } else { ?>
            
        <?php } ?>

        </ul>
        <?php wp_reset_postdata(); ?>
        

        

        

    </div>


<?php get_footer();  ?>