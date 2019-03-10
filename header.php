<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(''); ?></title>
    <?php wp_head();  ?>
</head>
<body>
    <header class="encabezado" id="encabezado">
        <div class="logo">
            <h1 class="logo-sitio"><a href="<?php echo esc_url(home_url('/')); ?>" class="enlace-logo">Hemisferio Noticias</a></h1>
        </div>

        <div class="icono-menu">
            <i class="fas fa-bars" id="iconos" aria-hidden="true"></i>
        </div>

        <?php
            $args = array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'categorias'
            );

            wp_nav_menu($args);
        ?>
   
   
        <?php
            $args = array(
                'theme_location' => 'social-menu',
                'container' => 'nav',
                'container_class' => 'redes-sociales',
                'link_before' => '<span class="sr-text">',
                'link_after' => '</span>'
            );

            wp_nav_menu($args);
        ?>

        
    </header>