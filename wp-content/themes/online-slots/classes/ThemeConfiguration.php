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
        add_filter('wpseo_breadcrumb_single_link', array($this, 'yoast_breadcrumb_list_links'), 10, 2);
        add_filter('wpseo_breadcrumb_output', array($this, 'yoast_seo_breadcrumb_output'));
        add_filter('wpseo_breadcrumb_output', array($this, 'yoast_seo_breadcrumb_output_end'));
    }

    public function includeJS(): void
    {
        wp_enqueue_script('jquery-scripts', get_template_directory_uri() . '/assets/js/jquery.js', '', '', true);
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/js/swiper.js', '', '', true);
        wp_enqueue_script('countdown-scripts', get_template_directory_uri() . '/assets/js/countdown.js', '', '', true);
        wp_enqueue_script('main-scripts', get_template_directory_uri() . '/assets/js/main.js', '', '', true);

        if(is_post_type_archive('slots')) {
            wp_enqueue_script('ajax-search', get_template_directory_uri() . '/assets/js/search-types.js', '', '', true);
            wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/assets/js/filter-slots.js', '', '', true);
        }
        if(is_post_type_archive('casino')) {
            wp_enqueue_script('ajax-search', get_template_directory_uri() . '/assets/js/search-types.js', '', '', true);
            wp_enqueue_script('ajax-filter-casino', get_template_directory_uri() . '/assets/js/filter-casino.js', '', '', true);
        }
        if(is_page('providers')) {
            wp_enqueue_script('ajax-search', get_template_directory_uri() . '/assets/js/search-types.js', '', '', true);
            wp_enqueue_script('load_taxonomy', get_template_directory_uri() . '/assets/js/displayTaxonomy.js', '', '', true);
        }

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
        register_nav_menu('footer', 'Footer Menu');
        register_nav_menu('footer-pages', 'Footer Pages Menu');
        register_nav_menu('footer-partners', 'Footer Partners Menu');
        $this->optionsPageAcf();
    }
    public function mimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function yoast_breadcrumb_list_links( $link_output, $link ) {
        return '<li>' . $link_output . '</li>';
    }

    function yoast_seo_breadcrumb_output_end($output){
        return str_replace('</span>', '', $output);
    }

    function yoast_seo_breadcrumb_output($output){
        return preg_replace('/<span[^>]*>/', '', $output);
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
                'page_title'    => 'Slots page',
                'menu_title'    => 'Slots page',
                'parent_slug'   => 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title'    => 'Casino page',
                'menu_title'    => 'Casino page',
                'parent_slug'   => 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title'    => '404 page',
                'menu_title'    => '404 page',
                'parent_slug'   => 'theme-general-settings',
            ));

        }
    }
}
new ThemeConfiguration;
