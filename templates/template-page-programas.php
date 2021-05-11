<?php

/**
 * Template Name: Pagina Programas
 *
 * @package actualidad
 * @subpackage actualidad-mk01-theme
 * @since Mk. 1.0
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section class="main-shows-slider-container col-12">
            <div class="container">
                <div class="row align-items-center">
                    <?php $items = get_all_programs(); ?>
                    <?php $titles = array(
                        'Roberto y Ricardo', 'Cada Tarde', 'A Esta Hora', 'Panorama Nacional', 'Todo Noticias', 'Al Final de la Tarde', 'A Primera Hora'
                    )?>
                    <?php $i = 0;?>
                    <?php foreach ($items as $program) { ?>
                    <div class="programs-show-slider-content  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2><?php echo $titles[$i]; ?></h2>
                        <div class="programs-shows-slider-carousel swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php foreach ($program as $item) { ?>
                                <div class="swiper-slide">
                                    <div class="main-bar-slider-item">
                                        <div class="main-bar-slider-item-wrapper">
                                            <div class="main-bar-slider-item-image">
                                                <img src="<?php echo $item->image; ?>" alt="<?php echo $item->name; ?>" class="img-fluid" />
                                            </div>
                                            <div class="main-bar-slider-item-content">
                                                <h5><?php echo $item->name; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; } ?>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>