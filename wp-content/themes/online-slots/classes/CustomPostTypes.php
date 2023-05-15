<?php

namespace classes;

class CustomPostTypes
{
    public function __construct(){
        add_action( 'init', [$this, 'slots'] );
        add_action( 'init', [$this, 'casino'] );
        add_action( 'init', [$this, 'features'] );
        add_action( 'init', [$this, 'themesSlots'] );

        add_action( 'init', [$this, 'providersCasino'] );
        add_action( 'init', [$this, 'languagesCasino'] );
        add_action( 'init', [$this, 'freePokiesCasino'] );
        add_action( 'init', [$this, 'paymentMethodsCasino'] );
    }

    public function slots(): void{
        register_post_type('slots', array(
            'labels'             => array(
                'name'               => 'Slots',
                'singular_name'      => 'Slots',
                'add_new'            => 'Add Slots',
                'add_new_item'       => 'Add Slots',
                'edit_item'          => 'Edit Slots',
                'new_item'           => 'New Slots',
                'view_item'          => 'View Slots',
                'search_items'       => 'Search',
                'not_found'          => 'not found',
                'not_found_in_trash' => 'Not found in basket',
                'parent_item_colon'  => '',
                'menu_name'          => 'Slots'
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'menu_icon'          => 'dashicons-database',
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array('title','thumbnail','page-attributes')
        ) );
    }

    public function casino(): void{
        register_post_type('casino', array(
            'labels'             => array(
                'name'               => 'Casino',
                'singular_name'      => 'Casino',
                'add_new'            => 'Add Casino',
                'add_new_item'       => 'Add Casino',
                'edit_item'          => 'Edit Casino',
                'new_item'           => 'New Casino',
                'view_item'          => 'View Casino',
                'search_items'       => 'Search',
                'not_found'          => 'not found',
                'not_found_in_trash' => 'Not found in basket',
                'parent_item_colon'  => '',
                'menu_name'          => 'Casino'
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'menu_icon'          => 'dashicons-database',
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array('title','thumbnail','page-attributes')
        ) );
    }

    public function features(): void
    {
        register_taxonomy('features', 'slots', [
            'label'        => '',
            'labels'       => [
                'name'              => 'Features',
                'singular_name'     => 'Features',
                'search_items'      => 'Search features',
                'all_items'         => 'All features',
                'view_item '        => 'View features',
                'parent_item'       => 'Parent features',
                'parent_item_colon' => 'Parent features:',
                'edit_item'         => 'Edit features',
                'update_item'       => 'Update features',
                'add_new_item'      => 'Add New features',
                'new_item_name'     => 'New features Name',
                'menu_name'         => 'Features',
                'back_to_items'     => '← Back to Features',
            ],
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,

            'rewrite'           => true,
            'capabilities'      => array(),
            'meta_box_cb'       => null,
            'show_admin_column' => false,
            'show_in_rest'      => null,
            'rest_base'         => null,
        ]);
    }

    public function themesSlots(): void
    {
        register_taxonomy('themes', 'slots', [
            'label'        => '',
            'labels'       => [
                'name'              => 'Themes',
                'singular_name'     => 'Themes',
                'search_items'      => 'Search themes',
                'all_items'         => 'All themes',
                'view_item '        => 'View themes',
                'parent_item'       => 'Parent themes',
                'parent_item_colon' => 'Parent themes:',
                'edit_item'         => 'Edit themes',
                'update_item'       => 'Update themes',
                'add_new_item'      => 'Add New themes',
                'new_item_name'     => 'New themes Name',
                'menu_name'         => 'Themes',
                'back_to_items'     => '← Back to Themes',
            ],
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,

            'rewrite'           => true,
            'capabilities'      => array(),
            'meta_box_cb'       => null,
            'show_admin_column' => false,
            'show_in_rest'      => null,
            'rest_base'         => null,
        ]);
    }

    public function providersCasino(): void
    {
        $name_taxonomy = 'Providers';

        register_taxonomy('providers', 'casino', [
            'label'        => '',
            'labels'       => [
                'name'              => $name_taxonomy,
                'singular_name'     => $name_taxonomy,
                'search_items'      => 'Search ' . $name_taxonomy,
                'all_items'         => 'All ' . $name_taxonomy,
                'view_item '        => 'View ' . $name_taxonomy,
                'parent_item'       => 'Parent ' . $name_taxonomy,
                'parent_item_colon' => 'Parent '  . $name_taxonomy . ':',
                'edit_item'         => 'Edit ' . $name_taxonomy,
                'update_item'       => 'Update '.$name_taxonomy,
                'add_new_item'      => 'Add New '.$name_taxonomy,
                'new_item_name'     => 'New '. $name_taxonomy .' Name',
                'menu_name'         => $name_taxonomy,
                'back_to_items'     => '← Back to ' . $name_taxonomy,
            ],
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,

            'rewrite'           => true,
            'capabilities'      => array(),
            'meta_box_cb'       => null,
            'show_admin_column' => false,
            'show_in_rest'      => null,
            'rest_base'         => null,
        ]);
    }

    public function languagesCasino(): void
    {
        $name_taxonomy = 'Languages';

        register_taxonomy('languages', 'casino', [
            'label'        => '',
            'labels'       => [
                'name'              => $name_taxonomy,
                'singular_name'     => $name_taxonomy,
                'search_items'      => 'Search ' . $name_taxonomy,
                'all_items'         => 'All ' . $name_taxonomy,
                'view_item '        => 'View ' . $name_taxonomy,
                'parent_item'       => 'Parent ' . $name_taxonomy,
                'parent_item_colon' => 'Parent '  . $name_taxonomy . ':',
                'edit_item'         => 'Edit ' . $name_taxonomy,
                'update_item'       => 'Update '.$name_taxonomy,
                'add_new_item'      => 'Add New '.$name_taxonomy,
                'new_item_name'     => 'New '. $name_taxonomy .' Name',
                'menu_name'         => $name_taxonomy,
                'back_to_items'     => '← Back to ' . $name_taxonomy,
            ],
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,

            'rewrite'           => true,
            'capabilities'      => array(),
            'meta_box_cb'       => null,
            'show_admin_column' => false,
            'show_in_rest'      => null,
            'rest_base'         => null,
        ]);
    }

    public function freePokiesCasino(): void
    {
        $name_taxonomy = 'Free pokies';

        register_taxonomy('free-pokies', 'casino', [
            'label'        => '',
            'labels'       => [
                'name'              => $name_taxonomy,
                'singular_name'     => $name_taxonomy,
                'search_items'      => 'Search ' . $name_taxonomy,
                'all_items'         => 'All ' . $name_taxonomy,
                'view_item '        => 'View ' . $name_taxonomy,
                'parent_item'       => 'Parent ' . $name_taxonomy,
                'parent_item_colon' => 'Parent '  . $name_taxonomy . ':',
                'edit_item'         => 'Edit ' . $name_taxonomy,
                'update_item'       => 'Update '.$name_taxonomy,
                'add_new_item'      => 'Add New '.$name_taxonomy,
                'new_item_name'     => 'New '. $name_taxonomy .' Name',
                'menu_name'         => $name_taxonomy,
                'back_to_items'     => '← Back to ' . $name_taxonomy,
            ],
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,

            'rewrite'           => true,
            'capabilities'      => array(),
            'meta_box_cb'       => null,
            'show_admin_column' => false,
            'show_in_rest'      => null,
            'rest_base'         => null,
        ]);
    }

    public function paymentMethodsCasino(): void
    {
        $name_taxonomy = 'Payment methods';

        register_taxonomy('payment-methods', 'casino', [
            'label'        => '',
            'labels'       => [
                'name'              => $name_taxonomy,
                'singular_name'     => $name_taxonomy,
                'search_items'      => 'Search ' . $name_taxonomy,
                'all_items'         => 'All ' . $name_taxonomy,
                'view_item '        => 'View ' . $name_taxonomy,
                'parent_item'       => 'Parent ' . $name_taxonomy,
                'parent_item_colon' => 'Parent '  . $name_taxonomy . ':',
                'edit_item'         => 'Edit ' . $name_taxonomy,
                'update_item'       => 'Update '.$name_taxonomy,
                'add_new_item'      => 'Add New '.$name_taxonomy,
                'new_item_name'     => 'New '. $name_taxonomy .' Name',
                'menu_name'         => $name_taxonomy,
                'back_to_items'     => '← Back to ' . $name_taxonomy,
            ],
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,

            'rewrite'           => true,
            'capabilities'      => array(),
            'meta_box_cb'       => null,
            'show_admin_column' => false,
            'show_in_rest'      => null,
            'rest_base'         => null,
        ]);
    }
}

new CustomPostTypes;
