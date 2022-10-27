<section class="page-title group-box" id="group-box-<?php echo get_row_index(); ?>">
    
    <div class="group-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-12" style="text-align:center;">
                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                    <div class="wysiwyg-content">
                         <?php echo get_sub_field('sub_text'); ?>
                    </div>
                </div>
                <?php if( get_sub_field('textbox_grid') ) : ?>
                    <?php foreach( get_sub_field('textbox_grid') as $block ) : ?>
                    <div class="col-6">

                        <img src="<?php echo $block['image']; ?>" />
                        <div class="group-box-content-main">
                            <div class="group-box-content">

                                <span><?php echo $block['points']; ?></span>
                                <div class="wysiwyg-content">
                                    <?php    
                                        if( $block['description'] ) {
                                            echo $block['description'];
                                        } else {
                                            echo '';
                                        }                                    
                                    ?>
                                </div>
                            </div>
                        

                            <div class="logo-list">
                                <!-- <?php echo var_dump( $block['logo']); ?> -->


                                <?php if( $block['logo'] ) : ?>
                                    <?php foreach( $block['logo'] as $innerblock ) : ?>
                                        <img src="<?php echo $innerblock['logo_item']; ?>" />
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                
            </div>
        </div>
    </div>

</section>

