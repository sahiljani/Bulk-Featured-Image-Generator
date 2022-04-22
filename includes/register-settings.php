<?php

function bulk_image_generator_init() {

    register_setting("bulk_image_generator_set_image", "bulk_image_generator_set_image");
    add_settings_section("bulk_image_generator_set_section", "Set Options", "bulk_image_generator_set_section_callback", "bulk_image_generator_set_image");
    add_settings_field('set_all_post', __('', 'set_all_post'), 'set_all_post', 'bulk_image_generator_set_image', 'bulk_image_generator_set_section');
    add_settings_field('set_button_featured', __('Run Now', 'set_button_featured'), 'set_button_featured', 'bulk_image_generator_set_image', 'bulk_image_generator_set_section');



    register_setting("bulk_image_generator_options", "bulk_image_generator_options");
    add_settings_section("bulk_image_generator_sections", "General Options", "bulk_image_generator_section_callback", "bulk_image_generator_options");
    add_settings_field('bulk_image_generator_text', __('Enter Text:', 'bulk_image_generator_text'), 'bulk_image_generator_text', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_wordwrap', __('Word Wrap:', 'bulk_image_generator_wordwrap'), 'bulk_image_generator_wordwrap', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_url', __('Enter URL:', 'bulk_image_generator_url'), 'bulk_image_generator_url', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Fsize', __('Enter Font Size:', 'bulk_image_generator_Fsize'), 'bulk_image_generator_Fsize', 'bulk_image_generator_options', 'bulk_image_generator_sections');

    add_settings_field('bulk_image_generator_color', __('Colors:', 'bulk_image_generator_color'), 'bulk_image_generator_color', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_width', __('Enter width:', 'bulk_image_generator_width'), 'bulk_image_generator_width', 'bulk_image_generator_options', 'bulk_image_generator_sections');

    add_settings_field('bulk_image_generator_height', __('Enter Height:', 'bulk_image_generator_height'), 'bulk_image_generator_height', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_opacity', __('Enter Opacity:', 'bulk_image_generator_opacity'), 'bulk_image_generator_opacity', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_posX', __('Enter  Position X:', 'bulk_image_generator_posX'), 'bulk_image_generator_posX', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_posY', __('Enter Position Y:', 'bulk_image_generator_posY'), 'bulk_image_generator_posY', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_align', __('Enter Align:', 'bulk_image_generator_align'), 'bulk_image_generator_align', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_position_gravity', __('Position Gravity:', 'bulk_image_generator_position_gravity'), 'bulk_image_generator_position_gravity', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Fstyle', __('Enter Font Style:', 'bulk_image_generator_Fstyle'), 'bulk_image_generator_Fstyle', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Ffamily', __('Enter Font Family:', 'bulk_image_generator_Ffamily'), 'bulk_image_generator_Ffamily', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Fweight', __('Enter Font Style:', 'bulk_image_generator_Fweight'), 'bulk_image_generator_Fweight', 'bulk_image_generator_options', 'bulk_image_generator_sections');


    add_settings_field('bulk_image_generator_Oweight', __('Outline width:', 'bulk_image_generator_Oweight'), 'bulk_image_generator_Oweight', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Ocolor', __('Outline color:', 'bulk_image_generator_Ocolor'), 'bulk_image_generator_Ocolor', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Oopacity', __('Outline Opacity:', 'bulk_image_generator_Oopacity'), 'bulk_image_generator_Oopacity', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Oblur', __('Outline Blur:', 'bulk_image_generator_Oblur'), 'bulk_image_generator_Oblur', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Bcolor', __('Background color:', 'bulk_image_generator_Bcolor'), 'bulk_image_generator_Bcolor', 'bulk_image_generator_options', 'bulk_image_generator_sections');
    add_settings_field('bulk_image_generator_Bopacity', __('Background Opacity:', 'bulk_image_generator_Bopacity'), 'bulk_image_generator_Bopacity', 'bulk_image_generator_options', 'bulk_image_generator_sections');
}
add_action('admin_init', 'bulk_image_generator_init');



function bulk_image_generator_set_section_callback() {
}



function bulk_image_generator_section_callback() {
}


function my_saved_post($post_id, $xml_node, $is_update) {


    setnow($post_id);
}


function setfeatured() {
    $args = array(
        'numberposts'       => -1,
    );
    $posts = get_posts($args);
    foreach ($posts as $p) :
        setnow($p->ID);
    endforeach;
}

function ajax_setfeatured() {
    wp_send_json_success(setnow($_POST['setfeatured']));
}


add_action('pmxi_saved_post', 'my_saved_post', 10, 3);

add_action('wp_ajax_setfeatured', 'ajax_setfeatured');