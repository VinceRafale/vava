<?php get_header(); ?>

<?php
echo "něco něco něco něco něco něco něco něco něco něco něco ";
$args = apply_filters('em_content_events_args', $args);

if( get_option('dbem_css_evlist') ) echo "<div class='css-events-list'>";

echo EM_Events::output_grouped($args); //note we're grabbing the content, not em_get_events_list_grouped function

    
if( get_option('dbem_css_evlist') ) echo "</div>";
?>


<section class="content">
	
	<div class="pad group">
		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part('content'); ?>		
			<?php endwhile; ?>
			
			<?php get_template_part('inc/pagination'); ?>
			
		<?php endif; ?>			
	</div><!--/.pad-->
	
</section><!--/.content-->
<?php get_sidebar(); ?>

<?php get_footer(); ?>