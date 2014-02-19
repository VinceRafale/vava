<?php get_header(); ?>
<div class="subhead">
	<div class="insubhead">
	
		
			<h1>
			<?php
				$mySearch =& new WP_Query("s=$s & showposts=-1");
				$num = $mySearch->post_count;
				echo $num.' search results for '; the_search_query();
			?> in <?php  get_num_queries(); ?> <?php timer_stop(1); ?> seconds.
			</h1>
		
	</div>

</div>

</div><!--end masthead-->

<div class="stripe"></div>

<div id="casing">

<div id="content" class="scover" >


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="sbox" id="post-<?php the_ID(); ?>">


<div class="stitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<p style="line-height:18px; paddding:5px 0px; color:#333;"><?php the_content_rss('more_link_text', TRUE, '', 30); ?></p>
<div class="clear"></div>
<span class="searchmeta"> Posted by <?php the_author(); ?> on <?php the_time('F - j - Y'); ?> | <?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></span>	

</div>

	<?php endwhile; ?>


<?php getpagenavi(); ?>
	<?php else : ?>



<div class="cover">
<div class="entry">

<b>Your search - <?php the_search_query();?> - did not match any entries.</b>

<p>Suggestions:</p>
<ul>
   <li>  Make sure all words are spelled correctly.</li>
   <li>  Try different keywords.</li>
   <li>  Try more general keywords.</li>
</ul>
			
</div>
</div>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

