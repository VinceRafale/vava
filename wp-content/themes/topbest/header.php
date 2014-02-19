<!DOCTYPE html <?php language_attributes(); ?>>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
	<meta name="author" content="" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    
    
</head>


<body <?php body_class( $class ); ?>>

<div id="bodychild">
	<div id="outercontainer">
    
        <!-- HEADER -->
        <div id="outerheader">
        	<div class="container">
            
            <header id="top">
            	<div class="row">
                    <div id="logo" class="six columns">
                        <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo vp_option('logo'); ?>" alt=""/></a>
                        <span class="desc"><?php bloginfo('description'); ?></span>
                    </div>
                    <div id="topright" class="six columns">
                    
                    <?php if( vp_option('companyemail') != '' ){ ?>
                        <div class="mail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/mail.png" alt=""/>
						<?php echo vp_option('companyemail'); ?>
                        </div>
                   <?php } ?>
                        
                   <?php if( vp_option('companynumber') != '' ){ ?>
                        <div class="call">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/call.png" alt=""/>
                        call centre: <?php echo vp_option('companynumber'); ?>
                        </div>
                  	<?php } ?>
                        
							<form action="#" id="searchform" method="get">
                                <div class="bgsearch">
                                <input type="text" value="" id="s" name="s" placeholder="Search..."> 
                                <input type="submit" value="" class="searchbutton">
                                </div>
                            </form>
                    </div>
                </div>
                <div class="row">
                    <section id="navigation" class="twelve columns">
                        <nav id="nav-wrap">
                            
                            <!-- topnav -->
                            <?php get_template_part('nav'); ?>
                            <!-- topnav -->
                            
                            <ul class="sn">
            <?php if( vp_option('twitter') != '' ){ ?>             
            <li><a href="<?php echo vp_option('twitter'); ?>" title="Twitter"><span class="icon-img twitter"></span></a></li>
            <?php } ?>
            
            <?php if( vp_option('facebook') != '' ){ ?>
            <li><a href="<?php echo vp_option('facebook'); ?>" title="Facebook"><span class="icon-img facebook"></span></a></li>
            <?php } ?>
            
            <?php if( vp_option('google') != '' ){ ?>
            <li><a href="<?php echo vp_option('google'); ?>" title="Google+"><span class="icon-img google"></span></a></li>
            <?php } ?>
            
            <?php if( vp_option('pinterest') != '' ){ ?>
            <li><a href="<?php echo vp_option('pinterest'); ?>" title="Pinterest"><span class="icon-img pinterest"></span></a></li>
            <?php } ?>
            
            <?php if( vp_option('enablerss') == '1' ){ ?>
            <li><a href="<?php bloginfo('rss_url'); ?>" title="RSS"><span class="icon-img rss"></span></a></li>
            <?php } ?>
                   
                            </ul> 
                            <div class="clear"></div>
                        </nav><!-- nav -->	
                    </section>
                </div>
                <div class="clear"></div>
            </header>
            
            </div>
        </div>
        <!-- END HEADER -->