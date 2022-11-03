<section class="page-section posts-list" id="posts-list-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => false
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#posts-list-'. get_row_index(), 'additional' => $additionalStyles )); 

    ?>
    <div class="container">
        <div class="posts-list-top">
            <div class="row align-items-end">
                <div class="col-12 col-md-6">
                    <?php if( get_sub_field('subheading') ) : ?>
                    <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                    <?php endif; ?>

                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
                </div>
                <div class="col-6 text-right d-none d-lg-block">
                    <a href="<?php echo get_sub_field('button')['url']; ?>" class="main-button main-button-bordered"><?php echo get_sub_field('button')['title']; get_template_part('icons/arrow-up'); ?></a>
                </div>
            </div>
        </div>

        <div class="posts-list-items">
            <?php get_template_part('inc/helpers/posts-list'); ?>
        </div>

        <div class="d-block d-lg-none text-left">
            <a href="<?php echo get_sub_field('button')['url']; ?>" class="main-button main-button-bordered"><?php echo get_sub_field('button')['title']; get_template_part('icons/arrow-up'); ?></a>
        </div>
    </div>
</section>