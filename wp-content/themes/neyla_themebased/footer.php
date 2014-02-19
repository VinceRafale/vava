<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Neyla
 * @since Neyla 1.0
 */
?>
</div>
<!-- #main -->
<?php $theme_options = neyla_get_theme_options(); ?>	
<div id="footer-part">
	<footer id="main-footer" role="contentinfo" class="widthfix">
		  	
	            <?php if ( ! dynamic_sidebar( 'footer-area-one' ) ) : ?>
				<aside class="first-footer-area">
                <h3>Footer Left Content</h3>
                <p>Fill this space by adding widgets!</p>
				<p>It could be custom menu or text widget</p>
				<p>Use your imagination :)</p></aside>
                <?php endif; ?>
               
              
                <?php if ( ! dynamic_sidebar( 'footer-area-two' ) ) : ?>
				<aside class="second-footer-area">
                <h3>Footer Center </h3>
                <p>Fill this space by adding widgets!</p>
				<p>It could be custom menu or text widget</p>
				<p>Use your imagination :)</p></aside>
                <?php endif; ?>
               
                
            
                <?php if ( ! dynamic_sidebar( 'footer-area-three' ) ) : ?>
				<aside class="third-footer-area">
                <h3> Footer Right Content </h3>
                <p>Fill this space by adding widgets!</p>
				<p>It could be custom menu or text widget</p>
				<p>Use your imagination :)</p></aside>
                <?php endif; ?>
		<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				
			?>
		<?php $theme_options = neyla_get_theme_options(); ?>	
		<div id="site-generator">
			<?php do_action( 'neyla_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'neyla' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'neyla' ); ?>" rel="generator">
			<?php // printf( __( 'Proudly powered by %s', 'neyla' ), ' ' ); ?>
			</a> </div>
	</footer>
	<!-- #main-footer -->
	<div class="clearfix"></div>
	<div id="bottom-footer-part">
		<footer id="bottom-footer" class="widthfix">
			
			<section id="social"> <a href="<?php echo  $theme_options['facebook_href'] ?>" id ="facebook" title="facebook profile"></a> <a href="<?php echo  $theme_options['twitter_href'] ?>" id="twitter"   title="twitter profile"></a> <a href="<?php echo  $theme_options['googleplus_href'] ?>" id="google"    title="google profile"></a> <a href="<?php echo  $theme_options['linkedin_href'] ?>" id="linkedin"    title="linkedin  profile"></a> </section>
			<section id="copyright">  |   | <span>&copy; <?php echo  $theme_options['copyright_text'] ?> </span> </section>
		</footer>
	</div>
</div>
<!--#footer-part"-->
</div>
<!-- #page -->

<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script> 
<script src="js/plugins.js"></script> 
<script src="js/script.js"></script>
</body></html>