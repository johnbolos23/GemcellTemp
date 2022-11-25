<section class="page-section general-cta cta-two pos-relative <?php echo get_sub_field('cta_position'); ?>-cta-position" id="general-cta-<?php echo get_row_index(); ?>">
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

        get_template_part('icons/pattern-two'); 

    ?>


    <div class="general-cta-wrapper">
        <div class="row">
            <div class="col-5">
                <h2 class="heading">
                    <?php echo get_sub_field('heading'); ?>
                    <!-- Terms and Conditions -->
                </h2>
                <div class="wysiwyg-content" style="color:white; display:none;">
                        <?php echo get_sub_field('paragraph'); ?>
                    </div>
                <a class="main-button main-button-blue" href="<?php echo get_sub_field('button')['url']; ?>">
                        <?php echo get_sub_field('button')['title']; get_template_part('icons/arrow-up'); ?>
                </a>
            </div>
            <div class="col-6">
                <div class="general-cta-buttons-wrapper">
                    <div class="wysiwyg-content" style="color:white;">
                        <?php echo get_sub_field('paragraph'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>