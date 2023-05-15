<?php

namespace classes;

const POST_TYPE   = 'casino';

class FilterCasinoPostType
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array($this, 'localize_ajaxurl'));
        add_action('wp_ajax_filter_casino', array($this, 'filter_casino_callback'));
        add_action('wp_ajax_nopriv_filter_casino', array($this, 'filter_casino_callback'));
    }

    public function localize_ajaxurl() {
        wp_localize_script( 'ajax-filter-' . POST_TYPE, 'filter_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

    public function filter_casino_callback() {
        $posts = isset($_GET['posts']) ? (int) $_GET['posts'] : 1;
        $providers = $_GET['providers'];
        $languages = $_GET['languages'];
        $pokies = $_GET['pokies'];
        $payment = $_GET['payment'];
        $sort = $_GET['sort'];

        $args = array(
            'post_type' => POST_TYPE,
            'posts_per_page' => $posts,
        );

        if (!empty($providers)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'providers',
                'field' => 'slug',
                'terms' => $providers,
            );
        }

        if (!empty($languages)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'languages',
                'field' => 'slug',
                'terms' => $languages,
            );
        }

        if (!empty($pokies)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'free-pokies',
                'field' => 'slug',
                'terms' => $pokies,
            );
        }

        if (!empty($payment)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'payment-methods',
                'field' => 'slug',
                'terms' => $payment,
            );
        }

        if($sort == 'ASC' || $sort == 'DESC') {
            $args['orderby'] = 'title';
            $args['order'] = $sort;
        } elseif ($sort === 'rating') {
            $args['meta_key'] = 'casino_rating';
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
                    'title' => get_field('casino_name'),
                    'permalink' => get_permalink(),
                    'image' => $image,
                    'rating' => get_field('casino_rating'),
                    'play_demo' => get_field('play_demo'),
                    'get_bonus' => get_field('get_bonus'),
                    'sub_title' => get_field('casino_title'),
                    'casino_check' => $this->listFormats(get_field('casino_check')),
                    'payments' => $this->listTaxonomyFormats('payment-methods'),
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
            'post_type' => POST_TYPE,
            'posts_per_page' => -1,
            'fields' => 'ids',
        );

        $query = new \WP_Query($args);

        return $query->post_count;
    }

    public function listFormats($rows) {
        $list = '';
        foreach( $rows as $row ) {
            $list .= '<li>'.$row['casino_check_item'].'</li>';
        }
        return $list;
    }

    public function listTaxonomyFormats($taxonomy) {
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ) );

        foreach( $terms as $term ) {
            $term_link = get_term_link($term);
            $image = get_field('image', $taxonomy . '_' . $term->term_id);
            $list .= '<li><a href="/casino/?payment='.$term->slug.'"><img src="'.$image.'" alt="'.$term->name.'"></a></li>';
        }
        return $list;
    }


}

new FilterCasinoPostType;
