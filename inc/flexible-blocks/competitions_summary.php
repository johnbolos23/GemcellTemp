<section class="page-section posts-list competitions-summary" id="competitions-summary-<?php echo get_row_index(); ?>">
    
    <div class="post-list-inner">
        <div class="container">
            <div class="posts-list-items">
                <div class="posts-list-upper-custom">
                    <div class="search-container">
                        <form action="gemcell/competitions" method="GET">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <aside class="ja-filter-dropdwn-form" >
                        <form class="js-filter-form">
                            <select name="categories">


                            <?php
                                $categories = get_terms( array(
                                'taxonomy' => 'competition_tax',
                                'hide_empty' => true,
                                    'orderby' => 'title',
                                ) );
                                ?>
                                <option class="js-filter-cat-text" value="" disabled selected>Select Category</option>
                                <?PHP
                                foreach ($categories as $cat):?>
                                    <option class="js-filter-item" value="<?= $cat->term_id; ?>"><?= $cat->name;?></option>
                                <?php endforeach;?>
                            </select>
                        </form>
                    </aside>	

                </div>
                <div class="js-filter"></div>
                <div class="row post-list-cont">


                    <?php

                        $args = array(
                            'post_type'      => 'competition',
                            'posts_per_page' => '6',
                            'publish_status' => 'published',
                            'order' => 'ASC',
                        );

                        if( isset($_GET['search']) ){
                            $args['s'] = $_GET['search'];
                        }

                        $query = new WP_Query($args);

                        if ($query->have_posts()) : ?>                        
                            <?php while ($query->have_posts()) : $query->the_post();?>

                            <div class="col-12">
                                <div class="post-list-item-wrapper">
                                    <div class="post-list-item-image-title">
                                        <?php if( $args['post_type'] == 'competition' ) : ?>
                                        <div class="post-list-item-title-wrapper style-<?php echo get_field('shade_style'); ?>">
                                            <div class="post-list-item-title-inner-wrapper">
                                                <?php the_title(); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="post-list-item-image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    </div>
                                    <?php 
                                        $categories = get_the_terms( get_the_ID(), 'competition_tax' );
                                        $output = '';

                                        if( $categories ){  ?>
                                                <div class="post-list-item-meta">
                                                    <span>
                                                <?php foreach( $categories as $category ) {
                                                    $output .= '<a>' . esc_html( $category->name ) . '</a>' . ', ';
                                                    // output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . ', ';
                                                }
                                                echo trim( $output, ', ' ); ?>
                                                    </span>
                                                </div>
                                                <?php
                                            }
                                    ?>
                                    <h3 class="heading"><?php echo get_the_title(); ?></h3>

                                    <div class="post-list-item-link">
                                        <a href="<?php the_permalink( get_the_ID() ); ?>">View More <?php get_template_part('icons/arrow-up-blue'); ?></a>
                                    </div>
                                
                                </div>
                            </div>

                            <?php endwhile;?>
                            <div class="custom-pagination">
                                <?php
                            echo paginate_links(array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $query->max_num_pages,
                                'current'      => max(1, get_query_var( 'paged' ) ),
                                'format'       => '?paged=%#%',
                                'show_all'     => false,
                                'type'         => 'plain',
                                //'end_size'     => 2,
                                'end_size'     => 3,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
                                'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
                                'add_args'     => false,
                                'add_fragment' => '',
                            ));?>
                            </div>

                        <?php endif; wp_reset_postData();?>

                    
        
                </div>
            </div>
        </div>
    </div>
</div>