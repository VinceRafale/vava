<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>


<?php 
	if( vp_option('homepage_layout') == 'standard'){
		get_template_part('layout/layout-standard');
	}elseif( vp_option('homepage_layout') == 'layout_1' ){
		get_template_part('layout/layout-1');
	}elseif( vp_option('homepage_layout') == 'layout_2' ){
		get_template_part('layout/layout-2');
	}elseif( vp_option('homepage_layout') == 'layout_3' ){
		get_template_part('layout/layout-3');
	}else{
		get_template_part('layout/layout-4');
	}
?>


<?php get_footer(); ?>