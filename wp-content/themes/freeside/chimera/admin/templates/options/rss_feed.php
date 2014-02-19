<script type="text/javascript">
	jQuery(document).ready(function(){
        var rss_info = 'feed=<?php echo $options['feed'] ?>&items=<?php echo $options['items'] ?>';
        var data = {
            action: 'chimera_ajax_post_action',
            type: 'news_feed',
            data: rss_info
        };
        jQuery.post('<?php echo admin_url("admin-ajax.php"); ?>', data, function(response) {
            jQuery('#<?php echo $id ?>').html(response);
        });
    });
</script>
<div id="<?php echo $id ?>">

</div>
