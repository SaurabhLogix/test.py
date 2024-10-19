<?php
/**
 * Plugin Name: Elementor Card Widget
 * Description: Custom Elementor widget for card designs.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: elementor-card-widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register the widget
function register_elementor_card_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/card-widget.php' );
    $widgets_manager->register( new \Elementor_Card_Widget() );
}
add_action( 'elementor/widgets/register', 'register_elementor_card_widget' );

// Enqueue styles and scripts
function elementor_card_widget_assets() {
    wp_enqueue_style( 'elementor-card-widget', plugin_dir_url( __FILE__ ) . 'assets/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'elementor_card_widget_assets' );