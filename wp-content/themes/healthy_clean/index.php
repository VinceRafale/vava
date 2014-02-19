<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since healthy_clean 1.0
 
 */

get_header();?>

<?php if(get_option('wp_banner_act', true)==1) {?>

<ul id="mycarousel" class="jcarousel-skin-tango">
    <?php query_posts('posts_per_page=99&cat=4');
	while(have_posts()) : the_post(); 
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' =>'image', 'orderby' => 'menu_order', 'order' => 'DESC', 'numberposts' => 999 ) );
				
						//$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, array(113, 85), false );
	?>
	<li><a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a></li>
	
	<?php endwhile; ?>

  </ul>
  <?php }?>
 <div id="container">
 
<div id="content" role="main">

<div class="welcome_content">
<?php query_posts($query_string.'&cat=1'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
				<div class="post_content <?php if (has_post_thumbnail( $post->ID )== "") { echo "no_fimage"; } else { echo "yes_fimage"; } ?>">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?> </a></h3>
				<p><?php content('100'); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					<?php endwhile; ?>
<?php endif; ?>
</div>

				<?php query_posts($query_string.'&cat=5'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="indexpost_container ">
				<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
				<div class="post_content <?php if (has_post_thumbnail( $post->ID )== "") { echo "no_fimage"; } else { echo "yes_fimage"; } ?>">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?> </a></h3>
				<span> <?php the_time('F j, Y')?> by admin  <?php single_cat_title(); ?></span>
				<div class="post_cat"><?php the_category(', ') ?></div>
				<p><?php content('35'); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					</div>
					</div>
				<?php endwhile; ?>
				<?php posts_nav_link(); ?>
				<?php pagination();?>
				
				<?php endif; ?>
				
			</div>
			<div id="right_sidebar">
			<div class="right_sidebarcontent">
			<h3>Popular Posts</h3>
		<ul>
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
		</div>
<!-- #SECONDARY WIDGET AREA-->
<?php
	
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
<div class="right_sidebarcontent">
			
	<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			
</div>
<?php endif; ?>

<!-- #BLOGROLL WIDGET AREA-->
<?php
	
	if ( is_active_sidebar( 'blogroll-widget-area' ) ) : ?>
<div class="right_sidebarcontent">
		
	<?php dynamic_sidebar( 'blogroll-widget-area' ); ?>
		
</div>
<?php endif; ?>


<!--#HEALTH WIDGET AREA-->

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

			
</div>			
<?php get_sidebar(); ?>	

<!--FooterStart-->

<?php get_footer(); ?>

<!--FooterEnd-->

