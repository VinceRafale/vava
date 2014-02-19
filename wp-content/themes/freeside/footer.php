	</div>
</div>

<?php if ( get_option('chimera_footer_widgets') != 'false' ) { ?>

<div id="footer">
	<div class="wrapper">
		<div class="one_fourth">
		<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar("footer_widgets_1") ) : ?><?php endif; ?>
		</div>
		<div class="one_fourth">
		<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar("footer_widgets_2") ) : ?><?php endif; ?>
		</div>
		<div class="one_fourth">
		<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar("footer_widgets_3") ) : ?><?php endif; ?>
		</div>
		<div class="one_fourth last">
		<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar("footer_widgets_4") ) : ?><?php endif; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php } ?>

<div id="footer_bottom">
	<div class="wrapper">
<?php wp_nav_menu( array( 'container' => 'span', 'theme_location' => 'footer-menu', 'depth' => 1 ) ); ?>
<?php if ( get_option('chimera_copyright_footer') != 'false' ) { ?>
<div class="clear"></div>
<br />
<div class="copy"><?php echo get_option('chimera_copyright_footer'); ?></div>
<?php } ?>
		<a class="powered" href="http://www.chimerathemes.com" target="_blank" title="ChimeraThemes">ChimeraThemes.com - Premium WordPress 3.0 Themes</a>
	</div>
</div>
<?php echo stripslashes(get_option('chimera_tracking_code')); ?>
<?php

wp_footer();

?>

</body>
</html>