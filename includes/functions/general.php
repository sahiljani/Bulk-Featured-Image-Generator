<?php
function bulk_image_generator_width() {
    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='number' name='bulk_image_generator_options[bulk_image_generator_width]'
        value='<?php echo $options["bulk_image_generator_width"]; ?>' required>
</div>
<?php }

function bulk_image_generator_wordwrap() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='range' name='bulk_image_generator_options[bulk_image_generator_wordwrap]'
        value='<?php echo $options["bulk_image_generator_wordwrap"]; ?>' required>
</div>
<?php }


function bulk_image_generator_text() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='text' name='bulk_image_generator_options[bulk_image_generator_text]'
        value='<?php echo $options["bulk_image_generator_text"]; ?>' required>
</div>
<?php }

function bulk_image_generator_url() {
    $options = get_option('bulk_image_generator_options');
?>

<div class="input_container">

    <input type='text' name='bulk_image_generator_options[bulk_image_generator_url]'
        value='<?php echo $options["bulk_image_generator_url"]; ?>' required>
</div>
<?php }




function bulk_image_generator_color() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='color' name='bulk_image_generator_options[bulk_image_generator_color]'
        value='<?php echo $options["bulk_image_generator_color"]; ?>' required>
</div>
<?php }









function bulk_image_generator_height() {
    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='number' name='bulk_image_generator_options[bulk_image_generator_height]'
        value='<?php echo $options["bulk_image_generator_height"]; ?>' required>
</div>
<?php }



function bulk_image_generator_opacity() {
    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='range' name='bulk_image_generator_options[bulk_image_generator_opacity]'
        value='<?php echo $options["bulk_image_generator_opacity"]; ?>' required>

    <?php }