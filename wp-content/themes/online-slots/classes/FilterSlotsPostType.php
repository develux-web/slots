<?php

namespace classes;

class FilterSlotsPostType
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array($this, 'localize_ajaxurl'));
        add_action('wp_ajax_filter_slots', array($this, 'filter_slots_callback'));
        add_action('wp_ajax_nopriv_filter_slots', array($this, 'filter_slots_callback'));
    }

    public function localize_ajaxurl() {
        wp_localize_script( 'ajax-filter', 'filter_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

    public function filter_slots_callback() {
        $posts = isset($_GET['posts']) ? (int) $_GET['posts'] : 1;
        $features = $_GET['features'];
        $themes = $_GET['themes'];
        $sort = $_GET['sort'];

        $args = array(
            'post_type' => 'slots',
            'posts_per_page' => $posts,
        );

        if (!empty($features)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'features',
                'field' => 'slug',
                'terms' => $features,
            );
        }
        if (!empty($themes)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'themes',
                'field' => 'slug',
                'terms' => $themes,
            );
        }

        if($sort == 'ASC' || $sort == 'DESC') {
            $args['orderby'] = 'title';
            $args['order'] = $sort;
        } elseif ($sort === 'rating') {
            $args['meta_key'] = 'game_rating';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
        }

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
                    'rating' => get_field('game_rating'),
                );

                $results[] = $result;
            }
        }

        $response = array(
            'results' => $results,
            'max_num_pages' => $query->max_num_pages,
            'posts' => $posts,
            'all_posts' => $this->count_posts(),
        );

        wp_send_json($response);
    }

    public function count_posts() {
        $args = array(
            'post_type' => 'slots',
            'posts_per_page' => -1,
            'fields' => 'ids',
        );

        $query = new \WP_Query($args);
        $count = $query->post_count;

        return $count;
    }

}

new FilterSlotsPostType;
