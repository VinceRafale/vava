<?php get_header(); ?>
        
        <?php if( is_front_page() ){ ?>
		<div style="height:50px;"></div>
        <?php }else{ ?>
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
        <?php } ?>

        
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div class="container">
                <div class="row">

                            <section class="content">
                            <?php
							// Start Loop
                            while (have_posts()) : the_post();
							
								the_content();
								
							endwhile;
							// End Loop
							?>   
                            </section>

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
<?php get_footer(); ?>