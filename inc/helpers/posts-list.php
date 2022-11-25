<script>
    jQuery(document).ready(function(){
        jQuery('#post-list-slider-<?php echo get_row_index(); ?>').slick({
            centerMode: <?php echo get_sub_field('visible_previous_and_next_items') ? 'true' : 'false'; ?>,
            centerPadding: "<?php echo get_sub_field('visible_previous_and_next_items') ? '120px' : '0px' ; ?>",
            slidesToShow: <?php echo get_sub_field('column') ? get_sub_field('column') : 3; ?>,
            dots: <?php echo get_sub_field('slider_nav_dots') ? 'true' : 'false'; ?>,
            arrows: <?php echo get_sub_field('slider_nav_arrow') ? 'true' : 'false'; ?>,
            prevArrow: '<button class="slick-prev slick-arrow"><svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 2L3.05 11.45L12.5 20.9" stroke="#263238" stroke-width="4"/></svg></button>',
            nextArrow: '<button class="slick-next slick-arrow"><svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 2L10.95 11.45L1.5 20.9" stroke="#263238" stroke-width="4"/></svg></button>',
            responsive: [
                {
                    breakpoint: 9999,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 1300,
                    settings: {
                        arrows: <?php echo get_row_index() == 6 ? 'true' : 'false'; ?>,
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
                        slidesToScroll: 1,
                        prevArrow: '<button class="slick-prev slick-arrow"><svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.97703 1.13161L1.4594 5.64924M1.4594 5.64924L5.97719 10.1669M1.4594 5.64924L13.8337 5.64844" stroke="#263238" stroke-width="2"/></svg></button>',
                        nextArrow: '<button class="slick-next slick-arrow"><svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.76369 1.13161L13.2813 5.64924M13.2813 5.64924L8.76353 10.1669M13.2813 5.64924L0.906982 5.64844" stroke="#263238" stroke-width="2"/></svg></button>',
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
$overlapClass .= get_sub_field('slider_nav_arrow') ? ' hasArrows' : '';
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