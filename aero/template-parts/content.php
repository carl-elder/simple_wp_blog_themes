<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aero
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <?php
    if( ! is_home() ): ?>
	<header class="entry-header col-md-12">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif; ?>

	</header><!-- .entry-header -->

        <div class="entry-content col-md-12"><?php
        the_content( sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aero' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aero' ),
            'after'  => '</div>',
        ) ); ?>
        </div><!-- .entry-content -->
        <footer class="entry-footer col-md-12">
		
            <?php aero_entry_footer(); ?>
        </footer><!-- .entry-footer --><?php
    else: ?>
        <div class="list-thumb col-md-5"><?php the_post_thumbnail(); ?></div>
        <div class="entry content col-md-7">
            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            the_excerpt(); ?>

        </div>
        <div class="icon-border">
            <div class="off-center"></div>
            <i class="fa fa-plane centered_icon" aria-hidden="true"></i>
            <div class="off-center"></div>
        </div><?php
    endif;
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
