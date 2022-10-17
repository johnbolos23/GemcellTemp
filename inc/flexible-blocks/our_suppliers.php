<?php

$additionalStyles = array(
    'default_bg' => get_sub_field('overlap_to_top_section') ? false : true,
    'parameters' => array(
        'our-suppliers-content' => array(
            'background-color' => get_sub_field('color'),
        )
    )
); 

get_template_part('inc/style-helper', null, array('target' => '#our-suppliers-section-'. get_row_index(), 'additional' => $additionalStyles ) ); 

?>


<section class="page-section our-suppliers-section <?php echo get_sub_field('overlap_to_top_section') ? 'has-overlay-top': ''; ?>" id="our-suppliers-section-<?php echo get_row_index(); ?>">
    <div class="container">
        <div class="our-suppliers-content <?php echo get_sub_field('overlap_to_top_section') ? 'overlap-top': ''; ?>">
            <div class="our-suppliers-content-wrapper">
                <div class="text-center">
                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                    <?php if( get_sub_field('content') ) : ?>
                    <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="suppliers-gallery">
                    <?php if( get_sub_field('suppliers') ) : ?>
                    <div class="row">
                        <?php foreach( get_sub_field('suppliers') as $gallery ) : ?>
                        <div class="col-4 col-lg-<?php echo 12 / get_sub_field('item_per_row'); ?>">
                            <img src="<?php echo $gallery; ?>" />
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if( get_sub_field('see_all_button') && get_sub_field('show_see_all_button') ) : ?>
                <div class="text-center see-all-button-wrapper">
                    <a class="main-button main-button-blue" href="<?php echo get_sub_field('see_all_button')['url']; ?>"><?php echo get_sub_field('see_all_button')['title']; get_template_part('icons/arrow-up');?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>