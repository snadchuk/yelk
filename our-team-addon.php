<?php
/**
 * Plugin Name: Yelk Addon for Elementor
 * Description: Our Team for Elementor.
 * Version:     1.0.0
 * Author:      Artur Snadchuk
 * Author URI:  https://t.me/artursnadchuk/
 * Text Domain: yelk
 */

function register_our_team_widget($widgets)
{

    require_once(__DIR__ . '/widgets/OurTeam/our-team-widget.php');

    $widgets->register(new \Our_Team_Widget());

}

add_action('elementor/widgets/register', 'register_our_team_widget');

function our_team_widget_css() {
    $style_path = plugin_dir_url(__FILE__) . 'widgets/OurTeam/components/widgets/our-team/css/our-team.css';
    wp_enqueue_style('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/tiny-slider.css');
    wp_enqueue_style('our-team-css', $style_path, array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'our_team_widget_css');

function our_team_widget_js() {
    $js_path = plugin_dir_url(__FILE__) . 'widgets/OurTeam/components/widgets/our-team/js/our-team.js';
    wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/min/tiny-slider.js', array(), '2.3.11', true);
    wp_enqueue_script('our-team-js', $js_path, array(), '', true);
}

add_action('wp_enqueue_scripts', 'our_team_widget_js');
