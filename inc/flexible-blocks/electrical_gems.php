<section class="page-section electrical-gems" id="electrical-gems-<?php echo get_row_index(); ?>">
    <?php 

    get_template_part('inc/style-helper', null, array('target' => '#electrical-gems-'. get_row_index() )); 

    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <?php if( get_sub_field('subheading') ) : ?>
                <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                <?php endif; ?>

                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
            </div>
            <div class="col-12 col-lg-6 text-right">
                <a href="https://gemcelldev.wpengine.com/latest-news/" class="main-button main-button-bordered">View More <?php get_template_part('icons/arrow-up'); ?></a>
            </div>
        </div>
    </div>
    <?php 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => get_sub_field('limit') ? get_sub_field('limit') : -1,
            'post_status' => 'publish'
        );

        if( get_sub_field('display') == 'featured' ){
            $args['meta_query'] = array(
                array(
                    'key' => 'set_as_featured',
                    'value' => 1
                ),
            );
        }else if( get_sub_field('display') == 'category' ){
            $args['cat'] = get_sub_field('category');
        }

        $theQuery = new WP_Query( $args );

        if( get_sub_field('layout') == 'slider' ){
            get_template_part('inc/helpers/posts-slider', '', array('theQuery' => $theQuery ));
        }else if( get_sub_field('layout') == 'grid' ){
            get_template_part('inc/helpers/posts-grid', '', array('theQuery' => $theQuery ));
        }else{
            get_template_part('inc/helpers/posts-list2', '', array('theQuery' => $theQuery ));
        }
    ?>
</section>