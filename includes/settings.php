<?php


function fold($input, $lineSize, $lineArray) {
    if (isset($lineArray)) {
        $lineArray = $lineArray;
    } else {
        $lineArray =  [];
    }



    if (strlen($input) <= $lineSize) {
        array_push($lineArray, $input);

        return $lineArray;
    }


    array_push($lineArray, substr($input, 0, $lineSize));

    $tail = substr($input, $lineSize);

    return fold($tail, $lineSize, $lineArray);
}




function setnow($id) {
    $options = get_option('bulk_image_generator_options');
    $wordwrap =  $options["bulk_image_generator_wordwrap"];
    $image_url = $options["bulk_image_generator_url"] . '?';
    $image_ur_arr['text'] =  join("  \n", fold(sanitize_file_name(get_the_title($id)), (int)$wordwrap, null));
    $image_ur_arr['text.color'] =  str_replace("#", "", $options["bulk_image_generator_color"]);
    $image_ur_arr['text.opacity'] = $options["bulk_image_generator_opacity"];
    $image_ur_arr['text.position.gravity'] =  $options["bulk_image_generator_position_gravity"];
    $image_ur_arr['text.size'] =  $options["bulk_image_generator_font_size"];
    // position
    $image_ur_arr['text.position.x'] =   $options["bulk_image_generator_posX"];
    $image_ur_arr['text.position.y'] =  $options["bulk_image_generator_posY"];
    $image_ur_arr['text.align'] =  $options["bulk_image_generator_align"];
    $image_ur_arr['text.font.family'] =  $options["bulk_image_generator_FFamily"];
    $image_ur_arr['text.font.style'] =  $options["bulk_image_generator_Fstyle"];
    $image_ur_arr['text.font.weight'] =  $options["bulk_image_generator_Fweight"];
    $image_ur_arr['text.width'] =  $options["bulk_image_generator_width"];
    $image_ur_arr['text.size'] =  $options["bulk_image_generator_Fsize"];
    $image_ur_arr['text.height'] =  $options["bulk_image_generator_height"];



    $image_ur_arr['text.outline.width'] =  $options["bulk_image_generator_Oweight"];
    $image_ur_arr['text.outline.opacity'] =  $options["bulk_image_generator_Oopacity"];
    $image_ur_arr['text.outline.color'] =  str_replace("#", "",  $options["bulk_image_generator_Ocolor"]);
    $image_ur_arr['text.outline.blur'] =  $options["bulk_image_generator_Oblur"];
    $image_ur_arr['text.background.color'] = str_replace("#", "",  $options["bulk_image_generator_Bcolor"]);
    $image_ur_arr['text.background.opacity'] =  $options["bulk_image_generator_Bopacity"];









    // "text.background.opacity": bulk_image_generator_Bopacity,

    $image_url .= http_build_query($image_ur_arr, '', '&');

    $image_name       = 'a' . sha1(rand()) . 'a.png';



    $upload_dir       = wp_upload_dir(); // Set upload folder.
    $image_data       = file_get_contents($image_url); // Get image data

    $unique_file_name = wp_unique_filename($upload_dir['path'], $image_name); // Generate unique name
    $filename         = basename($unique_file_name); // Create image file name
    $post_id          = $id;

    // Check folder permission and define file location
    if (wp_mkdir_p($upload_dir['path'])) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    // Create the image  file on the server
    file_put_contents($file, $image_data);

    // Check image file type
    $wp_filetype = wp_check_filetype($filename, null);

    // Set attachment data
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit'

    );

    // Create the attachment
    $attach_id = wp_insert_attachment($attachment, $file, $post_id);

    // Include image.php
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    // Define attachment metadata
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);

    // Assign metadata to attachment
    wp_update_attachment_metadata($attach_id, $attach_data);

    // And finally assign featured image to post
    set_post_thumbnail($post_id, $attach_id);


    return '<a href="' . get_permalink($id) . '">' . get_the_title($id) . '</a>';
}