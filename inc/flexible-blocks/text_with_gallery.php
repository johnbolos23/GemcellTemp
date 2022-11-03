<section class="page-section text-gallery" id="text-gallery-<?php echo get_row_index(); ?>">
    <?php
    get_template_part('inc/style-helper', null, array('target' => '#text-gallery-'. get_row_index() ) ); 

    ?>
    <div class="text-gallery-content">
        <div class="container">
            <div class="row">
                <?php if( get_sub_field('subheading') ) : ?>
                <div class="col-12">
                    <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                </div>
                <?php endif; ?>
                <div class="col-12 col-lg-6">
                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                </div>
                <div class="col-12 col-lg-6">
                    <?php if( get_sub_field('content') ) : ?>
                    <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if( get_sub_field('gallery') ) : ?>
    <div class="text-gallery-images">
        <div class="text-gallery-images-slider">
            <?php foreach( get_sub_field('gallery') as $image ) : ?>
            <div class="text-gallery-image-item">
                <img src="<?php echo $image; ?>" />
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>