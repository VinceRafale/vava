<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since healthy_clean 1.0
 */

get_header(); ?>

		<div id="container">
		<?php get_search_form(); ?>
		
          <?php wp_reset_query(); ?>
		
			<div id="content" role="main">


			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
			

			</div><!-- #content -->
		</div><!-- #container -->
	
<div id="right_sidebar">

<!-- #SECONDARY WIDGET AREA-->
<div class="right_sidebarcontent">
<?php if ( dynamic_sidebar( 'secondary-widget-area' )) :

else :?>
		<h3>Popular Posts</h3>
		<ul class="xoxo">
		<?php  query_posts('cat=1&showposts=3&orderby=date'); ?>
			
			<?php while (have_posts()) : the_post(); ?>		
			<li>
			<div id="imageside"><?php echo the_post_thumbnail(); ?></div>
			<div class="sidecontent">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php //the_title(); ?></a>
			<?php the_content(); ?>
			<span>Posted on:<?php the_time(' F j,'); ?> </span>
			<?php the_time('Y'); ?> 
			</div>
			</li>
			<?php endwhile; ?>	
		</ul>	
<?php endif; ?>
</div>

<!-- #BLOGROLL WIDGET AREA-->
<?php
	
	if ( is_active_sidebar( 'blogroll-widget-area' ) ) : ?>
<div class="right_sidebarcontent">
		
	<?php dynamic_sidebar( 'blogroll-widget-area' ); ?>
		
</div>
<?php endif; ?>



<!--#THIRD WIDGET AREA-->

	<div class="right_sidebarcontent">	
<?php if ( dynamic_sidebar( 'health-widget-area' )) :		
	
	else : ?>
	
	<h3>Health Tips</h3>
		<ul class="xoxo">
			
			<?php  query_posts('cat=5&showposts=5&orderby=date'); ?>
			
			<?php while (have_posts()) : the_post(); ?>
		
			<li>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
						
			<?php endwhile; ?>
		</ul>
		
	
	<?php endif; ?>
	
	</div>
</div>
<?php get_footer(); ?>
