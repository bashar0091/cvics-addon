<?php
/**
 * Plugin Name: Theme Core
 * Description: Some Extra option added to boost your theme.
 * Version:     1.0.0
 * Author:      Awal Bashar
 * Author URI:  https://github.com/bashar0091
 * Text Domain: cvics
 */

function register_cvics_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/cvics-blog-widget.php' );
    require_once( __DIR__ . '/widgets/cvics-project-widget.php' );

	$widgets_manager->register( new \cvics_blog_Widget() );
    $widgets_manager->register( new \cvics_project_Widget() );

}
add_action( 'elementor/widgets/register', 'register_cvics_widget' );