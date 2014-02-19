<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<!--[if lt IE 9]>
<script src="style/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

</head>
<?php $class = 'full-layout'; ?>
<body <?php body_class( $class ); ?>>
<!-- Begin Body Wrapper -->
<div class="body-wrapper"> 
  <!-- Begin Top Wrapper -->
  <div class="top-wrapper">
    <div class="inner"> 
      <!-- Begin Header -->
      <header>
      		
            
            <!-- Start Logo -->
            <?php if( vp_option('header_logo') != '' ){ ?>
            <div class="logo">
            <a href="<?php echo home_url( '/' ); ?>">
            <img src="<?php echo vp_option('header_logo'); ?>" alt="Logo" />
            </a>
            </div>
            <?php } ?>
            <!-- Start Logo -->
        
        <!-- Begin Menu -->
		<?php get_template_part('nav'); ?>
        <!-- End Menu -->
        <div class="clear"></div>
      </header>
      <!-- End Header -->
      
      
    </div>
  </div>
  <!-- End Top Wrapper -->