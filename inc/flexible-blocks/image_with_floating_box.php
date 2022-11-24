<section class="page-section image-floating-box" id="image-floating-box-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            'floating-box-wrapper' => array(
                'background-color' => get_sub_field('color')
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#image-floating-box-'. get_row_index(), 'additional' => $additionalStyles )); 

    ?>
    <div class="container">
        <div class="row m-0 pos-relative">
            <div class="col-12 col-lg-9 p-0">
                <img src="<?php echo get_sub_field('image'); ?>" />
            </div>
            <div class="col-12 col-lg-3 p-0"></div>
            <div class="floating-box p-0">
                <div class="floating-box-wrapper pos-relative">
                    <?php get_template_part('icons/floating-box-top-icon'); ?>

                    <?php if( get_sub_field('subheading') ) : ?>
                    <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                    <?php endif; ?>

                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>

                    <?php if( get_sub_field('content') ) : ?>
                    <div class="wysiwyg-content">
                        <?php echo get_sub_field('content'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>