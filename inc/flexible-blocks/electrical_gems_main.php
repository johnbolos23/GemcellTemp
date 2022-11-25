<section class="page-section electrical-gems-main" id="electrical-gems-main-<?php echo get_row_index(); ?>">
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
                <!-- <a href="#" class="main-button main-button-bordered">View More <?php get_template_part('icons/arrow-up'); ?></a> -->
            </div>
        </div>
    </div>

    <?php 

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $per_page = get_option( 'posts_per_page' );
        $format  = isset( $format ) ? $format : '';
        
        $args = array(
            'post_type' => 'post',
            // 'posts_per_page' => get_sub_field('limit') ? get_sub_field('limit') : -1,
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'paged' => $paged,
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


        get_template_part('inc/helpers/posts-grid-main', '', array('theQuery' => $theQuery ));
        
    ?>
            <div class="pagination-col-custom">
        <?php
        
            echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $theQuery->max_num_pages,
                        'current'      => max( 1, $paged ),
                        'format'       => $format,
                        'type'         => 'plain',
                        'end_size'     => 3,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => '<i class="fa fa-chevron-left"></i>',
                        'next_text'    => '<i class="fa fa-chevron-right"></i>',
                        'add_args'     => false,
            ) ); ?>
            
        </div>
</section>