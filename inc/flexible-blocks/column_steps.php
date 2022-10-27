<section class="page-title column-steps" id="column-steps-<?php echo get_row_index(); ?>">
    
    <div class="column-steps-inner">
        <div class="container">
            <div class="row">


                    <div class="col-6 col-a">
                        <h4 class="subheading">
                            <span><?php echo get_sub_field('subheading'); ?></span>
                        </h4>
                        <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                        <img src="<?php echo get_sub_field('column_image'); ?>" />
                    </div>

                    <div class="col-6 col-b">
                    <?php if( get_sub_field('steps') ) : ?>
                        <?php foreach( get_sub_field('steps') as $block ) : ?>
                            <div class="step-col">
                                <img src="<?php echo $block['step_image']; ?>" /> 
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

                    <?php if( get_sub_field('button') ) : ?>
                                <a href="<?php echo get_sub_field('button')['url']; ?>" class="main-button main-button-blue"><?php echo get_sub_field('button')['title']; get_template_part('icons/arrow-up'); ?></a>
                    <?php endif; ?>

            </div>
        </div>
    </div>

</section>

