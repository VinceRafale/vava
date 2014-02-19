<?php
/**
 * Template name: Home
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

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
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'neyla' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div>
			<!-- .entry-content -->
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'neyla' ), '<span class="edit-link">', '</span>' ); ?>
				<figure id="home-main-btn"> <a href="#" id="try-it-btn" title="Try now for free"></a> </figure>
			</footer>
			<!-- .entry-meta --> 
		</article>
		
		<!-- #post-<?php the_ID(); ?> -->
		
		<figure title="main-img" id="main-img"></figure>
	</section>
	<!--top-content--> 
</div>
<!--top-content-part-->

<div id="middle-bar-part">
	<section id="middle-part" class="widthfix">
		<section id="middle-part-left">
			<figure id="middle-part-left-img"  title="Middle Part Left Image Title"></figure>
			<h3> <a href="#" title="Advertising">advertising</a> </h3>
		</section>
		<section id="middle-part-right">
			<figure id="middle-part-right-img" title="Middle Part Right Image Title"></figure>
			<h3> <a href="#" title="Advertising">customers</a> </h3>
		</section>
	</section>
	<!--middle-part--> 
</div>
<!--middle-bar-part-->

<div id="middle-bottom-part">
	<section id="middle-bottom" class="widthfix">
		<section id="middle-bottom-left">
			<h3>General Features</h3>
			<ul>
				<li>Turn on/off the slider and chose your slider (or a static image)</li>
				<li>Turn on/off the content of the page</li>
				<li>Turn on/off the portfolio projects </li>
				<li>Turn on/off the services box</li>
				<li>Turn on/off the latest images from the gallery</li>
			</ul>
		</section>
		<!--middle-bottom-left-->
		
		<section id="middle-bottom-right">
			<?php $pid = 18; $page = get_page($pid); ?>
			<h3><?php echo $page->post_title ?></h3>
			<p> <?php echo $page->post_content ?></p>
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
			<header class="bottom-heading">Latest News</header> 
			<hr />
	<?php
$args = array( 'numberposts' => 1, 'category' => 5 );
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
				<header class="bottom-heading">Recent Articles</header>
				<hr />
				
									<?php
$args = array( 'numberposts' => 1, 'category' => 6 );
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
	</section>
	<!--bottom--> 
	
</div>
<!--bottom-part-->