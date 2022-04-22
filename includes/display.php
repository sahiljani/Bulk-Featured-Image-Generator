<?php






function bulk_image_generator_front_end() {
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
?>
<nav class="nav-tab-wrapper">
    <a href="?page=bulk-image-generator"
        class="nav-tab <?php if ($tab === null) : ?>nav-tab-active<?php endif; ?>">Generate</a>
    <a href="?page=bulk-image-generator&tab=settings"
        class="nav-tab <?php if ($tab === 'settings') : ?>nav-tab-active<?php endif; ?>">Settings</a>

</nav>
<?php

    if ($tab == "settings") {
    ?>


<div class="form_container">


    <form action='options.php' method='post'>
        <?php

                settings_fields('bulk_image_generator_options');
                do_settings_sections('bulk_image_generator_options');
                submit_button();

                ?>
    </form>
    <div class="image_container">
        <?php $options = get_option('bulk_image_generator_options'); ?>
        <img src="<?php echo $options["bulk_image_generator_url"]; ?>" id="render_img">
    </div>
</div>
<?php


    } else {
        settings_fields('bulk_image_generator_set_image');
        // custom_do_settings_sections('bulk_image_generator_set_image');
    ?>

<div class="flex space-around-center">
    <div class="metercontainer">
        <div id="doughnutChart" class="chart"></div>
    </div>
    <div class="metadetails">

        <?php

                $count_posts = wp_count_posts();

                if ($count_posts) {
                    $published_posts = $count_posts->publish;
                }

                $without = array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'post',
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'value' => '?',
                            'compare' => 'NOT EXISTS'
                        )
                    ),

                );

                $with = array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'post',
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        )
                    ),

                );
                $without_featureimage_posts = new WP_Query($without);
                $with_featureimage_posts = new WP_Query($with);


                ?>

        <p>Total Number Of Posts: <span id="published_posts"> <?php echo $published_posts; ?></span></p>

        <input type="hidden" name="without_featured" value="<?php echo $without_featureimage_posts->post_count; ?> ">
        <input type="hidden" name="with_featured" value="<?php echo $with_featureimage_posts->post_count; ?> ">
        <input type="hidden" name="with_featured">


        <?php
                $args__thumbnail_id = array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'post',
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'value' => '?',
                            'compare' => 'NOT EXISTS'
                        )
                    ),
                );
                $posts = get_posts($args__thumbnail_id);
                $idlist = array();
                foreach ($posts as $p) :
                    array_push($idlist, $p->ID);
                endforeach;
                if (!empty($idlist)) {
                    echo '  <button class="action-btn" id="sbmtbtn">Generate</button>';
                }


                ?>


        <input type="hidden" value="<?php echo json_encode($idlist); ?>" id="idlist">


        <!-- <button>Save</button> -->
    </div>
</div>
<div class="post_preview">
    <div id="set_all_output">

    </div>
</div>
<?php
    }
}