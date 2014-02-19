<?php get_header(); ?>

<div class="subhead">
	<div class="insubhead">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>

</div>

</div><!--end masthead-->

<div class="stripe"></div>

<div id="casing">
<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" id="post-<?php the_ID(); ?>">

<div class="entry">
<?php the_content('Read the rest of this entry &raquo;'); ?>
</div>
</div>

<?php endwhile; endif; ?>
</div>		

<?php get_sidebar(); ?>
<?php get_footer(); ?>