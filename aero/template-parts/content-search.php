<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aero
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<header class="entry-header row">
		<?php the_title( sprintf( '<h2 class="entry-title col-md-12"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta col-md-12">
			<?php aero_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary row">
		<div class="col-md-12">
			<?php the_excerpt(); ?>
		</div>
	</div><!-- .entry-summary -->
	
	<div class="breaker row">
		<div class="col-md-12"><hr/></div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
