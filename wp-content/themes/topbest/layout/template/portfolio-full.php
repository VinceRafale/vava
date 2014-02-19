<?php if( vp_option('portfolio_enable') == '1') { ?>

<div class="header-wrapper">
                            <h2><?php echo vp_option('portfolio_text'); ?></h2>
                            </div>
                            <!-- Begin Portfolio Nav -->
                            <div id="frame-filter">
                            <ul id="filter">
                                <li class="current"><a href="#" data-filter="*">All Categories</a></li>
                                <?php
								  $terms = get_terms("portfolio");
								  $count = count($terms);
								  if ( $count > 0 ){
									  foreach ( $terms as $term ) {
									   echo '<li><a href="#" data-filter=".'.$term->name.'">'.$term->name.'</a></li>';
										
									 }
								  }
							  ?>
                            </ul> 
                            <div class="clear"></div>
                            </div> 
                            <!-- End Portfolio Nav -->    
                              
                            <!-- Begin Portfolio Items -->
                            <div id="ts-display" class="row">
                            
                            		<?php
									$args = array( 'numberposts' => 12, 'order'=> 'DESC', 'post_type' => 'portfolio');
									$postslist = get_posts( $args );
									foreach ($postslist as $post) :  setup_postdata($post);
									
									$terms = get_the_terms( $post->ID, 'portfolio' );					
									if ( $terms && ! is_wp_error( $terms ) ) : 
										$term_links = array();
										foreach ( $terms as $term ) {
											$term_links[] = $term->name;
										}					
									$the_term = join( " ", $term_links );
									?>
                            
                                    <div class="one_fourth columns item <?php echo $the_term; ?>">
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto[mixed]" >
                                            <span class="rollover"></span>
                                            <?php the_post_thumbnail('portfolio-fourcol'); ?>
                                            </a>							
                                        </div>
                                        <div class="ts-display-pf-text">
                                            <h2><a class="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto[mixed]"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </div>
                                    
                                    <?php endif; ?> 
                           			<?php wp_reset_query(); endforeach; ?>
                                    
                            </div>
                            <!-- End Portfolio Items -->
                            
                            <div class="bottom separator"></div>
                            
<?php } ?>