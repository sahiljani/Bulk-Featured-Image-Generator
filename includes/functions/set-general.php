<?php


function get_all_post() {


    $args = array(
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
    // $posts = get_posts($args);
    $posts = new WP_Query($args);


    foreach ($posts as $p) :
        echo "<p>";
        echo get_the_title($p->ID);
        echo "</p>";
    endforeach;
}


function set_all_post() {
?>

<div class="set_all_output">
</div>
<?php }

function set_button_featured() {
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


    $mainposts = new WP_Query($args__thumbnail_id);

    $all_idlist = array();
    foreach ($mainposts as $mainp) :
        array_push($all_idlist, $mainp->ID);
    endforeach;

?>


<button class="action-btn" id="sbmtbtn">Generate</button>

<input type="hidden" value="<?php echo json_encode($all_idlist); ?>" id="idlist">
<?php }