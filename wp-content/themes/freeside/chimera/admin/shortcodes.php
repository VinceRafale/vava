<?php

	/* ChimeraThemes custom shortcodes */

// Columns setup


function chimera_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'chimera_one_third');


function chimera_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'chimera_one_third_last');


function chimera_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'chimera_two_third');


function chimera_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'chimera_two_third_last');


function chimera_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'chimera_one_half');


function chimera_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'chimera_one_half_last');


function chimera_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'chimera_one_fourth');


function chimera_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'chimera_one_fourth_last');


function chimera_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'chimera_three_fourth');


function chimera_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'chimera_three_fourth_last');


function chimera_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'chimera_one_fifth');


function chimera_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'chimera_one_fifth_last');


function chimera_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'chimera_two_fifth');


function chimera_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'chimera_two_fifth_last');


function chimera_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'chimera_three_fifth');


function chimera_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fifth_last', 'chimera_three_fifth_last');


function chimera_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'chimera_four_fifth');


function chimera_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('four_fifth_last', 'chimera_four_fifth_last');







// Divier

function chimera_divider( $atts, $content = null ) {
   return '<div class="divider"></div>';
}
add_shortcode('divider', 'chimera_divider');

function chimera_break( $atts, $content = null ) {
   return '<div class="clear break">' . do_shortcode($content) . '</div>';
}
add_shortcode('break', 'chimera_break');

function chimera_clear( $atts, $content = null ) {
   return '<div class="clear"></div>';
}
add_shortcode('clear', 'chimera_clear');

function chimera_descr( $atts, $content = null ) {
   return '<p class="description clear">' . do_shortcode($content) . '</p>';
}
add_shortcode('description', 'chimera_descr');

// Query portfolio posts

function ImageGallery($atts, $content = null) {
	extract(shortcode_atts(array(
		"query" => '',
		"category" => '',
		"style" => '',
        "posts_limit" => ''
	), $atts));
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	if(!empty($category)){
		$query .= '&category_name='.$category;
	}
    if(!empty($posts_limit)){
        $query .= '&posts_per_page='.$posts_limit;
    }
	if(!empty($query)){
		$query .= $query;
	}
	$wp_query->query($query);
	ob_start();

	if ($style == 'four_column') { ?>
<div class="four_column">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true); $len = 80;
		$newExcerpt = substr($post->post_excerpt, 0, $len);
		if(strlen($newExcerpt) < strlen($post->post_excerpt)) {
		    $newExcerpt = $newExcerpt."...";
		} ?>

	<div class="one_fourth <?php $counter++; if ($counter == 4) { echo ' last'; $counter = 0; } ?>">
		<div class="gallery_item" id="port-<?php the_ID(); ?>">
				<?php

					if (get_option('chimera_fancybox') != 'false') { ?>

						<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
							
							<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>
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

								</a>

				<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
					<?php 
						$imgurl = chimera_get_image_path($entry_img); 
						$image = aq_resize( $imgurl, 224, 134, true );				      
				?> 					
		
					<div class="img_cont"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></div>

				<?php } else { ?>

					<div class="img_cont"><img width="224" height="134" src="<?php echo bloginfo('template_url'); ?>/images/no_preview.jpg" alt="<?php _e('No Preview Available', 'chimera'); ?>" /></div>

				<?php } ?>
				<div class="cover boxcaption">

					<?php

						if (get_option('chimera_fancybox') != 'false') { ?>

							<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

								<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

									<a class="mVideo" rel="gal_2" href="#video_modal_<?php the_ID(); ?>" title="<?php the_title(); ?>">

								<?php } else { ?>

									<a class="mPreview" rel="gal_2" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>">

								<?php } ?>

							<?php } else { ?>

									<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

							<?php } ?>

						<?php } else { ?>

									<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

						<?php } ?>
										<?php the_title(); ?>
									</a>

					<?php echo $newExcerpt; ?>
				</div>
<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>
<div style="display:none">
	<div class="inline" id="video_modal_<?php the_ID(); ?>">
		<?php echo $entry_vid; ?>
	</div>
</div>
<?php } ?>
		</div> <!-- .post -->
	</div>

		<?php endwhile; ?>
</div>
	<?php } elseif ( $style == 'three_column' ) { ?>

		<div class="three_column">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true); $len = 80;
				$newExcerpt = substr($post->post_excerpt, 0, $len);
				if(strlen($newExcerpt) < strlen($post->post_excerpt)) {
				    $newExcerpt = $newExcerpt."...";
				} ?>

			<div class="one_third <?php $counter++; if ($counter == 3) { echo ' last'; $counter = 0; } ?>">
				<div class="gallery_item" id="port-<?php the_ID(); ?>">
					<?php

						if (get_option('chimera_fancybox') != 'false') { ?>

							<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

								<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

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

									</a>
						<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
						      <?php 
									$imgurl = chimera_get_image_path($entry_img); 
									$image = aq_resize( $imgurl, 306, 245, true );				      
							  ?> 

							<div class="img_cont"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></div>

						<?php } else { ?>

							<div class="img_cont"><img width="306" height="245" src="<?php echo bloginfo('template_url'); ?>/images/no_preview.jpg" alt="<?php _e('No Preview Available', 'chimera'); ?>" /></div>

						<?php } ?>
						<div class="cover boxcaption">
							<?php

								if (get_option('chimera_fancybox') != 'false') { ?>

									<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

										<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

											<a class="mVideo" rel="gal_2" href="#video_modal_<?php the_ID(); ?>" title="<?php the_title(); ?>">

										<?php } else { ?>

											<a class="mPreview" rel="gal_2" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>">

										<?php } ?>

									<?php } else { ?>

											<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

									<?php } ?>

								<?php } else { ?>

											<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

								<?php } ?>
												<?php the_title(); ?>
											</a>

							<?php echo $newExcerpt; ?>
						</div>
						<div style="display:none">
							<div class="inline" id="video_modal_<?php the_ID(); ?>">
								<?php echo $entry_vid; ?>
							</div>
						</div>
				</div> <!-- .post -->
			</div>

				<?php endwhile; ?>
		</div>
	
	<?php } elseif ( $style == 'one_column' ) { ?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true); ?>
	<div class="one_col_portfolio">
		<div class="gallery_item" id="port-<?php the_ID(); ?>">
			<?php

				if (get_option('chimera_fancybox') != 'false') { ?>

					<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

						<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

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

							</a>
				<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
						<?php 
							$imgurl = chimera_get_image_path($entry_img); 
							$image = aq_resize( $imgurl, 250, 250, true );				      
						?> 

					<div class="img_cont"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></div>

				<?php } else { ?>

					<div class="img_cont"><img width="250" height="250" src="<?php echo bloginfo('template_url'); ?>/images/no_preview.jpg" alt="<?php _e('No Preview Available', 'chimera'); ?>" /></div>

				<?php } ?>
				<div class="cover boxcaption">
					<?php

						if (get_option('chimera_fancybox') != 'false') { ?>

							<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

								<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

									<a class="mVideo" rel="gal_2" href="#video_modal_<?php the_ID(); ?>" title="<?php the_title(); ?>">

								<?php } else { ?>

									<a class="mPreview" rel="gal_2" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>">

								<?php } ?>

							<?php } else { ?>

									<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

							<?php } ?>

						<?php } else { ?>

									<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

						<?php } ?>
										<?php the_title(); ?>
									</a>
					<?php the_content(); ?>
				</div>
<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>
<div style="display:none">
	<div class="inline" id="video_modal_<?php the_ID(); ?>">
		<?php echo $entry_vid; ?>
	</div>
</div>
<?php } ?>
		</div> <!-- .post -->
		<div class="clear"></div>
	</div>
	<?php endwhile; ?>

	<?php } else { ?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true); ?>
				<div class="post-b <?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>post-w-img<?php } ?>" id="post-<?php the_ID(); ?>">
							<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
						<div class="post-img">

									<?php if (get_option('chimera_fancybox') != 'false') { ?>

							<a class="img mPreview" rel="feat_gal" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>"> 

									<?php } else { ?>

							<a class="img" href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>"> 

									<?php } ?>
									<?php 
										$imgurl = chimera_get_image_path($entry_img); 
										$image = aq_resize( $imgurl, 200, 200, true );				      
								   ?> 
								<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
							</a>
						</div>
							<?php } ?>
					<div class="post-content">
						<h2>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<span class="date"><span><?php _e('Posted on ', 'chimera'); ?><?php the_time('F jS, Y') ?> in <?php the_category(', ') ?>.</span></span>
						<?php the_excerpt(); ?>
					</div>
					<div class="clear"></div>
					<div class="post-footer">
						<span class="comm float-left"><?php comments_popup_link(__('No comments', 'chimera'), __('One comment', 'chimera'), 	__( '% Comments', 'chimera') ); ?></span>
						<a title="<?php _e( 'Permanent Link to ', 'chimera' ); ?><?php the_title(); ?>" href="<?php the_permalink() ?>" class="read-more float-right"><?php _e( 'Continue reading... ', 'chimera' ); ?></a>
					<div class="clear"></div>			
					</div>
			</div> <!-- .post -->
		<?php endwhile; ?>	
	<?php } ?>
	<div class="clear"></div>
	<?php $wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode("gallery", "ImageGallery");

// Query portfolio posts

function ImagePortfolioBig($atts, $content = null) {
	extract(shortcode_atts(array(
		"query" => '',
		"category" => '',
		"style" => '',
		"posts_limit" => '',
	), $atts));
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	
	if(!empty($category)){
		$query .= '&category_name='.$category;
	}
    if(!empty($posts_limit)){
        $query .= '&posts_per_page='.$posts_limit;
    }
	if(!empty($query)){
		$query .= $query;
	}
	$wp_query->query($query);
	ob_start();
	?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true); ?>

				<div class="portfolio_item <?php $counter++; if ($counter == 3) { echo 'portfolio_item_last'; $counter = 0; } ?><?php echo $style; ?>" id="port-<?php the_ID(); ?>">
						<div class="port_bg"></div>
						<?php

							if (get_option('chimera_fancybox') != 'false') { ?>

								<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

									<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

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

										</a>
						<div class="img_cont">
						<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
									<?php 
										$imgurl = chimera_get_image_path($entry_img); 
										$image = aq_resize( $imgurl, 266, 234, true );				      
								    ?> 

							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
							
						<?php } else { ?>
							
							<img width="266" height="134" src="<?php echo bloginfo('template_url'); ?>/images/no_preview.jpg" alt="<?php _e( 'No Preview Available', 'chimera' ); ?>" />
							
						<?php } ?>
						</div>
						<div class="cover boxcaption">
							<?php

								if (get_option('chimera_fancybox') != 'false') { ?>

									<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

										<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

											<a class="mVideo" rel="gal_2" href="#video_modal_<?php the_ID(); ?>" title="<?php the_title(); ?>">

										<?php } else { ?>

											<a class="mPreview" rel="gal_2" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>">

										<?php } ?>

									<?php } else { ?>

											<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

									<?php } ?>

								<?php } else { ?>

											<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

								<?php } ?>
												<?php the_title(); ?>
											</a>
						</div>
						<div style="display:none">
							<div class="inline" id="video_modal_<?php the_ID(); ?>">
								<?php echo $entry_vid; ?>
							</div>
						</div>
				</div> <!-- .post -->

	<?php endwhile; ?>
	<div class="clear"></div>
	<?php $wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode("portfolio", "ImagePortfolioBig");

// Query portfolio posts alternate

function ImagePortfolioSmall($atts, $content = null) {
	extract(shortcode_atts(array(
		"query" => '',
		"category" => '',
		"style" => '',
		"posts_limit" => '',
	), $atts));
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	
	if(!empty($category)){
		$query .= '&category_name='.$category;
	}
    if(!empty($posts_limit)){
        $query .= '&posts_per_page='.$posts_limit;
    }
	if(!empty($query)){
		$query .= $query;
	}
	$wp_query->query($query);
	ob_start();
	?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true); ?>

				<div class="item_alt <?php $counter++; if ($counter == 4) { echo 'item_last'; $counter = 0; } ?><?php echo $style; ?>" id="port-<?php the_ID(); ?>">
						<div class="port_bg"></div>
						<?php

							if (get_option('chimera_fancybox') != 'false') { ?>

								<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

									<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

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

										</a>
						<div class="img_cont">
						<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>
									<?php 
											$imgurl = chimera_get_image_path($entry_img); 
											$image = aq_resize( $imgurl, 165, 80, true );				      
									?> 

							 <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
							
						<?php } else { ?>
							
							<img width="165" height="80" src="<?php echo bloginfo('template_url'); ?>/images/no_preview.jpg" alt="<?php _e( 'No Preview Available', 'chimera' ); ?>" />
							
						<?php } ?>
						</div>
						<div class="cover boxcaption">
							<?php

								if (get_option('chimera_fancybox') != 'false') { ?>

									<?php if ( get_post_meta($post->ID,'post_image', true) ) { ?>

										<?php if ( get_post_meta($post->ID,'post_video', true) ) { ?>

											<a class="mVideo" rel="gal_2" href="#video_modal_<?php the_ID(); ?>" title="<?php the_title(); ?>">

										<?php } else { ?>

											<a class="mPreview" rel="gal_2" href="<?php echo $entry_img; ?>" title="<?php the_title(); ?>">

										<?php } ?>

									<?php } else { ?>

											<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

									<?php } ?>

								<?php } else { ?>

											<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php the_title(); ?>">

								<?php } ?>
												<?php the_title(); ?>
											</a>
						</div>
						<div style="display:none">
							<div class="inline" id="video_modal_<?php the_ID(); ?>">
								<?php echo $entry_vid; ?>
							</div>
						</div>
				</div> <!-- .post -->

	<?php endwhile; ?>
	<div class="clear"></div>
	<?php $wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode("portfolio_alt", "ImagePortfolioSmall");

//Content Boxes

function chimera_content_box( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'style' => '',
      'title' => '',
      'title_size' => '',
      ), $atts ) );
      
    if(empty($title_size)){
		$title_size = 'h5';
	}
	$title_output="";
    if(!empty($title)){
		$title_output = '<h5>'. $title .'</h5>';
	}
      
      return '<div class="content_box '. $style .'"><div class="cont">'. $title_output .'' . do_shortcode($content) . '</div></div>';
}

add_shortcode("content_box", "chimera_content_box");

//Content Boxes

function chimera_feature_box( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'align' => '',
      'title' => '',
      ), $atts ) );
      
    if(empty($align)){
		$alig = 'alignleft';
	} else {
		$alig = 'align' . $align;
	}
	
      return '<div class="feature_box '. $alig .'"><div class="cont"><strong>'. $title .'</strong>' . do_shortcode($content) . '<div class="clear"></div></div></div>';
}

add_shortcode("feature_box", "chimera_feature_box");

//Testimonials

function chimera_testimonial( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'gravatar' => '',
      'name' => '',
      'company' => '',
      ), $atts ) );

      return '<div class="testimonial_box"><i></i>'. get_avatar( $gravatar, $size = '62', $default = '' ) .'<div class="cont">' . do_shortcode($content) . '</div><div class="nfo"><strong>'. $name .'</strong>'. $company .'</div><div class="clear"></div></div>';
}

add_shortcode("testimonial", "chimera_testimonial");

//Content Boxes

function chimera_sp_title( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => '',
      ), $atts ) );
      
      return '<h1 class="special_title">' . $title . '</h1><strong class="special_title_descr">' . do_shortcode($content) . '</strong>';
}

add_shortcode("special_title", "chimera_sp_title");

//Info boxes

function chimera_response_msg( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'style' => '',
      'title' => '',
      'title_size' => '',
      ), $atts ) );
      
    if(empty($title_size)){
		$title_size = 'h5';
	}

    if(!empty($title)){
		$title_output = '<h5>'. $title .'</h5>';
	}
      
      return '<div class="response-msg '. $style .'"><div class="cont">'. $title_output .'' . do_shortcode($content) . '</div></div>';
}

add_shortcode("response_msg", "chimera_response_msg");

//Portlet

function chimera_portlet( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => '',
      ), $atts ) );
      
      return '<div class="portlet"><div class="header">' . $title . '</div><div class="portlet-content">' . do_shortcode($content) . '</div></div>';
}

add_shortcode("portlet", "chimera_portlet");


function chimera_action_box( $atts, $content = null ) {
   extract( shortcode_atts( array(
	'title' => '',
	'button_title' => '',
	'link' => '',
	'button_color' => '',
	'bgcolor' => '',
      ), $atts ) );

	if(empty($button_color)){
		$button_color_p = 'blue';
	} else {
		$button_color_p = $button_color;
	}

	if(empty($bgcolor)){
		$bgcolor_p = ' action_green';
	} else {
		$bgcolor_p = ' action_' . $bgcolor;
	}

      return '<div class="action_box' . $bgcolor_p . '"><h3>' . $title . '</h3><a class="button_big big_' . $button_color_p . '" href="' . $link . '" title="' . $button_title . '">' . $button_title . '<i></i></a>' . do_shortcode($content) . '</div>';
}

add_shortcode("action_box", "chimera_action_box");


function icon_box( $atts, $content = null ) {
   extract( shortcode_atts( array(
		'align' => '',
		'size' => '',
		'icon_url' => '',
		'title' => '',
      ), $atts ) );

	if(empty($size)){
		$size_p = '';
	} else {
		$size_p = ' icon_' . $size . '';
	}

      return '<div class="icon_box' . $size_p . '"><div class="icon_image"><img class="'. $align .'" src="'. $icon_url .'" alt="'. $title .'" /></div><div class="icon-content"><strong>'. $title .'</strong>' . do_shortcode($content) . '</div><div class="clear"></div></div><div class="clear"></div>';
}

add_shortcode("icon_box", "icon_box");

function chimera_info_box( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'style' => '',
      ), $atts ) );

	if(empty($style)){
		$style = 'orange';
	}

      return '<div class="info-box info_'. $style .'"><div class="cont">' . do_shortcode($content) . '</div></div>';
}

add_shortcode("info_box", "chimera_info_box");

//Buttons

function chimera_buttons( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'size' => '',
      'bgcolor' => '',
      'link'      => '#',
      'float' => '',
      ), $atts ) );

	if(empty($size)){
		$size = 'small';
	}
	
	if ($size == 'big') {
		$cls = 'button_';
	} else {
		$cls = 'but_c but_';
	}

	if(empty($float)){
		$float_p = 'float-none';
	} else {
		$float_p = 'float-' . $float;
	}

	if(!empty($bgcolor)){
		$bgcolor = ' ' . $size . '_' . $bgcolor;
	}
      
      return '<a class="' . $cls . '' .$size . $bgcolor . ' ' . $float_p . '" href="' .$link. '" title="' . do_shortcode($content) . '">' . do_shortcode($content) . '<i></i></a>';
}

add_shortcode("button", "chimera_buttons");

//Buttons

function chimera_buttons_alt( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'size' => '',
      'bgcolor' => '',
      'link'      => '#',
      'float' => '',
      ), $atts ) );

	if(empty($size)){
		$size = 'small';
	}

	if(empty($float)){
		$float_p = 'float-none';
	} else {
		$float_p = 'float-' . $float;
	}

	if(!empty($bgcolor)){
		$bgcolor = ' alt_' . $size . '_' . $bgcolor;
	}
      
      return '<a class="but_c but_alt but_alt_' .$size . $bgcolor . ' ' . $float_p . '" href="' .$link. '" title="' . do_shortcode($content) . '">' . do_shortcode($content) . '<i></i></a>';
}

add_shortcode("button_alt", "chimera_buttons_alt");

//PullQuotes

function chimera_pullquote_left( $atts, $content = null ) {
   return '<span class="pullquote_left">' . do_shortcode($content) . '</span>';	
}
add_shortcode('pullquote_left', 'chimera_pullquote_left');


function chimera_pullquote_right( $atts, $content = null ) {
   return '<span class="pullquote_right">' . do_shortcode($content) . '</span>';	
}
add_shortcode('pullquote_right', 'chimera_pullquote_right');

//Contact form

function chimera_contact_form( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'email'      => '',
    ), $atts));
    
    $out = chimera_contact_form_sc($email);
    
    return $out;
}
add_shortcode('contact_form', 'chimera_contact_form');

function chimera_contact_form_sc($email) {
$out="";
$emailError="";
$commentError="";

	global $chimera_admin_path;
	
	$email_adress_reciever = $email != "" ? $email : get_option('admin_email');

	//If the form is submitted
	if(isset($_POST['submittedContact'])) {
		require($chimera_admin_path . "submit_contact.php");
	}
	
	if(isset($emailSent) && $emailSent == true) {

		$out .= '<a name="contact_"></a>';
		$out .= '<p class="thanks">' . __("<strong>Thanks!</strong> Your email was successfully sent.", "chimera") . '</p>';

	} else {

		if(isset($captchaError)) {
			$out .= '<a name="contact_"></a>';
			$out .= '<p class="error">' . __("There was an error submitting the form.", "chimera") . '<p>';
		}

		$out .= '<a name="contact_"></a>';
		$out .= '<form action="' .get_permalink(). '#contact_" id="contact_form" method="post">';
		$out .= '<p><label class="textfield_label" for="contactName">' . __("Name: ", "chimera") . '</label><input type="text" name="contactName" id="contactName" value="';

		if(isset($_POST['contactName'])) {
			$out .= $_POST['contactName'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact textfield';

		if($emailError != '') {
			$out .= ' inputError';
		}
		$out .= '"';
		$out .= ' size="22" tabindex="1" /></p>';

		$out .= '<p><label class="textfield_label" for="email">' . __("Email:", "chimera") . '</label><input type="text" name="email" id="email" value="';

		if(isset($_POST['email'])) {
			$out .= $_POST['email'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact email textfield';

		if($emailError != '') {
			$out .= ' inputError';
		}
		$out .= '"';
		$out .= ' size="22" tabindex="2" /></p>';

		$out .= '<p><label class="textfield_label" for="comments">' . __("Message:", "chimera") . '</label><textarea name="comments" id="commentsText" rows="20" cols="30" tabindex="3" class="requiredFieldContact textarea';

		if($commentError != '') {
			$out .= ' inputError';
		}
		$out .= '">';

		if(isset($_POST['comments'])) { 
			if(function_exists('stripslashes')) { 
				$out .= stripslashes($_POST['comments']); 
				} else { 
					$out .= $_POST['comments']; 
				} 
			}
		$out .= '</textarea></p>';

		$out .= '<p class="screenReader"><label for="checking" class="screenReader">' . __("If you want to submit this form, do not enter anything in this field", "chimera") . '</label><input type="text" name="checking" id="checking" class="screenReader" value="';

		 if(isset($_POST['checking'])) {
			echo $_POST['checking'];
		}
		$out .= '" /></p>';

		$out .= '<p class="loadingImg" style="display:none;"></p>';
		$out .= '<p><button name="submittedContact" id="submittedContact" type="submit" class="fancy_button" tabindex="4"><span>';
		$out .= '' . __("Send now", "chimera") . '';
		$out .='</span></button></p>';
		$out .= '<p class="screenReader"><input id="submitUrl" type="hidden" name="submitUrl" value="' .get_template_directory_uri(). '/chimera/admin/submit_contact.php" /></p>';
		$out .= '<p class="screenReader"><input id="emailAddress" type="hidden" name="emailAddress" value="' .$email_adress_reciever. '" /></p>';

		$out .= '</form>';

	}
	return $out;
}

// Toggle

function chimera_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
		'descr' => '',
    ), $atts));
	$out="";
	$out .= '<a class="toggle" href="javascript:void(0);"><i></i>' .$title. '<strong>' .$descr. '</strong></a>';
	$out .= '<div class="toggle_content" style="display: none;">';
	$out .= '<div class="block">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '</div>';
	
   return $out;
}
add_shortcode('toggle', 'chimera_toggle');

// Highlights

function chimera_highlight1( $atts, $content = null ) {
   return '<span class="highlight1">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight1', 'chimera_highlight1');


function chimera_highlight2( $atts, $content = null ) {
   return '<span class="highlight2">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight2', 'chimera_highlight2');

// Lists

function chimera_check_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="checklist">', do_shortcode($content));
	return $content;
	
}
add_shortcode('check_list', 'chimera_check_list');


function chimera_arrow_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="arrowlist">', do_shortcode($content));
	return $content;
	
}
add_shortcode('arrow_list', 'chimera_arrow_list');

function chimera_facebook_share() {
     return '<div class="fbshare"><script src="http://widgets.fbshare.me/files/fbshare.js"></script></div>';
}
add_shortcode( 'facebook_share', 'chimera_facebook_share' );

function chimera_tweetmeme(){
	return '<div class="tweetmeme"><script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script></div>';
}
add_shortcode('retweet', 'chimera_tweetmeme');

?>
