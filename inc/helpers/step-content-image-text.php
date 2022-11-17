<?php
    $key = $args['key'];
    $step = $args['step']['content_type_-_image_and_text'];
?>
<section class="page-section our-suppliers-section has-overlay-top <?php echo $key != 0 ? 'hide' : ''; ?>" id="our-suppliers-section-<?php echo $key; ?>">
    <div class="container">
        <div class="our-suppliers-content overlap-top">
            <div class="our-suppliers-content-wrapper">
                <div class="row align-items-center <?php echo $step['image_position'] == 'right' ? 'flex-row-reverse' : ''; ?>">
                    <div class="col-12 col-lg-5">
                        <img src="<?php echo $step['image']; ?>" />
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="overlay-content">
                            <h2 class="heading"><?php echo $step['heading']; ?></h2>
                            <?php if( $step['content'] ) : ?>
                            <div class="wysiwyg-content"><?php echo $step['content']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>