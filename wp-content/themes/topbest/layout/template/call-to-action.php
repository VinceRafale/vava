<?php if( vp_option('action_enable') == '1') { ?>

<div class="highlight-content">
<div class="top separator"></div>
<h2><?php echo vp_option('action_text'); ?></h2>
<h3><?php echo vp_option('action_sub'); ?></h3>
<a href="<?php echo vp_option('action_link'); ?>" class="button"><?php echo vp_option('action_button'); ?></a>
<div class="clear"></div>
<div class="bottom separator"></div>
</div>

<?php } ?>