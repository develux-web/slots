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

    }
    public function includeCSS(): void
    {
        if (is_front_page()) {
            wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/pages/home.css');
        }
        if (is_page('contact-us')) {
            wp_enqueue_style('contact-us-css', get_template_directory_uri() . '/assets/css/pages/contact-us.css');
        }
    }
    public function themeSupport(): void
    {
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        register_nav_menu('header', 'Header Menu');
    }
    public function mimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
new ThemeConfiguration;
