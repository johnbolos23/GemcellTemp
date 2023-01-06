<section class="page-section image-ad" id="image-ad-<?php echo get_row_index(); ?>">
    <div class="row">
        <div class="ads">
            <?php if( get_sub_field('ad_link') ) : ?>
                <a href="<?php echo get_sub_field('ad_link'); ?>">
                    <?php endif; ?>
                    <img src="<?php echo get_sub_field('ads'); ?>"/>
                    <?php if( get_sub_field('ad_link') ) : ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>