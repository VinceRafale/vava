<?php 
$kopa_setting = kopa_get_template_setting();
$sidebars = $kopa_setting['sidebars'];

get_header(); ?>

<div id="main-content">
    <div class="widget">
        <?php if ( is_active_sidebar( $sidebars[0] ) ) 
            dynamic_sidebar( $sidebars[0] );
        ?>
    </div>

    <div class="wrapper">

        <div class="row-fluid">
        
            <div class="span12 clearfix">
            
                <?php if ( is_active_sidebar( $sidebars[1] ) ) 
                    dynamic_sidebar( $sidebars[1] );
                ?>
            
            </div><!--span12-->
            
        </div><!--row-fluid-->

    </div><!--wrapper-->

    <div class="wrapper">
        <div class="row-fluid">
            <div class="span12">
                
                <div id="main-col">

                    <?php if ( is_active_sidebar($sidebars[2] ) )
                        dynamic_sidebar( $sidebars[2] );
                    ?>

                </div>
                
                <div class="sidebar">
                    <?php if ( is_active_sidebar($sidebars[3] ) )
                        dynamic_sidebar( $sidebars[3] );
                    ?>
                </div><!--sidebar-->
                
                <div class="clear"></div>
                
            </div><!--span12-->
        </div><!--row-fluid-->                
    </div><!--wrapper-->

</div>

<?php get_footer(); ?>