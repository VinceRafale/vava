<?php if( vp_option('slider_enable') == '1') { ?>

        <!-- SLIDER -->
        <div id="outerslider">
        	<div class="container">
            <div class="row">
        	<div id="slidercontainer" class="twelve columns">
            
            	<section id="slider">
                    <div id="slideritems" class="flexslider">
                        <ul class="slides">
                        
                        <?php
						$args = array( 'numberposts' => -1, 'order'=> 'DESC', 'post_type' => 'slider');
						$postslist = get_posts( $args );
						foreach ($postslist as $post) :  setup_postdata($post);
						?>
                        
                            <li>
                                <?php the_post_thumbnail('slider'); ?>
                                <div class="flex-caption">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </li>
                            
                        <?php wp_reset_query(); endforeach; ?>
                            
                        </ul>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/slider-shadow.png" alt="" />
                    </div>
                </section>
                
            </div>
            </div>
            </div>
        </div>
        <!-- END SLIDER -->
        
<?php }else{ ?>
<div style="height:40px;"></div>
<?php } ?>