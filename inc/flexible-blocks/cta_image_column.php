<section class="page-section cta-image-column" id="cta-image-column-<?php echo get_row_index(); ?>">
    
    <div class="cta-image-column-inner">
        <div class="container">
            <div class="row">


                    <div class="col-6 col-a">
                        <div class="cta-image-column-content-main">
                            <div class="cta-image-column-content">

                                <h4 class="subheading">
                                    <span><?php echo get_sub_field('subheading'); ?></span>
                                </h4>
                                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                                <div class="wysiwyg-content">
                                    <?php    
                                        if( get_sub_field('paragraph') ) {
                                            echo get_sub_field('paragraph');
                                        } else {
                                            echo '';
                                        }                                    
                                    ?>
                                </div>

                                <?php if( get_sub_field('button') ) : ?>
                                <a href="<?php echo get_sub_field('button')['url']; ?>" class="main-button"><?php echo get_sub_field('button')['title']; get_template_part('icons/arrow-up'); ?></a>
                                <?php endif; ?>
                            </div>
                        

                            <div class="logo-list">
                                <!-- <?php echo var_dump( $block['logo']); ?> -->


                                <?php if( get_sub_field('logo_list') ) : ?>
                                    <?php foreach( get_sub_field('logo_list') as $block ) : ?>
                                        <img src="<?php echo $block['logo_image']; ?>" />
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-b">
                        <img src="<?php echo get_sub_field('column_image'); ?>" />
                    </div>

            </div>
        </div>
    </div>

</section>

