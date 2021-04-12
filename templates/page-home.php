<?php

/**
 * Template Name: Pagina Inicio
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
        <section id="post-<?php the_ID(); ?>" class="page-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
            <?php the_content(); ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>