<section class="page-section social-cards" id="social-cards-<?php echo get_row_index(); ?>">
    <?php

    get_template_part('inc/style-helper', null, array('target' => '#social-cards-'. get_row_index() ) ); 

    ?>
    <div class="container">
        <div class="row social-card-items">
            <?php foreach( get_sub_field('socials') as $social ) : ?>
            <div class="col-12 col-lg-6">
                <div class="social-card-wrapper" style="background-color: <?php echo $social['color']; ?>">
                    <div class="d-flex flex-wrap align-items-start">
                        <img src="<?php echo $social['icon']; ?>" />
                        <div class="social-card-details">
                            <h3 class="heading"><?php echo $social['text']; ?></h3>
                            <a href="<?php echo $social['link']['url']; ?>" class=""><?php echo $social['link']['title']; get_template_part('icons/arrow-up'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>