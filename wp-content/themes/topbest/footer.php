        <!-- FOOTER -->
        <footer id="footer">
        	<div id="outertweets"></div>
            
            <!-- FOOTER SIDEBAR -->
            <?php get_sidebar('footer'); ?>
            <!-- END FOOTER SIDEBAR -->
            
            <!-- COPYRIGHT -->
            <div id="outercopyright">
                <div class="container">
                    <div id="copyright"><?php echo vp_option('copyright'); ?></div>
                </div>
            </div>
            <!-- END COPYRIGHT -->
        </footer>
        <!-- END FOOTER -->
        <div class="clear"></div><!-- clear float --> 
	</div><!-- end outercontainer -->
</div><!-- end bodychild -->

<?php wp_footer(); ?>
</body>
</html>
