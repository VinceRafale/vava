<div class="post-b <?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>post-w-img<?php } ?>" id="post-<?php the_ID(); ?>">
<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>						
	<div class="post-img">
<?php
	if (get_option('chimera_fancybox') != 'false') {
		if ( get_post_meta($post->ID,'post_image', true) ) {
			if ( get_post_meta($post->ID,'post_video', true) ) { ?>
		<a class="img mVideo" rel="gal_1" href="#video_modal_<?php the_ID(); ?>" title="<?php the_title(); ?>">
			<?php } else { ?>
		<a class="img mPreview" rel="gal_1" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>">
			<?php } ?>
		<?php } else { ?>
		<a class="img" href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">
		<?php } ?>
	<?php } else { ?>
		<a class="img" href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">
	<?php } ?>
			<?php 
						$imgurl = chimera_get_image_path($entry_img); 
						$image = aq_resize( $imgurl, 200, 200, true );				      
			?>			
			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>
		</a>
	</div>
	<?php } ?>
	<div class="post-content">
		<h2>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="date"><span>Posted on <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?>.</span></span>
		<?php if ( is_single() ) { the_content(); wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); } else { the_excerpt(); } ?>
	</div>
	<div class="clear"></div>
	<div class="post-footer">
		<span class="comm float-left"><?php comments_popup_link(__('No comments', 'chimera'), __('One comment', 'chimera'), __( '% Comments', 'chimera') ); ?></span>
		<span class="readmore float-right">
		<?php if ( !is_single() ) { ?>
			<a title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>" href="<?php the_permalink() ?>" class="button_small"><span><?php _e( 'Continue reading... ', 'chimera' ); ?></span></a>
		<?php } else { ?>
			<?php echo the_category(); ?>
		<?php } ?>
		</span>
		<div class="clear"></div>
	</div>
	<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>
	<div style="display:none">
		<div class="inline" id="video_modal_<?php the_ID(); ?>">
			<?php echo $entry_vid; ?>
		</div>
	</div>
	<?php } ?>
</div> <!-- .post -->























		







