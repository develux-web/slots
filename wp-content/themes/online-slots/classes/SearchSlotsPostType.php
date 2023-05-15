<?php

namespace classes;

class SearchSlotsPostType
{
    public function __construct()
    {
        add_action('wp_ajax_search_posts', array($this, 'search_posts_callback'));
        add_action('wp_ajax_nopriv_search_posts', array($this, 'search_posts_callback'));
        add_action( 'wp_enqueue_scripts', array($this, 'localize_ajaxurl'));
    }

    public function search_posts_callback() {
        $search_query = $_GET['query'];
        $type = $_GET['type'];
        $arr_type = explode( ',', $type );

        $args = array(
            'post_type' => $arr_type,
            'posts_per_page' => 10,
            's' => $search_query,
        );

        $query = new \WP_Query($args);
        $results = array();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $image = get_the_post_thumbnail_url();
                $result = array(
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'image' => $image,
                );
                $results[] = $result;
            }
        }
        wp_send_json($results);
    }

    function localize_ajaxurl() {
        wp_localize_script( 'ajax-search', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        wp_localize_script( 'header-ajax-search', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

}

new SearchSlotsPostType;
