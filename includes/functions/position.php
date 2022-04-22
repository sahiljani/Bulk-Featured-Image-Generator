<?php


function bulk_image_generator_posX() {
    $options = get_option('bulk_image_generator_options'); ?>

<div class="input_container">

    <input type='number' name='bulk_image_generator_options[bulk_image_generator_posX]'
        value='<?php echo $options["bulk_image_generator_posX"]; ?>' required>
</div>
<?php }


function bulk_image_generator_posY() {
    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <input type='number' name='bulk_image_generator_options[bulk_image_generator_posY]'
        value='<?php echo $options["bulk_image_generator_posY"]; ?>' required>
</div>
<?php }

function bulk_image_generator_align() {
    $options = get_option('bulk_image_generator_options'); ?>
<div class="input_container">

    <select class="el-scrollbar__view el-select-dropdown__optionst"
        name="bulk_image_generator_options[bulk_image_generator_align]" required>
        <!---->
        <option class="el-select-dropdown__item"
            <?php if ($options['bulk_image_generator_align'] == 'center') echo ' selected="selected"'; ?>
            value="center">Center
        </option>
        <option class="el-select-dropdown__item hover" value="left"
            <?php if ($options['bulk_image_generator_align'] == 'left') echo ' selected="selected"'; ?>>Left</option>
        <option class="el-select-dropdown__item" value="right"
            <?php if ($options['bulk_image_generator_align'] == 'right') echo ' selected="selected"'; ?>>Right</option>

    </select>
</div>

<?php }




function bulk_image_generator_position_gravity() {

    $options = get_option('bulk_image_generator_options');

?>
<div class="input_container">

    <select class="el-scrollbar__view el-select-dropdown__optionst"
        name="bulk_image_generator_options[bulk_image_generator_position_gravity]" required>
        <!---->
        <option class="el-select-dropdown__item"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'center') echo ' selected="selected"'; ?>
            value="center">
            Center
        </option>
        <option class="el-select-dropdown__item hover" value="north"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'north') echo ' selected="selected"'; ?>>
            North</option>
        <option class="el-select-dropdown__item" value="south"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'south') echo ' selected="selected"'; ?>>
            South</option>
        <option class="el-select-dropdown__item" value="east"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'east') echo ' selected="selected"'; ?>>East
        </option>
        <option class="el-select-dropdown__item" value="west"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'west') echo ' selected="selected"'; ?>>West
        </option>
        <option class="el-select-dropdown__item" value="northeast"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'northeast') echo ' selected="selected"'; ?>>
            Northeast
        </option>
        <option class="el-select-dropdown__item" value="northwest"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'northwest') echo ' selected="selected"'; ?>>
            Northwest
        </option>
        <option class="el-select-dropdown__item" value="southeast"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'southeast') echo ' selected="selected"'; ?>>
            Southeast
        </option>
        <option class="el-select-dropdown__item" value="southwest"
            <?php if ($options['bulk_image_generator_position_gravity'] == 'southwest') echo ' selected="selected"'; ?>>
            Southwest
        </option>
    </select>
</div>
<?php }


function bulk_image_generator_posTitle() {
    echo "<h2>Position options</h2>";
}