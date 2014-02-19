<?php /* Template Name: Portfolio Portrait sidebar */ ?>
<?php get_header(); ?>
        
        <!-- BEFORE CONTENT -->
		<div id="outerbeforecontent">
            <div class="container">
            	<div class="row">
                <div id="beforecontent" class="twelve columns" >
                    <div id="pagetitle-container">
                    	<h1 class="pagetitle"><?php the_title(); ?></h1>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- END BEFORE CONTENT -->

        
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div class="container">
                <div class="row">
                
                    <section id="maincontent" class="nine columns positionleft">
                    	<div class="padcontent">

                        <section class="content">
                            
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
							$args = array( 'numberposts' => -1, 'order'=> 'DESC', 'post_type' => 'portfolio');
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
                            
                        </section>
                         
                        </div>
                    </section>
                    
                    <aside class="three columns">
                    	<?php get_sidebar('portfolio'); ?>
                    </aside>
                    
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
<?php get_footer(); ?>