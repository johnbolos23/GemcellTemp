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
            <div class="col-12 col-lg-6 col-xxl-7">
                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
            </div>
            <div class="col-12 col-lg-6 col-xxl-5">
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
                        <div class="step-item-image">
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