<?php

namespace classes;

class ThemeConfiguration
{
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'themeSupport'));
        add_filter('upload_mimes', array($this, 'mimeTypes'));
        add_action('wp_enqueue_scripts', array($this, 'includeJS'));
        add_action('wp_enqueue_scripts', array($this, 'includeCSS'));
    }

    public function includeJS(): void
    {
        wp_enqueue_script('jquery-scripts', get_template_directory_uri() . '/assets/js/jquery.js', '', '', true);
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/js/swiper.js', '', '', true);
        wp_enqueue_script('countdown-scripts', get_template_directory_uri() . '/assets/js/countdown.js', '', '', true);
        wp_enqueue_script('main-scripts', get_template_directory_uri() . '/assets/js/main.js', '', '', true);
    }
    public function includeCSS(): void
    {
        wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.css');
        wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
    }
    public function themeSupport(): void
    {
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        register_nav_menu('header', 'Header Menu');
        $this->optionsPageAcf();
    }
    public function mimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function optionsPageAcf()
    {
        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page(array(
                'page_title'    => 'General Settings',
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));

            acf_add_options_sub_page(array(
                'page_title'    => '404 page',
                'menu_title'    => '404-page',
                'parent_slug'   => 'theme-general-settings',
            ));
        }
    }
}
new ThemeConfiguration;
