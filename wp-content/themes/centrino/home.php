<?php 

if ( !defined('ABSPATH')) exit; 

 

get_header(); 

?>

<?php  if('posts' == get_option( 'show_on_front' )&&!centrino_get_theme_opts('centrino_home')) :  ?>
<div class="container">
    <div class="row-fluid">
        <div class="span<?php echo apply_filters("homepage_content_grid",8); ?>">
            <?php        get_template_part('loop'); ?>
        </div>
        <?php
        $homepage_sidebar_grid = apply_filters("homepage_sidebar_grid",4);

        if($homepage_sidebar_grid>0){
            ?>
            <div class="span<?php echo $homepage_sidebar_grid; ?>">

                <?php  dynamic_sidebar("homepage_sidebar_right"); ?>

            </div>

        <?php
        }
        ?>
    </div>
</div>

<?php else:   ?>

<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="container">




        <div class="row-fluid">

            <?php
               for($i=1; $i<=3; $i++):

               $page_id = centrino_get_theme_opts("home_featured_page_".$i);
               $page  = get_page($page_id);
               $meta = get_post_meta($page_id, 'centrino_post_meta', true);
               $url = esc_url(get_permalink($page_id));
            ?>
            <div class="span4 featured-block">
                <div>        <div align="center" class="feature-icon-top">
                        <div align="center" class="iconbox">
                            <a href="<?php echo $url; ?>">
        <span class="icon-stack icon-3x img-circle">
          <i class="icon <?php echo esc_attr($meta['icon']); ?> icon-inner"></i>
        </span>

                            </a>
                        </div>

                        <h2 style="margin-top:0px;"><a href="<?php echo $url; ?>"><?php echo esc_attr($page->post_title); ?></a></h2>
                        <p style="padding: 0 30px"><?php echo esc_attr($meta['excerpt']); ?></p>
                        <div class="clear"></div>
                        <a href="<?php echo $url; ?>" class="btn btn-primary">Read More <i class="icon icon-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>

        </div>
</div>
</div>
</div>
</div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
<div class="container">

        <div class="sap" align="center"><span><?php echo esc_attr(centrino_get_theme_opts('featured_section_2_title','New Products')); ?></span></div>

    <div class="row-fluid">
        <div class="span12" align="center"><?php echo esc_attr(centrino_get_theme_opts('featured_section_2_desc')); ?><br/><br/><br/></div>
    </div>

        <div class="row-fluid">
            <?php
            global $post;
            $q = new WP_Query('post_type=wpmarketplace&posts_per_page=4');
            while($q->have_posts()): $q->the_post();

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


        </div>

</div>
</div>
</div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
<div class="container">

        <div class="sap" align="center"><span><?php echo esc_attr(centrino_get_theme_opts('blog_section_title','From Blog')); ?></span></div>

        <div class="row-fluid">
            <div class="span12" align="center"><?php echo esc_attr(centrino_get_theme_opts('blog_section_desc')); ?><br/><br/><br/></div>
        </div>

        <div class="row-fluid">
            <div class="span12" >
                <ul class="thumbnails">
                    <?php
                    $q = new WP_Query('posts_per_page=2');
                    $ccnt = 0;
                    while($q->have_posts()): $q->the_post(); ?>
                        <li class="span6 home-cat-single">
                            <div class="entry-content media">
                                <a href="<?php the_permalink();?>" class="pull-left">
                                    <?php centrino_post_thumb(array(200,180),true, array('class'=>'img-rounded')); ?>
                                </a>
                                <div class="media-body">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&nbsp;</h2>
                                <div class="post-meta"><i class="icon icon-time"></i> <?php echo get_the_date(); ?></div>
                                <p><?php centrino_post_excerpt(100); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-bordered btn-mini">Read More <i class="icon icon-chevron-right"></i></a>
                                </div>
                            </div>

                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>


 
<div class="clear"></div>
         

</div>
        </div>
    </div>
</div>
         
<?php endif; ?>

        
<?php get_footer(); ?>
