<section class="page-section general-cta pos-relative <?php echo get_sub_field('cta_position'); ?>-cta-position" id="general-cta-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            'general-cta-wrapper' => array(
                'background-color' => get_sub_field('color')
            ),
        )
    );
    
    get_template_part('inc/style-helper', null, array('target' => '#general-cta-'. get_row_index(), 'additional' => $additionalStyles )); 
    
    get_template_part('icons/cta-abstract'); 
    
    ?>

    <div class="general-cta-wrapper">
        <div class="row">
            <div class="col-12 col-lg-8">
                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
            </div>
            <div class="col-12 col-lg-4">
                <div class="general-cta-buttons-wrapper">
                    <?php if( get_sub_field('button_one') ) : ?>
                    <a class="main-button" href="<?php echo get_sub_field('button_one')['url']; ?>">
                        <?php echo get_sub_field('button_one')['title']; get_template_part('icons/arrow-up'); ?>
                    </a>
                    <?php endif; ?>
                    <?php if( get_sub_field('button_two') ) : ?>
                    <a class="main-button main-button-blue" href="<?php echo get_sub_field('button_two')['url']; ?>">
                        <?php echo get_sub_field('button_two')['title']; get_template_part('icons/arrow-up'); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>