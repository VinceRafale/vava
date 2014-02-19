<?php if( vp_option('portfolio_enable') == '1') { ?>

									<div class="carousel">
                                    <div class="header-wrapper">
                                    <h2><?php echo vp_option('portfolio_text'); ?></h2>
                                    </div>
									<nav class="carousel-nav">
                                    	<a class="port-nav left"></a><a class="port-nav right"></a>
                                    </nav>
                                    <div data-index="0" class="carousel-item-container row" >

									<?php
									$args = array(
									'posts_per_page' => '8',
									'orderby'  => 'date',
									'order'    => 'DESC',
									'post_type' => 'portfolio',
									);
																	
									query_posts($args);
									while ( have_posts() ) : the_post(); 
									?>

                                        <div class="one_fourth columns item">
                                            <div class="ts-display-pf-img">
                                                <a class="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <?php the_post_thumbnail('portfolio-threecol'); ?>
                                                </a>							
                                            </div>
                                            <div class="ts-display-pf-text">
                                                <h2><a class="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto[mixed]" ><?php the_title(); ?></a></h2>
                                            </div>
                                        </div>
                                        
                                     <?php endwhile; ?>   
                                        
                                	</div>
                               	</div>
                                
                                <div class="bottom separator"></div>
                                
<?php } ?>