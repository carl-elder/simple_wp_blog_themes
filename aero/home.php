<?php


get_header(); ?>

<div id="primary" class="content-area row">
    <main id="main" class="site-main col-md-8">
        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) : ?>
                <header class="row">
                    <h1 class="page-title screen-reader-text col-md-12"><?php single_post_title(); ?></h1>
                </header>

            <?php
            else : ?>
                <header class="row">
                    <div class="off-center"></div>
                    <h2 class="page-title screen-reader-text centered_header">Recent Posts</h2>
                    <div class="off-center"></div>
                </header><?php
            endif;

            /* Start the Loop */
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );

            endwhile;

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;

        ?>
    </main><!-- #main -->
    <?php get_sidebar(); ?>
</div><!-- #primary -->

<?php
get_footer();
