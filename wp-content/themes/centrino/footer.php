<div class="footer container">

<div class="row-fluid">
<div class="header">
<div class="span3">
<?php if(!dynamic_sidebar('footer1')) echo ""; ?>
</div>
<div class="span3">
<?php if(!dynamic_sidebar('footer2')) echo ""; ?>
</div>
<div class="span3">
<?php if(!dynamic_sidebar('footer3')) echo ""; ?>
</div>
<div class="span3">
<?php if(!dynamic_sidebar('footer4')) echo ""; ?>
</div>
<div class="clear"></div>
</div>
</div> 

<div class="buttom">
<div class="container"><div class="content"><?php echo centrino_get_theme_opts('footer_text','Copyright &copy; '. get_bloginfo('sitename')); ?> | Theme by <a href='http://wpeden.com'>WP Eden</a> | Powered by <a href='http://wordpress.org'>WordPress</a></div></div>
</div>
</div>
 
<?php wp_footer(); ?>

<script>

    jQuery(function($){
        jQuery('.product-pane').hover(function(){
//alert(jQuery(this).attr('class'));
            jQuery(this).children().children('.breadcrumb').removeClass('fadeOutUp').addClass('fadeInDown');
          },function(){
            jQuery(this).children().children('.breadcrumb').removeClass('fadeInDown').addClass('fadeOutUp');
          });
    });

</script>

</body>
</html>