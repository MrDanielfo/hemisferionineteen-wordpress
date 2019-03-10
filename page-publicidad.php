<?php 
/*
Template Name: Nosotros
*/

get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>

    <div class="contenedor single">

        <div class="contenedor-imagentitulo">
            <?php the_post_thumbnail('articulo-single', array('class' => 'img-single')); ?>
            <div class="info-contenedor articulo-single">
                <h2 class="titulo-front t-single"><?php the_title(); ?></h2>
            </div>
        </div>

        <div class="contenedor-cuerposingle">
            <?php the_content(); ?>
        </div>

    </div>

    <?php endwhile; ?>

<?php get_footer(); ?>