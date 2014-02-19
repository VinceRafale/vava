<?php get_header(); ?>

        <!-- BEFORE CONTENT -->
		<div id="outerbeforecontent">
            <div class="container">
            	<div class="row">
                <div id="beforecontent" class="twelve columns" >

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
                            
                            
                           	<?php 
							/* ================================================================== */
							/* End of Loop */
							/* ================================================================== */
							if ( have_posts() ) : while ( have_posts() ) : the_post();
							?>
                            
								<article class="post">
                                	<div class="header-wrapper">
                                        <div class="line"><div></div></div>
                                        <h2 class="posttitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <div class="entry-utility">
                                            Posted by: <?php echo the_author_meta('nickname', get_the_author_meta( 'ID' ) ); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
                                            Category: <?php the_category(' / '); ?> &nbsp;&nbsp;/&nbsp;&nbsp;
                                            <?php comments_number() ?>
                                        </div>
                                    </div>
                                    
                                    <?php if( has_post_thumbnail() ){ ?>
                                    <div class="postimg"><?php the_post_thumbnail('blog-standard'); ?></div>
                                    <?php } ?>
                                    
                                    <div class="date-wrapper"> 
										<div class="date-value"><?php the_time('d') ?></div>
                                        <div class="month-value"><?php the_time('M') ?></div>
                                        <div class="year-value"><?php the_time('Y') ?></div>
                                    </div>
       
                                    <div class="entry-content">
                                       <p><?php content( '55' ); ?></p>
										<a href="<?php echo get_permalink(); ?>" class="more">Read more</a>
                                    </div>
                                   
                                    <div class="clear"></div>
                                </article>
                                
                                <?php
								/* ================================================================== */
								/* End of Loop */
								/* ================================================================== */
								endwhile;
								?>
                                
                                
                                <?php
								/* ================================================================== */
								/* Else if Nothing Found */
								/* ================================================================== */
								else :
								?>
								
								<!-- Start Post Item -->
								
									<?php if ( is_search() ) { ?>
									<h3>Search Result for: <?php the_search_query(); ?> </h3>
									<p>Sorry the query you search does not match any of our database! And therefore did not display any result</p>
									<?php }else{ ?>
									<h3>No Post Found</h3>
									<p>Sorry Nothing to display, either the posts have been deleted or transfered.</p>
									<?php } ?>
								<!-- End Post Item -->

                                
                                <?php
								/* ================================================================== */
								/* End of Loop */
								/* ================================================================== */
								endif;
								?>
								
                                
                                
								<?php pagination(); ?>
                                
                            </section>
                         
                        </div>
                    </section>
                    
                    
                    
                    <!-- Start Widget Container -->
                    <aside class="three columns">
                    	<?php get_sidebar(); ?>
                    </aside>
                    <!-- End Widget Container -->
                    
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
<?php get_footer(); ?>