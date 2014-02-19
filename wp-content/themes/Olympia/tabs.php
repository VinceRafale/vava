<div class="clear"></div>
<div id="newtabs" class="tabox ">
    <ul class="tabsnav">
        <li class="fea"><a href="#popular"> Popular </a></li>
		<li class="rec"><a href="#recent">  Recent  </a></li>
		<li class="pop"><a href="#tgs">     Featured    </a></li>
    </ul>
            
<div id="popular" class="tabsdiv">
<?php 
	$my_query = new WP_Query('orderby=comment_count&showposts=5');
	while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="fblock">

<?php
if ( has_post_thumbnail() ) { ?>
	<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=70&amp;zc=1" alt=""/>
<?php } else { ?>
	<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
<?php } ?>

<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo substr($post->post_title,0,20); ?></a></h3>
<?php wpe_excerpt('wpe_excerptlength_blurb', ''); ?>
<div class="clear"></div>
</div>
<?php endwhile; ?>
</div>
			
<div id="recent" class="tabsdiv">

<?php 
	$my_query = new WP_Query('showposts=5');
	while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="fblock">

<?php
if ( has_post_thumbnail() ) { ?>
	<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=70&amp;zc=1" alt=""/>
<?php } else { ?>
	<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
<?php } ?>

<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo substr($post->post_title,0,20); ?></a></h3>
<?php wpe_excerpt('wpe_excerptlength_blurb', ''); ?>
<div class="clear"></div>
</div>
<?php endwhile; ?>

</div>

<div id="tgs" class="tabsdiv">
	<?php 
		$gldcat = get_option('olymp_featcat'); 
		$my_query = new WP_Query('category_name='.$gldcat.'&showposts=5');
		while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
	?>
<div class="fblock">

<?php
if ( has_post_thumbnail() ) { ?>
	<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=70&amp;zc=1" alt=""/>
<?php } else { ?>
	<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
<?php } ?>

<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo substr($post->post_title,0,20); ?></a></h3>
<?php wpe_excerpt('wpe_excerptlength_blurb', ''); ?>
<div class="clear"></div>
</div>
<?php endwhile; ?>
</div>
		
</div>