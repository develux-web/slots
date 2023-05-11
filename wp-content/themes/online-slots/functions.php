<?php
include_once 'classes/ThemeConfiguration.php';
include_once 'classes/CustomPostTypes.php';


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => '404 page',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}
