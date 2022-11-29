<section class="page-section section-banner" id="banner-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            'banner-content-wrapper' => array(
                'background-color' => get_sub_field('color')
            ),
            'heading' => array(
                'font-size' => '72px'
            ),
            'wysiwyg-content' => array(
                'font-size' => '20px'
            ),
            'wysiwyg-content *' => array(
                'font-size' => '20px'
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#banner-'. get_row_index(), 'additional' => $additionalStyles )); 

    ?>
    <div class="row m-0">
        <div class="col-12 col-lg-5 p-0">
           <div class="banner-content-wrapper pos-relative">
                <span class="icon-top"><?php get_template_part('icons/banner-content-icon-top'); ?></span>
                <span class="icon-bottom"><?php get_template_part('icons/banner-content-icon-bottom'); ?></span>

                <?php if( get_sub_field('subheading') ) : ?>
                <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                <?php endif; ?>

                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>

                <?php if( get_sub_field('content') ) : ?>
                <div class="wysiwyg-content">
                    <?php echo get_sub_field('content'); ?>
                </div>
                <?php endif; ?>

                <?php if( get_sub_field('content') ) : ?>
                <div class="banner-link-list">
                    <?php foreach( get_sub_field('link_list') as $item ) : ?>
                    <div class="banner-link-list-item">
                        <a href="<?php echo $item['link']; ?>">
                            <img src="<?php echo $item['icon']; ?>" />
                            <span><?php echo $item['title']; ?></span>
                            <?php get_template_part('icons/arrow-up'); ?>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
           </div> 
        </div>
        <div class="col-12 col-xl-12 col-xxl-12 p-0">
            <div class="banner-image-wrapper pos-absolute">
                <img src="<?php echo get_sub_field('image'); ?>" class="<?php echo get_sub_field('image_laptops') ? 'd-lg-none': 'd-block'; ?>" />
                <?php if( get_sub_field('image_laptops') ) : ?>
                <img src="<?php echo get_sub_field('image_laptops'); ?>" class="<?php echo get_sub_field('image_tablet') ? 'd-md-none': 'd-lg-block'; ?>" />
                <?php endif; ?>
                <?php if( get_sub_field('image_tablet') ) : ?>
                <img src="<?php echo get_sub_field('image_tablet'); ?>" class="<?php echo get_sub_field('image_mobile') ? 'd-sm-none': 'd-md-block'; ?>" />
                <?php endif; ?>
                <?php if( get_sub_field('image_mobile') ) : ?>
                <img src="<?php echo get_sub_field('image_mobile'); ?>" class="d-block <?php echo get_sub_field('image_tablet') ? 'd-md-none': 'd-lg-block'; ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>