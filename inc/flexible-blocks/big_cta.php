<?php 

$additionalStyles = array(
    'default_bg' => false,
    'parameters' => array(
        'big-cta-wrapper' => array(
            'background-image' => 'url('.get_sub_field('image').')',
            'background-size' => 'cover',
            'background-repeat' => 'no-repeat',
            'background-position' => 'center'
        ),
        'position' => array(
            'color' => get_sub_field('heading_color'),
        )
    )
); 

get_template_part('inc/style-helper', null, array('target' => '#big-cta-'. get_row_index(), 'additional' => $additionalStyles  ) ); 

?>

<section class="page-section big-cta" id="big-cta-<?php echo get_row_index(); ?>">
    <div class="container">
        <div class="big-cta-wrapper text-center">
            <?php if( get_sub_field('subheading') ) : ?>
            <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
            <?php endif; ?>

            <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>

            <div class="big-cta-buttons d-flex align-items-center justify-content-center">
                <?php if( get_sub_field('button_one') ) : ?>
                <a href="<?php echo get_sub_field('button_one')['url']; ?>" class="main-button"><?php echo get_sub_field('button_one')['title']; get_template_part('icons/arrow-up'); ?></a>
                <?php endif; ?>

                <?php if( get_sub_field('button_two') ) : ?>
                <a href="<?php echo get_sub_field('button_two')['url']; ?>" class="main-button <?php echo get_sub_field('button_one') ? 'main-button-blue' : ''; ?>"><?php echo get_sub_field('button_two')['title']; get_template_part('icons/arrow-up'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>