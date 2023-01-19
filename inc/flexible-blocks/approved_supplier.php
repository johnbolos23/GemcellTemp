<section class="page-section approved-supplier" id="approved-supplier-<?php echo get_row_index(); ?>">
    
    <div class="approved-supplier-inner">
        <div class="container">
            <div class="row">
                <div class="col-6 col-a">
                    <h3 class="heading">
                    <?php get_template_part('icons/check'); ?><?php echo get_sub_field('heading'); ?>
                    </h3>
                </div>
                <div class="col-6 col-b">
                    <div class="wysiwyg-content">
                            <?php echo get_sub_field('paragraph'); ?>
                        </div>
                </div>

                <div class="col-12">
                    <?php

                    $args = array(
                            'post_type'      => 'suppliers',
                            'posts_per_page' => '-1',
                            'publish_status' => 'published',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'suppliers_cat',
                                    'field' => 'slug',
                                    'terms' => 'approved-suppliers'
                                )
                             )
                    );
        
                    $query = new WP_Query($args);
        
                    if ($query->have_posts()) : ?>                        
                        <?php while ($query->have_posts()) : $query->the_post();?>
                            <div class="suplier-item">
                                <div class="supplier-item-inner">
                                <a href="<?php echo get_field('website'); ?>" target="_blank">
                                    <div class="suplier-poster"><?php echo get_the_post_thumbnail(); ?></div>
                                    <h5><?php echo get_the_title(); ?></h5>
                                </a>
                                </div>
                            </div>
        
                        <?php endwhile;?>
                    <?php endif; wp_reset_postData();?>

                </div>
            </div>
        </div>
    </div>

</section>

