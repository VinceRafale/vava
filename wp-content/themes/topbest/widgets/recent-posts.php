<?php function get_recent_post( $beforewidget, $afterwidget, $beforetitle, $aftertitle ){ ?>

	<?php echo $beforewidget; ?>
	<?php echo $beforetitle; ?>Recent Posts<?php echo $aftertitle; ?>
                
<ul class="rp-widget">

			<?php query_posts( 'order=DESC&posts_per_page=3' );
					while ( have_posts() ) : the_post(); ?>
            <li>
                <?php the_post_thumbnail('widget-latest' ); ?>
                    <h3><a href="<?php echo get_permalink(); ?>" ><?php the_title(); ?></a></h3>
                        <span class="smalldate"><div class="date-value"><?php the_time('M d, Y') ?></div></span>
                        <span class="clear"></span>
            </li>
    		<?php endwhile; ?>

</ul>

	<?php echo $afterwidget; ?>

 <?php } ?>
 



 
<?php
class custom_recent_post extends WP_Widget {

         public function __construct() {
        // widget actual processes
		parent::WP_Widget(false,'BlueMarlin Recent Posts','description=Shows the latest blog posts');
        }

        public function form( $instance ) {
        // outputs the options form on admin
		echo 'No Options Available';
        }

        public function widget( $args, $instance ) {
        // outputs the content of the widget
		get_recent_post( $args['before_widget'], $args['after_widget'], $args['before_title'], $args['after_title'] );
        }

}
register_widget( 'custom_recent_post' );

?>