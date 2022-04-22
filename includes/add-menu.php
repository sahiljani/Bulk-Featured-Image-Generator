<?php


function bulk_image_generator_add_menu() {


    add_submenu_page(
        'options-general.php',
        'Featured Image Generator',
        'Featured Image Generator',
        'manage_options',
        'bulk-image-generator',
        'bulk_image_generator_front_end'
    );


    add_submenu_page(
        'options-general.php',
        'Featured Image Generator2',
        'Featured Image Generator2',
        'manage_options',
        'bulk-image-generator2',
        'bulk_image_generator_front_end2'
    );


    // add_submenu_page( parent_slug, page_title, menu_title, capability, menu_slug, function )
}




add_action('admin_menu', 'bulk_image_generator_add_menu');


function bulk_image_generator_front_end2() {
}