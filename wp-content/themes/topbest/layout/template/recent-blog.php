<?php if( vp_option('blog_enable') == '1') { ?>

<div class="header-wrapper">
<h2><?php echo vp_option('blog_text'); ?></h2>
</div>

<!-- Start Recent Post -->
<div class="row">

	<?php
    $args = array(
	'posts_per_page' => '4',
    'orderby'  => 'date',
    'order'    => 'DESC',
    );
                                    
    query_posts($args);
    while ( have_posts() ) : the_post(); 
    ?>
<div class="one_fourth columns">
<article class="post-shortcode">
<div class="line"><div></div></div>

    <div class="date-wrapper"> 
        <div class="date-value"><?php the_time('d') ?></div>
        <div class="month-value"><?php the_time('M') ?></div>
        <div class="year-value"><?php the_time('Y') ?></div>
    </div>
               
<div class="entry-content">
<h2 class="posttitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php content( '10' ); ?>
</div>
                                           
<div class="clear"></div>
</article>
</div>

<?php endwhile; ?>


</div>
<!-- End Recent Post -->

<?php } ?>