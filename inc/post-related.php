<?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => array( get_the_ID() )
    );

    $relatedQuery = new WP_Query( $args );

?>
<section class="post-single-related posts-list" id="post-single-related">
    <script>
        jQuery(document).ready(function(){
            jQuery('#post-single-related .post-list-slider').slick({
                centerMode: false,
                centerPadding: "0px",
                slidesToShow: 3,
                dots: false,
                arrows: false,
            });
        });
    </script>
    <div class="container">
        <h2 class="heading">Related News</h2>

        <?php if( $relatedQuery->have_posts() ) : ?>
        <div class="post-single-related-wrapper posts-list-items">
            <div class="post-list-slider">
                <?php while ( $relatedQuery->have_posts() ) :  $relatedQuery->the_post(); ?>
                    <?php get_template_part('inc/helpers/post-list-item', '', array('post_type' => 'post', 'column' => 3, 'show_date' => true, 'show_excerpt' => false, 'show_view_more' => false) ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>