<?php

namespace classes;

class CustomPostTypes
{
    public function __construct(){
        add_action( 'init', [$this, 'NAME'] );
    }

    public function kappers(): void{
        register_post_type('NAME', array(
            'labels'             => array(
                'name'               => 'Change_this',
                'singular_name'      => 'Change_this',
                'add_new'            => 'Add Change_this',
                'add_new_item'       => 'Add Change_this',
                'edit_item'          => 'Edit Change_this',
                'new_item'           => 'New Change_this',
                'view_item'          => 'View Change_this',
                'search_items'       => 'Search',
                'not_found'          => 'not found',
                'not_found_in_trash' => 'Not found in basket',
                'parent_item_colon'  => '',
                'menu_name'          => 'Change_this'
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
            'supports'           => array('title','editor','thumbnail','page-attributes')
        ) );
    }
}

new CustomPostTypes;