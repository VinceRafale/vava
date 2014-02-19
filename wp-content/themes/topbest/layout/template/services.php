<?php if( vp_option('services_enable') == '1') { ?>

<div class="row">

	<?php
    $args = array(
	'posts_per_page' => '3',
    'orderby'  => 'date',
    'order'    => 'DESC',
	'post_type' => 'services'
    );
                                    
    query_posts($args);
    while ( have_posts() ) : the_post(); 
    ?>

<div class="one_third columns">
<div class="indentleft">
<h2><?php the_title(); ?></h2>
<span><?php content( '20' ); ?></span>
</div>
</div>
        
   <?php endwhile; ?> 
                               
</div>
<div class="bottom separator"></div>

<?php } ?>