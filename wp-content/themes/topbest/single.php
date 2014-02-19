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
                            
								<article class="post">

                                   <?php if( has_post_thumbnail() ){ ?>
                                    <div class="postimg"><?php the_post_thumbnail('blog-standard'); ?></div>
                                    <div class="line"><div></div></div>
                                    <?php } ?>
                                     
                                    <div class="date-wrapper"> 
										<div class="date-value"><?php the_time('d') ?></div>
                                        <div class="month-value"><?php the_time('M') ?></div>
                                        <div class="year-value"><?php the_time('Y') ?></div>
                                    </div>
       
       								<!-- Start Entry Content -->
                                    <div class="entry-content">
                                    <?php while (have_posts()) : the_post(); ?>
                                    
                                        <div class="entry-utility">
                                            Posted by: <?php echo the_author_meta('nickname', get_the_author_meta( 'ID' ) ); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
                                            Category: <?php the_category(' / '); ?> &nbsp;&nbsp;/&nbsp;&nbsp;
                                            <?php comments_number() ?>
                                        </div>
                                    
                                       <!-- Content -->
                                       <?php the_content(); ?>
                                       <?php countviews( get_the_ID() );  ?>
                                       <!-- Content -->
                                       
                                       <!-- Page Link Pages -->
                                       <?php wp_link_pages(); ?>
                                       <!-- Page Link Pages -->

									
                                    </div>
                                    <!-- End Entry Content -->
                                   
                                    <div class="clear"></div>
                                </article>
								
                                <?php if( vp_option('post_author') == '1' ){ ?>
                                <div class="author">
                                
                                    <span class="alignleft">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 97, '', 'Author Avatar' ); ?>
                                    </span>
                                    
                                    <h3>About the Author</h3>
                                    <p><?php echo the_author_meta('description', get_the_author_meta( 'ID' ) ); ?></p>
                                </div>
                                <?php } ?>
                                
                                <!-- Start Comments -->
                                <section id="comment">
                                    <h3><?php comments_number() ?></h3>
                                    <?php comments_template(); ?>
                                </section>
                                <!-- End Comments -->           
                                

                            </section>
                         
                        </div>
                    </section>
                    <?php endwhile; ?>
                    
                    <!-- Start Widget Container -->
                    <aside class="three columns">
                    	<?php get_sidebar('single'); ?>
                    </aside>
                    <!-- End Widget Container -->
                    
                    
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
<?php get_footer(); ?>