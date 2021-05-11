<?php

/**
 * Template Name: Pagina Live
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
                    <div class="main-show-slider-title col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <h2>Featured <br />Live Shows</h2>
                    </div>
                    <div class="main-show-slider-content  col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                        <div class="main-shows-slider-carousel swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php $items = get_all_first_programs(); ?>
                                <?php foreach ($items as $item) { ?>
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
                </div>
            </div>
        </section>
        <section class="main-show-container col-12">
            <div class="container">
                <div class="row">
                    <div class="video-container col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                        <?php if (isset($_GET['video'])) { ?>
                        <?php $video = get_current_video($_GET['video']); ?>
                        <?php echo $video->player; ?>
                        <?php } else { ?>
                        <?php $video = get_current_video(0); ?>
                        <?php echo $video->player; ?>
                        <?php } ?>
                    </div>
                    <div class="sidebar-container col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="block1-latest-news-wrapper">
                            <div class="title-container">
                                <h3><?php _e('Últimas noticias', 'actualidad'); ?></h3>
                            </div>
                            <?php if (!isset($array_posted)) {
    $array_posted = array();
} ?>
                            <?php $args = array('post_type' => 'post', 'posts_per_page' => 2, 'post__not_in' => $array_posted, 'order' => 'DESC', 'orderby' => 'date'); ?>
                            <?php $array_posts = new WP_Query($args); ?>
                            <?php if ($array_posts->have_posts()) : ?>
                            <?php while ($array_posts->have_posts()) : $array_posts->the_post(); ?>
                            <div class="latest-news-media-item">
                                <div class="latest-news-media-item-wrapper">
                                    <div class="latest-news-media-item-content">
                                        <?php $categories = get_the_category(); ?>
                                        <?php $i = 1; ?>

                                        <?php foreach ($categories as $item) { ?>
                                        <a href="<?php echo get_category_link($item); ?>" title="<?php _e('View more from this category', 'actualidad'); ?>" class="category"><?php echo $item->name; ?></a>
                                        <?php if ($i == 1) {
    break;
} ?>
                                        <?php $i++;
                                                } ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php _e('View post', 'actualidad'); ?>">
                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                        <div class="meta-container">
                                            <span><?php echo get_the_author(); ?></span> - <span><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php array_push($array_posted, get_the_ID()); ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main>
<?php get_footer(); ?>