<?php

namespace classes;

class CustomPostTypes
{
    public function __construct(){
        add_action( 'init', [$this, 'slots'] );
        add_action( 'init', [$this, 'casino'] );
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
}

new CustomPostTypes;
