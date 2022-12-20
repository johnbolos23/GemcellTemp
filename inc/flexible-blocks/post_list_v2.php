<section class="page-section posts-list" id="posts-list-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => false
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#posts-list-'. get_row_index(), 'additional' => $additionalStyles )); 

    $overlapClass = get_sub_field('visible_previous_and_next_items') ? 'has-overlap' : '';

    ?>
    <div class="container">
        <div class="posts-list-top">
            <div class="row align-items-end justify-content-between">
                <div class="col-12 col-md-6">
                    <?php if( get_sub_field('subheading') ) : ?>
                    <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                    <?php endif; ?>
                    
                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                </div>
                <div class="col-3 text-right d-flex d-md-fex justify-content-end gap-2">
                    <a href="#" class="secondary-button secondary-button-bordered" data-btn="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path d="M6.81487 0.822139L1.93583 5.70118M1.93583 5.70118L6.81504 10.5803M1.93583 5.70118L15.3001 5.70031" stroke="#263238" stroke-width="2"/>
                        </svg>
                    </a>
                    <a href="#" class="secondary-button secondary-button-bordered" data-btn="next">
                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.18513 0.822139L14.0642 5.70118M14.0642 5.70118L9.18496 10.5803M14.0642 5.70118L0.699882 5.70031" stroke="#263238" stroke-width="2"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="posts-list-items <?php echo $overlapClass; ?>">
            <?php get_template_part('inc/helpers/posts-list'); ?>
        </div>

       
    </div>
</section>