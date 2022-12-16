
<section class="page-section preferred-supplier members-list" id="members-list-<?php echo get_row_index(); ?>">
    
    <div class="preferred-supplier-inner members-list-inner">
        <div class="container">
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
                            'post_type'      => 'gemcell_members',
                            'posts_per_page' => '-1',
                            'publish_status' => 'published',
                            'order' => 'ASC',
                            
                    );
        
                    $query = new WP_Query($args);
        
                    if ($query->have_posts()) : ?>                        
                        <?php while ($query->have_posts()) : $query->the_post();?>
                            <div class="members-item">
                                <div class="members-item-inner">
                                <a href="<?php echo get_post_permalink(); ?>">
                                    <div class="members-poster"><img src="<?php echo get_field('logo'); ?>" /></div>
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

