<?php
    $key = $args['key'];
    $step = $args['step']['content_type_-_text_and_images'];
?>
<section class="page-section our-suppliers-section has-overlay-top <?php echo $key != 0 ? 'hide' : ''; ?>" id="our-suppliers-section-<?php echo $key; ?>">
    <div class="container">
        <div class="our-suppliers-content overlap-top">
            <div class="our-suppliers-content-wrapper">
                <div class="text-center">
                    <h2 class="heading mb-5"><?php echo $step['heading']; ?></h2>
                    <?php if( $step['content'] ) :  ?>
                    <div class="wysiwyg-content full"><?php echo $step['content']; ?></div>
                    <?php endif; ?>

                    <?php if( $step['images'] ) : ?>
                    <div class="our-supplier-text-images-wrapper">
                        <?php foreach( $step['images'] as $image ) : ?>
                        <div class="image-wrapper"><img src="<?php echo $image; ?>" /></div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>