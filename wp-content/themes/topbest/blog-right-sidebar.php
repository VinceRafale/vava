<?php /* Template Name: Blog Right sidebar */ ?>
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
                            
                            
                            <?php
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array(
									'orderby'  => 'date',
									'order'    => 'DESC',
									'paged'	   => $paged
								);
								
								query_posts($args);
							while ( have_posts() ) : the_post(); 
							?>
                            	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                                </div>
                                
                                <?php endwhile; ?>
								
                                
                                <?php if( vp_option('pagination') == '1'){
										pagination();
                                	}else{
										posts_nav_link();
								} ?>
                                
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