<div id="footer">

	<div id="footerShadow">
		
		<div id="innerFooter">

			<div id="footer-sidebar">
				<?php get_sidebar('footer'); ?>
			</div>
			
			<div class="h-line"></div>	
			
			<div id="copyright">
				<p> | </p>
			</div>
			
			<div class="backtop">
				<p><a href="#backtop">back to top</a></p>
			</div>	
			
		</div>

		<div class="bottomBar"></div>

	</div>

</div>

<?php wp_footer(); ?>

<!-- This JavaScript snippet activates those tabs -->
<script type="text/javascript">

// perform JavaScript after the document is scriptable.
jQuery(function() {
    // setup ul.tabs to work as tabs for each div directly under div.panes
    jQuery("ul.tabs").tabs("div.panes > div");
});
</script>

</body>
</html>

