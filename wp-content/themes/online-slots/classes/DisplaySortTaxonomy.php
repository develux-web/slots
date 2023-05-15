<?php

namespace classes;

const TAX   = 'providers';

class DisplaySortTaxonomy
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array($this, 'localize_ajaxurl'));
        add_action('wp_ajax_load_providers', array($this, 'load_providers_callback'));
        add_action('wp_ajax_nopriv_load_providers', array($this, 'load_providers_callback'));

    }

    public function load_providers_callback() {
        $sort = $_GET['sort'];

        $args = array(
            'taxonomy' => TAX,
            'hide_empty' => false,
        );

        if($sort == 'ASC' || $sort == 'DESC') {
            $args['orderby'] = 'name';
            $args['order'] = $sort;
        }

        $providers = get_terms($args);

        $providers_array = array();

        foreach ($providers as $provider) {
            $providers_array[] = array(
                'name' => $provider->name,
                'slug' => $provider->slug,
                'count' => $provider->count,
                'image' => get_field('image', TAX . '_' . $provider->term_id),
            );
        }

        $response = array(
            'providers' => $providers_array,
            'max_num_pages' => 0,
            'posts' => 0,
            'all_terms' => $this->countTerms(),
        );

        echo json_encode($response);
        wp_die();
    }

    public function localize_ajaxurl() {
        wp_localize_script( 'load_taxonomy', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

    public function countTerms() {
        $count = wp_count_terms( TAX, array(
            'hide_empty' => false,
        ) );

        return $count;
    }

}

new DisplaySortTaxonomy;
