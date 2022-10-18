<section class="page-section testimonial-section" id="testimonial-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => true,
        'parameters' => array(
            'name' => array(
                'color' => get_sub_field('heading_color'),
            ),
            'position' => array(
                'color' => get_sub_field('heading_color'),
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#testimonial-'. get_row_index(), 'additional' => $additionalStyles  ) ); 

    ?>
    <div class="container">
        <div class="testimonials-wrapper">
            <div class="testimonial-slider">
                <?php foreach( get_sub_field('testimonials') as $testimony ) : ?>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                        <div class="testimonial-item-image">
                            <img src="<?php echo $testimony['image']; ?>" />
                        </div>
                        <div class="testimonial-item-details">
                            <h4 class="subheading"><span>Testimonials</span></h4>
                            <h2 class="heading"><?php echo $testimony['testimonial_details']['message']; ?></h2>
                            <div class="testimony-name">
                                <h4 class="name"><?php echo $testimony['testimonial_details']['name']; ?></h4>
                                <p class="position"><?php echo $testimony['testimonial_details']['position']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>