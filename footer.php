<footer class="container-fluid p-0" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row no-gutters">
        <div class="the-footer col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row align-items-start">
                    <?php if (is_active_sidebar('sidebar_footer')) : ?>
                        <div class="footer-item footer-item-1 align-self-center col-xl col-lg col-md col-sm-12 col-12">
                            <ul id="sidebar-footer1" class="footer-sidebar">
                                <?php dynamic_sidebar('sidebar_footer'); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('sidebar_footer-2')) : ?>
                        <div class="footer-item footer-item-2 col-xl col-lg col-md col-sm-12 col-12">
                            <ul id="sidebar-footer2" class="footer-sidebar">
                                <?php dynamic_sidebar('sidebar_footer-2'); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('sidebar_footer-3')) : ?>
                        <div class="footer-item footer-item-3 col-xl col-lg col-md col-sm-12 col-12">
                            <ul id="sidebar-footer3" class="footer-sidebar">
                                <?php dynamic_sidebar('sidebar_footer-3'); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('sidebar_footer-4')) : ?>
                        <div class="footer-item footer-item-4 col-xl col-lg col-md col-sm-12 col-12">
                            <ul id="sidebar-footer4" class="footer-sidebar">
                                <?php dynamic_sidebar('sidebar_footer-4'); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('sidebar_footer-5')) : ?>
                        <div class="footer-item footer-item-5 align-self-center col-xl col-lg col-md col-sm-12 col-12">
                            <ul id="sidebar-footer5" class="footer-sidebar">
                                <?php dynamic_sidebar('sidebar_footer-5'); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="w-100"></div>
                </div>
            </div>
        </div>
        <div class="footer-copy col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row">
                    <div class="footer-menu col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'footer_menu',
                            'depth'           => 2,
                            'container'       => 'div'
                        ));
                        ?>
                    </div>
                    <div class="footer-copy-content col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5>&copy; <?php _e('2021 Actualidad Media Group - Todos los derechos reservados', 'actualidad'); ?></h5>
                        <h6><?php printf(__('DISEÑADO Y DESARROLLADO POR <a href="%s">STREANN MEDIA</a>', 'actualidad'), 'https://www.streann.com'); ?></h6>
                        <?php ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>