<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aero
 */

?>

            <div class="row content-footer">
                <div class="col-md-4 col-sm-12"><?php dynamic_sidebar('footer-1') ?></div>
                <div class="col-md-4 col-sm-12"><?php dynamic_sidebar('footer-2') ?></div>
                <div class="col-md-4 col-sm-12"><?php dynamic_sidebar('footer-3') ?></div>
            </div>
        </div><!--#site-content.container-->
	</div><!-- #content -->
	<footer id="colophon" class="site-footer container-fluid">
        <div class="container">
            <div class="site-info row">
                <div class="col-md-12"><a href="<?php echo get_home_url() ?>">Home</a></div>
            </div><!-- .site-info -->
            <div class="icon-border">
                <div class="off-center"></div>
                <i class="fa fa-plane centered_icon" aria-hidden="true"></i>
                <div class="off-center"></div>
            </div>
            <div class="site-info row">
                <div class="col-md-12">Copyright &copy; <?php echo date("Y") ?> Sporty's Academy.<br>All Rights Reserved</div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
