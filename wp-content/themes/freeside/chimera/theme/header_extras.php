<?php

if ( is_home() ) {

		// Show homepage featured posts

		$slider_cat = get_option('chimera_slider_cat');
		$slider_entries = get_option('chimera_slider_entries');
		$the_query3 = new WP_Query('cat=' . $slider_cat . '&showposts=' . $slider_entries . '&orderby=post_date&order=desc');

		
		
	?>
			
	
	<?php  { ?>
		<div class="alternate">
			<div class="feat_text">
				<h3><?php echo stripslashes(get_option('chimera_featured_title')); ?></h3>
				<h4><?php echo stripslashes(get_option('chimera_featured_text')); ?></h4>
				<?php if ( get_option('chimera_static_but_left_title') != false && get_option('chimera_static_but_left_link') != false ) { ?>
				<a href="<?php echo stripslashes(get_option('chimera_static_but_left_link')); ?>" title="<?php echo stripslashes(get_option('chimera_static_but_left_title')); ?>" class="button_big big_<?php echo get_option('chimera_static_but_left_bg'); ?> float-<?php echo get_option('chimera_static_but_left_align'); ?>"><?php echo stripslashes(get_option('chimera_static_but_left_title')); ?><i></i></a>
				<?php } ?>
				<?php if ( get_option('chimera_static_but_right_title') != false && get_option('chimera_static_but_right_link') != false ) { ?>
				<a href="<?php echo stripslashes(get_option('chimera_static_but_right_link')); ?>" title="<?php echo stripslashes(get_option('chimera_static_but_right_title')); ?>" class="button_big big_<?php echo get_option('chimera_static_but_right_bg'); ?> float-<?php echo get_option('chimera_static_but_right_align'); ?>"><?php echo stripslashes(get_option('chimera_static_but_right_title')); ?><i></i></a>
				<?php } ?>
				</div>
				<?php if ( get_option('chimera_enable_screenshot_link') != 'false' ){ ?>
				<a href="<?php echo stripslashes(get_option('chimera_slider_link')); ?>" title="<?php echo stripslashes(get_option('chimera_slider_title')); ?>" id="screenshot"><img src="<?php echo get_option('chimera_slider_img'); ?>" alt="<?php echo stripslashes(get_option('chimera_slider_title')); ?>" /></a>
				<?php } else { ?>
				<div id="screenshot">
				<?php if ( get_option('chimera_slider_img') != false ) { ?>
					<img src="<?php echo get_option('chimera_slider_img'); ?>" alt="<?php echo stripslashes(get_option('chimera_slider_title')); ?>" />
				<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
	<?php }  } else { ?>
			
			<h1>
	<?php
				if (is_category()) {
				
					echo single_cat_title();
				
				} elseif (is_day()) { ?>
				
				<?php the_time('F jS, Y'); ?>

				<?php } elseif (is_month()) { ?>
				<?php the_time('F, Y'); ?>

				<?php } elseif (is_year()) { ?>
				<?php the_time('Y'); ?>
					
				
			<?php
			
				} elseif ( is_single() ) {
			?>
			
				<?php the_title(); ?>
			
			<?php
			
				} elseif ( is_tag() ) {
			?>

				<?php single_tag_title("", true); ?> Tag
			
			<?php
			
			} elseif ( is_search() ) {
		?>

        		<?php the_search_query(); 

				} elseif ( is_404() ) {
			?>

            		Page not found


			<?php
				} else { ?>

                    <?php the_title(); ?>

            <?php } ?>
            
			</h1>
			<?php $title_descr = get_post_meta($post->ID, 'title_descr', true); if ( get_option('chimera_enable_title_descr') != 'false' ) {
				if (is_category() || is_search() || is_tag() || is_archive() || is_year() || is_day() || is_month()) { } else { ?>

				<?php if ( $title_descr != false) { ?>
				<div class="title_descr">
					<?php echo $title_descr; ?>
				</div>
			<?php } } } ?>
			<?php
				
				if (is_category() || is_search() || is_tag() || is_archive() || is_year() || is_day() || is_month()) { ?>

					<?php

						if ( get_option('chimera_teaser_cat') == 'custom_text' ) {

							echo '<div id="cust_txt">';
							echo stripslashes( get_option('chimera_teaser_cat_txt') );
							echo '</div>';

						} elseif ( get_option('chimera_teaser_cat') == 'social' ) {

						

						} else {}

					} else {
			
					$teaser_text = get_post_meta($post->ID, 'teaser_text', true);

					$teaser_custom_text = get_post_meta($post->ID, 'teaser_text_custom', true);

					$teaser_st = get_option('chimera_teaser_st');

					$teaser_default = get_option('chimera_teaser_default');

					$cust_text = get_option('chimera_teaser_default_text');

					if ( $teaser_text == 'default' ) {

						if ( $teaser_st == 'disable' ) {

							//don't display title teaser.

						}

						if ( $teaser_st == 'social' ) {

				

						}

						if ( $teaser_st == 'custom_text_def' ) {

							echo '<div id="cust_txt">';
							echo stripslashes( $cust_text );
							echo '</div>';

						}

					}

					if ( $teaser_text == 'custom' ) {
						echo '<div id="cust_txt">';
						echo stripslashes( $teaser_custom_text );
						echo '</div>';
					}

					if ( $teaser_text == 'social' ) {

			

					}				

					if ( $teaser_text == 'disable' ) {
						//don't display title teaser.
					}
				
				}

			?>
			<div class="clear"></div>
		</div>
<?php } ?>
