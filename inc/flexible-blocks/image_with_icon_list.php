<section class="page-title image-with-icon-list" id="image-with-icon-list-<?php echo get_row_index(); ?>">
    
    <div class="image-with-icon-list-inner">
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

                    <div class="icon-list-col">
                        <?php if( get_sub_field('icon_list') ) : ?>
                        <?php foreach( get_sub_field('icon_list') as $block ) : ?>
                            <div class="icon-list-item">

                                <img src="<?php echo $block['icon_image']; ?>" />

                                <div class="list-content">
                                    <h4 class="icon-title">
                                        <?php echo $block['title']; ?>
                                    </h4>
                                    <div class="wysiwyg-content">
                                        <p>
                                            <?php echo $block['description']; ?>
                                        </p>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                    </div>

                    <div class="big-cta-buttons">
                        <?php if( get_sub_field('button_a') ) : ?>
                        <a href="<?php echo get_sub_field('button_a')['url']; ?>" class="main-button"><?php echo get_sub_field('button_a')['title']; get_template_part('icons/arrow-up'); ?></a>
                        <?php endif; ?>

                        <?php if( get_sub_field('button_b') ) : ?>
                        <a href="<?php echo get_sub_field('button_b')['url']; ?>" class="main-button <?php echo get_sub_field('button_b') ? 'main-button-blue' : ''; ?>"><?php echo get_sub_field('button_b')['title']; get_template_part('icons/arrow-up'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

