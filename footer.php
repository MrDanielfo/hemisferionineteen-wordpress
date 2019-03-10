    <footer class="footer">

        <?php
            $args = array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'categorias-footer'
            );

            wp_nav_menu($args);
        ?>

        <?php
            $args = array(
                'theme_location' => 'contacto-menu',
                'container' => 'nav',
                'container_class' => 'secundario-footer'
            );

            wp_nav_menu($args);
        ?>

        <div class="datos-sitio">
            <h4 class="datos-footer">Hemisferio Noticias. Puebla, México 2019</h4>
        </div>

    </footer>


    <?php wp_footer(); ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59dfccecb025605d"></script> 
</body>
</html>