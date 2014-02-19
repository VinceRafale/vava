
<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since healthy_clean 1.0
 */
?>
<div class="footer_left"></div>
<div id="social-links">

<?php if (dynamic_sidebar( 'footer-widget-social' )):

else : ?>

<div class="socialmedia-buttons smw_left">
<a target="_blank" rel="nofollow" href="<?php echo get_option('wp_facebook_url', true);?>"><img class="fade" style="opacity: 0.8;" title="Follow Us on Facebook" alt="Follow Us on Facebook" src="<?php bloginfo('template_directory');?>/images/facebook_icon.1.png"></a>

<a target="_blank" rel="nofollow" href="<?php echo get_option('wp_twitter_url', true);?>"><img class="fade" style="opacity: 0.8;" title="Follow Us on Twitter" alt="Follow Us on Twitter" src="<?php bloginfo('template_directory');?>/images/twitter.png"></a>

<a target="_blank" rel="nofollow" href="<?php echo get_option('wp_linkedin_url', true);?>"><img class="fade" style="opacity: 0.8;" title="Follow Us on LinkedIn" alt="Follow Us on LinkedIn" src="<?php bloginfo('template_directory');?>/images/Linked-In.png"></a>

<a target="_blank" rel="nofollow" href="<?php echo get_option('wp_youtube_url', true);?>"><img class="fade" style="opacity: 0.8;" title="Follow Us on YouTube" alt="Follow Us on YouTube" src="<?php bloginfo('template_directory');?>/images/youtube.png"></a></div>

 <?php endif; ?>

</div>
<div class="footer_right"></div>
<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	/*if (   ! is_active_sidebar( 'footer-widget'  )
	    && ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area'  )
		&& ! is_active_sidebar( 'fourth-footer-widget-area' )
	)
		return;*/
	// If we get this far, we have widgets. Let do this.
?>

<div id="footer-widget-area" role="complementary">
			



	<div id="first" class="widget-area">
	
	<?php if ( dynamic_sidebar( 'first-footer-widget-area' ) ) :
	
	else : ?>

<h3 class="widget-title">TWITTER FEED<!--<div class="right"><a href="#"><i>Share</i></a></div>--></h3>
<ul id="twitter_update_list"><li></li>
<a href="http://twitter.com/chiactivate" id="twitter-link" style="display:block;text-align:right;">follow me on Twitter</a>
</ul>

<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/chiactivate.json?callback=twitterCallback2&count=3"></script>
	
<?php endif; ?>				
	</div>
<!-- #first .widget-area -->
	
	 <div id="first" class="widget-area">
<?php if ( dynamic_sidebar( 'second-footer-widget-area' ) ) :
	
	else :
?>

	<h3 class="widget-title">FACEBOOK FEED<!--<div class="right"><a href="#"><i>Share</i></a></div>--></h3>
	<div class="fb-activity" style="background:#FFF;" data-site="chiactivate.com" data-width="265" data-height="300" data-header="false" data-recommendations="false"></div>
					
<?php endif; ?>
	</div>
	
	<div id="third" class="widget-area">					
	<?php if ( dynamic_sidebar( 'third-footer-widget-area' ) ) :
	
	else :
	?>
	<h3 class="widget-title">YOUTUBE FEED<!--<div class="right"><a href="#"><i>Share</i></a></div>--></h3>
	<ul class="youtube">
	<li><a href="#">Silver Rays</a></li> <i>Django Django</i>
	<li><a href="#">Life's a Beach</a></li><i>Django Django</i>
	</ul>				
					
	</div><!-- #third .widget-area -->

<?php endif; ?>

	</div><!-- #footer-widget-area -->
