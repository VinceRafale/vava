<?php

/**
 * Register sidebars
 */
if ( function_exists('register_sidebar') )
    register_sidebars(1,array('id' => 'footer_widgets_1','name' => 'Footer Column 1','before_widget' => '<div id="%1$s" class="widget">','after_widget' => '</div></div>','before_title' => '<h4>','after_title' => '</h4><div class="content">'));

if ( function_exists('register_sidebar') )
    register_sidebars(1,array('id' => 'footer_widgets_2','name' => 'Footer Column 2','before_widget' => '<div id="%1$s" class="widget">','after_widget' => '</div></div>','before_title' => '<h4>','after_title' => '</h4><div class="content">'));

if ( function_exists('register_sidebar') )
    register_sidebars(1,array('id' => 'footer_widgets_3','name' => 'Footer Column 3','before_widget' => '<div id="%1$s" class="widget">','after_widget' => '</div></div>','before_title' => '<h4>','after_title' => '</h4><div class="content">'));


if ( function_exists('register_sidebar') )
    register_sidebars(1,array('id' => 'footer_widgets_4','name' => 'Footer Column 4','before_widget' => '<div id="%1$s" class="widget">','after_widget' => '</div></div>','before_title' => '<h4>','after_title' => '</h4><div class="content">'));

if ( function_exists('register_sidebar') )
	register_sidebars(1,array('id' => 'default_sidebar','name' => 'Default Sidebar','before_widget' => '<div id="%1$s" class="widget">','after_widget' => '</div></div>','before_title' => '<h3 class="widgettitle">','after_title' => '</h3><div class="content">'));
if ( function_exists('register_sidebar') )
	register_sidebars(1,array('id' => 'homepage_widgets','name' => 'Homepage Sidebar','before_widget' => '<div id="%1$s" class="widget">','after_widget' => '</div></div>','before_title' => '<h3 class="widgettitle">','after_title' => '</h3><div class="content">'));