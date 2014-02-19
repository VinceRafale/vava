<?php
/**
 * Template Name: Home
  * @package  Business & Finance Theme
 */
get_header(); ?>

<div id="top-content-part">
	<section id="top-content" class="widthfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			</header>
			<!-- .entry-header -->
			
			<div class="entry-content">
				<?php the_post(); the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'neyla' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div>
			<!-- .entry-content -->
			<footer class="entry-meta">
				<?php $theme_options = neyla_get_theme_options(); ?>			
				<figure id="home-main-btn"> <a href="#" id="try-it-btn"><?php echo  $theme_options['main_button_text'] ?></a> </figure>
			</footer>
			<!-- .entry-meta --> 
		</article>
		
		<!-- #post-<?php the_ID(); ?> -->
		
		<img src="<?php echo  esc_attr ($theme_options['main_img_src']) ?>" title="<?php echo  esc_attr ($theme_options['main_img_title']) ?>" alt="<?php echo  esc_attr ($theme_options['main_img_title']) ?>" id="main-img" />
	</section>
	<!--top-content--> 
</div>
<!--top-content-part-->

<div id="middle-bar-part">
	<section id="middle-part" class="widthfix">
		<section id="middle-part-left" class="clear">
			<img src="<?php echo  esc_attr ($theme_options['left_img_src']) ?>" id="middle-part-left-img"  title="<?php echo  esc_attr ($theme_options['left_img_title']) ?>" alt="<?php echo  esc_attr ($theme_options['left_img_alt']) ?>"/>
			<h3> <a href="#" title="Advertising">advertising</a> </h3>
		</section>
		<section id="middle-part-right">
			<img src="<?php echo  esc_attr ($theme_options['right_img_src']) ?>" id="middle-part-right-img" title="<?php echo  esc_attr ($theme_options['left_img_title']) ?>" alt="<?php echo  esc_attr ($theme_options['left_img_alt']) ?>"></figure>
			<h3> <a href="#" title="Advertising">customers</a> </h3>
		</section>
	</section>
	<!--middle-part--> 
</div>
<!--middle-bar-part-->

<div id="middle-bottom-part">
	<section id="middle-bottom" class="widthfix">
		<section id="middle-bottom-left">
			<?php echo ($theme_options['left_column']) ?>
		<!--middle-bottom-left-->
		</section>
		<section id="middle-bottom-right">
		<?php echo ($theme_options['right_column']) ?>
		</section>
		<!--middle-bottom-right--> 
	</section>
	<!--middle-bottom--> 
</div>
<!--middle-bottom-part-->

<div id="bottom-part">
	<section id="bottom" class="widthfix">
		<section id="bottom-left">
			<article>			
			<header class="bottom-heading">Latest from <?php echo $theme_options['left_category_id'] > 1 ?get_cat_name($theme_options['left_category_id']):"News";?></header> 
			<hr />
	<?php
$args = array( 'numberposts' => 1, 'category' => $theme_options['left_category_id'] );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
	<span class="article-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	<?php if ( 'post' == get_post_type() ) : ?>
			<span class="article-info">
				<?php neyla_posted_on(); ?>
			</span>
			<?php endif; ?>

	<?php the_excerpt(); ?>
		<footer><span class="read_more"><a title="read more link" href="<?php the_permalink(); ?>">read more... &rarr;</a></span></footer>
<?php endforeach; ?>				
	    </article>
		</section>
		<!--bottom-left-->
		<section id="bottom-right">
			<article>
				<header class="bottom-heading">Recent from <?php echo $theme_options['right_category_id'] > 1 ?get_cat_name($theme_options['right_category_id']):"Articles";?></header>
				<hr />
				
									<?php
$args = array( 'numberposts' => 1, 'category' => $theme_options['right_category_id'] );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
	<span class="article-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	<?php if ( 'post' == get_post_type() ) : ?>
			<span class="article-info">
				<?php neyla_posted_on(); ?>
			</span>
			<?php endif; ?>

	<?php the_excerpt(); ?>
		<footer><span class="read_more"><a title="read more link" href="<?php the_permalink(); ?>">read more... &rarr;</a></span></footer>
<?php endforeach; ?>				
			</article>
		</section>
		<!--bottom-right--> 
		<div class="clearfix"></div>
	</section>
	<!--bottom--> 
	
</div>
<!--bottom-part-->

<?php get_footer(); ?>