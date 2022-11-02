<section class="page-section image-with-text" id="image-with-text-<?php echo get_row_index(); ?>">
    
    <div class="image-with-text-inner">
        <div class="container">
            <div class="row">
                <div class="col-6 col-a">
                    <img src="<?php echo get_sub_field('image'); ?>" />
                </div>
                <div class="col-6 col-b">
                    <h4 class="subheading">
                        <span><?php echo get_sub_field('subheading'); ?></span>
                    </h4>
                    <h2 class="heading">
                        <?php echo get_sub_field('heading'); ?>
                    </h2>
                    <div class="wysiwyg-content">
                            <?php echo get_sub_field('paragraph'); ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

</section>

