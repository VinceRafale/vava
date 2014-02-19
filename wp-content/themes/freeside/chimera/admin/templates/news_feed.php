<div class="rss_feed_bg">
    <?php foreach ($news_feed_items as $news_item) { ?>
        <div class="rss_item">
            <a href='<?php echo $news_item->get_permalink(); ?>'
        title='<?php _e( 'Read more about ', 'chimera' ); ?><?php echo $news_item->get_title(); ?>'><?php echo $news_item->get_title(); ?></a>
        	<span><?php echo 'Posted '.$news_item->get_date('j F Y | g:i a'); ?></span>
<!--            <div id="description">
                <?php print $news_item->get_description(); ?>
            </div>
-->
        </div>

    <?php } ?>
</div>
