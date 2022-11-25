<section class="page-section image-with-icons" id="image-with-icons-<?php echo get_row_index(); ?>">
    <?php

    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            ' ' => array(
                'background-color' => get_sub_field('color'),
            ),
            'icon-title' => array(
                'color' => get_sub_field('heading_color'),
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#image-with-icons-'. get_row_index(), 'additional' => $additionalStyles ) ); 

    ?>
    <div class="container">
        <div class="row <?php echo get_sub_field('image_position') == 'right' ? 'flex-row-reverse': ''; ?>">
            <div class="col-12 col-lg-6 col-xxl-4 image-with-icons-image">
                <img src="<?php echo get_sub_field('image'); ?>" />
            </div>
            <div class="col-12 col-lg-6 col-xxl-8 align-self-xxl-center">
                <div class="image-with-icons-content">
                    <?php if( get_sub_field('subheading') ) : ?>
                    <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                    <?php endif; ?>

                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>

                    <?php if( get_sub_field('icons') ) : ?>
                    <div class="image-with-icons-wrapper">
                        <div class="row">
                            <?php foreach( get_sub_field('icons') as $icon ) : ?>
                            <div class="col-12 col-lg-6">
                                <img src="<?php echo $icon['icon']; ?>" />
                                <h4 class="icon-title"><b><?php echo $icon['title']; ?></b></h4>
                                <?php if( $icon['description'] ) : ?>
                                <div class="wysiwyg-content"><?php echo $icon['description']; ?></div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>