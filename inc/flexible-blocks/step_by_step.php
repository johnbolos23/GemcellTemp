<?php
$hasParentSteps = false;

foreach( get_sub_field('steps') as $key => $step ){
    if( $step['is_a_substep'] ){
        $hasParentSteps = true;
    }
}
?>

<section class="page-section step-by-step" id="step-by-step-<?php echo get_row_index(); ?>">
    <?php 
    $additionalStyles = array(
        'default_bg' => true,
        'parameters' => array(
            'step-title' => array(
                'color' => get_sub_field('heading_color'),
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#step-by-step-'. get_row_index(), 'additional' => $additionalStyles ) ); 

    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-7 col-xxl-7">
                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5">
                <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
            </div>
        </div>

        <div class="step-by-step-wrapper <?php echo $hasParentSteps ? 'has-step-parent' : ''; ?>">
            <?php if( get_sub_field('steps') ) : ?>
            <div class="step-by-steps">
                <?php foreach( get_sub_field('steps') as $key => $step ) : ?>
                <div class="step-item step-<?php echo $key + 1 . ' '; echo $step['is_a_substep'] ? 'step-is-parent' : ''; ?>">
                    <?php if( $step['is_a_substep'] ) { get_template_part('icons/line-left-arrow'); } ?>
                    <div class="step-item-wrapper text-center">
                        <style>#step-by-step-<?php echo get_row_index(); ?> .step-item.step-<?php echo $key + 1 . ' '; ?> .step-item-image:hover, #step-by-step-<?php echo get_row_index(); ?> .step-item.step-<?php echo $key + 1 . ' '; ?> .step-item-image.active{ background: <?php echo $step['color_on_hover']; ?>; }</style>
                        <div class="step-item-image <?php echo $key == 0 ? 'active' : ''; ?>" data-step-content="our-suppliers-section-<?php echo $key; ?>">
                            <img src="<?php echo $step['icon']; ?>" />
                        </div>
                        <h4 class="step-title"><?php echo $step['title']; ?></h4>
                    </div>
                    <?php if( ( count( get_sub_field('steps') ) != ( $key + 1 ) ) && !$step['is_a_substep'] ) : ?>
                        <?php get_template_part('icons/line-arrow'); ?>
                    <?php endif; ?>

                    <?php if( $step['is_a_substep'] ) { get_template_part('icons/line-right-arrow'); } ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php foreach( get_sub_field('steps') as $key => $step ){
    if( $step['content_layout'] == 'logos' ){
        get_template_part('inc/helpers/step-content-logo', '' , array('step' => $step, 'key' => $key ));
    }else if( $step['content_layout'] == 'image_text' ){
        get_template_part('inc/helpers/step-content-image-text', '' , array('step' => $step, 'key' => $key ));
    }else{
        get_template_part('inc/helpers/step-content-text-images', '' , array('step' => $step, 'key' => $key ));
    }
    
} ?>

