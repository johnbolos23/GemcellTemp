<section class="page-section information-with-video" id="information-with-video-<?php echo get_row_index(); ?>">
    <?php 
    get_template_part('inc/style-helper', null, array('target' => '#information-with-video-'. get_row_index() )); 
    ?>
    <div class="container">
        <div class="information-with-video-wrapper">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="<?php echo get_sub_field('logo'); ?>" />
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                    <div class="wysiwyg-content"><?php echo get_sub_field('text_one'); ?></div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                    <div class="wysiwyg-content"><?php echo get_sub_field('text_two'); ?></div>
                </div>
                <div class="col-12">
                    <div class="information-with-video-video pos-relative">
                        <img src="<?php echo get_sub_field('video')['thumbnail_image']; ?>" />
                        <div class="video-popup-trigger">
                            <?php get_template_part('icons/play-icon'); ?>
                            <h4><?php echo get_sub_field('video')['video_title']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>