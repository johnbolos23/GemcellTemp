<section class="page-section text-list" id="text-list-<?php echo get_row_index(); ?>">
    
    <div class="text-list-inner">
        <div class="container">
            <div class="row">
                <div class="text-list-top-content">
                    <div class="col-a">
                        <h4 class="heading">
                            <?php echo get_sub_field('heading'); ?>
                        </h4>
                    </div>
                    <div class="col-b">
                        <div class="wysiwyg-content">
                            <?php echo get_sub_field('paragraph'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-list-inner">
                        <?php if( get_sub_field('icon_text_list') ) : ?>
                            <?php foreach( get_sub_field('icon_text_list') as $block ) : ?>
                                <div class="step-col">
                                    <img src="<?php echo $block['icon_image']; ?>" /> 
                                    <div class="step-col-inner-content">                          
                                        <span><?php echo $block['title']; ?></span>
                                        <div class="wysiwyg-content">
                                            <?php echo $block['description']; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

