<section class="page-section news" id="news-<?php echo get_row_index(); ?>">
    
    <div class="news-inner">
        <div class="container-inner">
            <div class="row">
                <div class="col-6 col-a">
                    <h3 class="heading">
                    <?php echo get_sub_field('heading'); ?>
                    </h3>
                </div>
                <div class="col-6 col-b">
                    
                </div>

                <div class="col-12">
                    
                    <?php

                    $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => '-1',
                            'publish_status' => 'published',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => 'news'
                                )
                             )
                    );
        
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) : ?>          
                    <div class="owl-carousel news-slider winners owl-theme">              
                        <?php while ($query->have_posts()) : $query->the_post();?>
                            <div class="news-item">
                                <div class="news-item-inner">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <div class="news-poster"><?php echo get_the_post_thumbnail(); ?></div>
                                    <h5><?php echo get_the_title(); ?></h5>
                                </a>
                                </div>
                            </div>
        
                        <?php endwhile;?>
                    </div>
                    <?php endif; wp_reset_postData();?>

                </div>
            </div>
        </div>
    </div>

</section>

