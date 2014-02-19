<?php get_header();?>
<div id="content">
     <?php if (have_posts()) : ?>
		<h1 class="archive-title">Search Results</h1>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
                <div class="date">
				<?php the_time('M') ?>
				<span><?php the_time('j') ?></span>
                <?php the_time('Y') ?></div>
				<div class="entry">
				<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content( __( 'Read More >>', 'stripesandblue' ) ); ?>
				<div class="clear"></div>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'stripesandblue' ) . '</span>', 'after' => '</div>' ) ); ?>
				<div class="post-meta">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Permalink</a> | Categories <?php the_category(', ') ?> on <?php the_time('F j, Y') ?> by <?php the_author() ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link(' | Edit', ''); ?>
                <?php the_tags('<br />Tags: ', ', '); ?> 
                </div>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
<?php get_sidebar();?>
<?php get_footer ();?>