<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aero
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header row">
		<?php the_title( '<h1 class="entry-title col-md-12">', '</h1>' ); ?>
        <div class="icon-border">
            <div class="off-center"></div>
            <i class="fa fa-plane centered_icon" aria-hidden="true"></i>
            <div class="off-center"></div>
        </div>
	</header><!-- .entry-header -->

	<div class="entry-content row">
        <div class="col-md-12">
		<?php
			the_content(); ?>
        </div>
        <?php
			wp_link_pages( array(
				'before' => '<div class="page-links col-md-12">' . esc_html__( 'Pages:', 'aero' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer row">
            <div class="col-md-12">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'aero' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
            </div>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
