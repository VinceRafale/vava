<?php 

if ( !defined('ABSPATH')) exit; 

get_header(); 

?>


<div class="container-fluid featured-block"><div class="row-fluid"><div class="span12">
<div class="container home-content taxonomy-ptype">
    <?php if ( function_exists('yoast_breadcrumb') ) { ?>
        <div class="row-fluid">
            <div class="span12">
                <?php
                yoast_breadcrumb('<a>','</a>');
                ?>
            </div>
        </div>
    <?php } ?>
<div class="row-fluid">
<?php

    while(have_posts()): the_post();
?>
        <div class="span3">
            <div class="thumbnail portfolio-block" id="p-<?php echo get_the_ID(); ?>">
                <div class="media product-pane">
                    <a href="<?php the_permalink();?>"><?php centrino_post_thumb(array(300,250)); ?></a>
                    <div class="media-body">
                        <h3><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
                        <div class="breadcrumb animated fadeOutUp">
                            <?php echo  wpmp_currency_sign().wpmp_product_price(get_the_ID()); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-small pull-right"><i class="icon icon-shopping-cart"></i></a>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endwhile; ?>
    <?php
    global $wp_query;
    if (  $wp_query->max_num_pages > 1 ) : ?>
        <div class="clear"></div>
        <div id="nav-below" class="navigation post box arc">
            <?php get_template_part('pagination'); ?>
        </div><!-- #nav-below -->
    <?php endif; ?>
</div>


 
         
</div></div>
</div>



</div>
 
 


 

        
<?php get_footer(); ?>
