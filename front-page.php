<?php get_header(); ?>

    <div class="contenedor">

        <?php get_sidebar(); ?>

        <?php
            $args = array(
                'post_type' => 'noticias',
                'cat' => '54, 21, 24, 55',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            );
        ?>

        <?php $ultimas = new WP_Query($args); ?>

        <div class="contenedor-cajasgrandes">
            <?php while ($ultimas->have_posts()) : $ultimas->the_post(); ?>
                <div class="cajas caja-grande">
                    <!-- <img src="img/corvette-naranja.jpg" class="img-articulogrande" alt="corvette"> -->
                    <?php the_post_thumbnail('articulo-grande', array('class' => 'img-articulogrande')); ?>
                    <div class="info-contenedor">
                        <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="categoria-contenedor">
                        <?php the_category(); ?>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
            $args = array(
                'post_type' => 'noticias',
                'cat' => '21, 24, 54, 55',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => 3
            );
        ?>
        <?php $segundas = new WP_Query($args); ?>

        <div class="contenedor-cajasmedianas">
            <?php while ($segundas->have_posts()) : $segundas->the_post(); ?>
                <div class="cajas caja-mediana">
                    <?php the_post_thumbnail('articulo-mediano', array('class' => 'img-articulomediano')); ?>
                    <div class="info-contenedor">
                        <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="categoria-contenedor">
                        <?php the_category(); ?>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
            $args = array(
                'post_type' => 'noticias',
                'cat' => '21, 24, 54, 55',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => 7
            );
        ?>
        <?php $terceras = new WP_Query($args); ?>
        
            <div class="contenedor-cajaschicas">
                <?php while ($terceras->have_posts()) : $terceras->the_post(); ?>
                <div class="cajas caja-chica">
                    <?php the_post_thumbnail('articulo-chico', array('class' => 'img-articulochico')); ?>
                    <div class="info-contenedor">
                        <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="categoria-contenedor">
                        <?php the_category(); ?>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

        <?php
            $args = array(
                'post_type' => 'noticias',
                'cat' => '21, 24, 54, 55',
                'posts_per_page' => 2,
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => 15
            );
        ?>

        <?php $especial = new WP_Query($args); ?>

        <div class="contenedor-cajasespeciales">
            <?php while ($especial->have_posts()) : $especial->the_post(); ?>
            <div class="cajas caja-especial">
                <?php the_post_thumbnail('articulo-especial', array('class' => 'img-articuloespecial')); ?>
                <div class="info-contenedor">
                    <h2 class="titulo-front"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="categoria-contenedor">
                    <?php the_category(); ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>



<?php get_footer(); ?>