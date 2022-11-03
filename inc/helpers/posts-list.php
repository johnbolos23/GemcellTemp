<script>
    jQuery(document).ready(function(){
        jQuery('#post-list-slider-<?php echo get_row_index(); ?>').slick({
            centerMode: <?php echo get_sub_field('visible_previous_and_next_items') ? 'true' : 'false'; ?>,
            centerPadding: "<?php echo get_sub_field('visible_previous_and_next_items') ? '120px' : '0px' ; ?>",
            slidesToShow: <?php echo get_sub_field('column') ? get_sub_field('column') : 3; ?>,
            dots: <?php echo get_sub_field('slider_nav_dots') ? 'true' : 'false'; ?>,
            arrows: <?php echo get_sub_field('slider_nav_arrow') ? 'true' : 'false'; ?>,
            responsive: [
                {
                    breakpoint: 9999,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: <?php echo get_sub_field('post_type') == 'competition' ? 2 : 3; ?>,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
<?php
$columns = get_sub_field('column') ? get_sub_field('column') : 3;

$postType = get_sub_field('post_type') ? get_sub_field('post_type') : 'post';
$showDate = get_sub_field('show_date');
$showExcerpt = get_sub_field('show_excerpt');
$showViewMore = get_sub_field('show_view_more');

$overlapClass = get_sub_field('visible_previous_and_next_items') ? 'has-overlap' : '';

$args = array(
    'post_type' => $postType
);

if( get_sub_field('post_type') == 'post' && get_sub_field('category') ){
    $args['cat'] = get_sub_field('category');
}

$theQuery = new WP_Query( $args );

if( $theQuery->have_posts() ){
    echo '<div class="post-list-slider '. $overlapClass .'" id="post-list-slider-'. get_row_index() .'">';

    while( $theQuery->have_posts() ){
        $theQuery->the_post();

        get_template_part('inc/helpers/post-list-item', null, array('column' => $columns, 'post_type' => $postType, 'show_date' => $showDate, 'show_excerpt' => $showExcerpt, 'show_view_more' => $showViewMore ));
    }

    echo '</div>';

    wp_reset_postdata();
}else{

}

?>