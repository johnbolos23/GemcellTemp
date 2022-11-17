<?php
    $key = $args['key'];
    $step = $args['step']['content_type_-_logo'];
?>
<section class="page-section our-suppliers-section has-overlay-top <?php echo $key != 0 ? 'hide' : ''; ?>" id="our-suppliers-section-<?php echo $key; ?>">
    <div class="container">
        <div class="our-suppliers-content overlap-top">
            <div class="our-suppliers-content-wrapper">
                <div class="text-center">
                    <h2 class="heading"><?php echo $step['heading']; ?></h2>
                    <?php if( $step['content'] ) : ?>
                    <div class="wysiwyg-content"><?php echo $step['content']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="suppliers-gallery">
                    <?php if( $step['logos'] ) : ?>
                    <div class="row">
                        <?php foreach( $step['logos'] as $gallery ) : ?>
                        <div class="col-4 col-lg-2">
                            <img src="<?php echo $gallery; ?>" />
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>