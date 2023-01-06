<section class="page-section cta-box" id="cta-box-<?php echo get_row_index(); ?>">
    <div class="row">
        <div class="col-xl-7 content">
            <?php echo get_sub_field('content'); ?>
        </div>
        <div class="col-xl-5 cta-button">
            <?php if( get_sub_field('button') ) : ?>
                <a class="btn" href="<?php echo get_sub_field('button')['url']; ?>"><?php echo get_sub_field('button')['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>