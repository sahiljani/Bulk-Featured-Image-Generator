<?php


function bulk_image_generator_Oweight() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">


    <input type='number' name='bulk_image_generator_options[bulk_image_generator_Oweight]'
        value='<?php echo $options["bulk_image_generator_Oweight"]; ?>' required>
</div>
<?php }



function bulk_image_generator_Ocolor() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">


    <input type='color' name='bulk_image_generator_options[bulk_image_generator_Ocolor]'
        value='<?php echo $options["bulk_image_generator_Ocolor"]; ?>' required>
</div>
<?php }






function bulk_image_generator_Oopacity() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">


    <input type='range' min="0" max="100" name='bulk_image_generator_options[bulk_image_generator_Oopacity]'
        value='<?php echo $options["bulk_image_generator_Oopacity"]; ?>' required>
</div>
<?php }





function bulk_image_generator_Oblur() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">


    <input type='number' name='bulk_image_generator_options[bulk_image_generator_Oblur]'
        value='<?php echo $options["bulk_image_generator_Oblur"]; ?>' required>
</div>
<?php }

function bulk_image_generator_Bcolor() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">


    <input type='color' name='bulk_image_generator_options[bulk_image_generator_Bcolor]'
        value='<?php echo $options["bulk_image_generator_Bcolor"]; ?>' required>
</div>
<?php }

function bulk_image_generator_Bopacity() {

    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">


    <input type='range' min="0" max="100" name='bulk_image_generator_options[bulk_image_generator_Bopacity]'
        value='<?php echo $options["bulk_image_generator_Bopacity"]; ?>' required>
</div>
<?php }