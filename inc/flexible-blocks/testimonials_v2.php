<section class="page-section testimonials-v2" id="testimonials-v2-<?php echo get_row_index(); ?>">
    <?php 
    get_template_part('inc/style-helper', null, array('target' => '#testimonials-v2-'. get_row_index() )); 
    ?>
    <div class="container">
        <div class="testimonials-top-text">
            <?php if( get_sub_field('subheading') ) : ?>
            <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
            <?php endif; ?>

            <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
        </div>

        <div class="testimonials-content">
            <div class="testimonials-slider">
                <?php foreach( get_sub_field('testimonials') as $testimony ) : ?>
                <div class="testimonial-item">
                    <div class="testimonial-item-wrapper">
                        <div class="testimonial-item-image-name">
                            <img src="<?php echo $testimony['image']; ?>" />
                            <div class="testimonial-item-name">
                                <h4 class="testimony-name"><?php echo $testimony['name']; ?></h4>
                                <p class="testimony-position"><?php echo $testimony['position']; ?></p>
                            </div>
                        </div>
                        <div class="wysiwyg-content"><?php echo $testimony['message']; ?></div>
                        <?php if( $testimony['logo'] ) : ?>
                        <div class="testimony-logo">
                            <img src="<?php echo $testimony['logo']; ?>" />
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>