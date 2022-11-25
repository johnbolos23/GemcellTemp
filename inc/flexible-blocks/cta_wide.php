<section class="page-section cta-wide" id="cta-wide-<?php echo get_row_index(); ?>">
    <?php 

    get_template_part('inc/style-helper', null, array('target' => '#cta-wide-'. get_row_index() )); 

    ?>
    <div class="container">
        <?php if( get_sub_field('subheading') ) : ?>
        <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
        <?php endif; ?>
        <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>

        <?php if( get_sub_field('link') ) : ?>
        <a href="<?php echo get_sub_field('link')['url'];?>" class="main-button main-button-bordered"><?php echo get_sub_field('link')['title'];?></a>
        <?php endif; ?>
    </div>
</section>