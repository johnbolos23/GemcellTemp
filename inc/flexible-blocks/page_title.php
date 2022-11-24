<?php 
if( get_sub_field('use_image_as_heading') ){
    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            'image-heading-container ' => array(
                'background-image' => 'url('. get_sub_field('image') .')',
                'background-size' => 'cover',
                'background-repeat' => 'no-repeat'
            )
        )
    ); 
}else{
    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            'page-title-wrapper' => array(
                'background-color' => get_sub_field('color'),
            )
        )
    ); 
}


get_template_part('inc/style-helper', null, array('target' => '#page-title-'. get_row_index(), 'additional' => $additionalStyles  ) ); 
?>

<section class="page-title" id="page-title-<?php echo get_row_index(); ?>">
    <?php if( get_sub_field('use_image_as_heading') && get_sub_field('image_heading') ) : ?>
    <div class="image-heading-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="page-title-image-heading">
                        <img src="<?php echo get_sub_field('image_heading'); ?>" />
                    </div>
                </div>
                <div class="col-12 col-lg-6"></div>
            </div>
        </div>
    </div>
    <?php else : ?>
    <div class="row m-0">
        <div class="col-12 col-md-5 p-0">
            <div class="page-title-wrapper pos-relative">
                <span class="icon-top"><?php get_template_part('icons/banner-content-icon-top'); ?></span>

                <h1 class="heading"><?php echo get_sub_field('heading') ? get_sub_field('heading') : get_the_title(); ?></h1>
            </div>
        </div>
        <div class="col-12 col-md-7 p-0">
            <div class="page-title-image pos-relative">
                <img src="<?php echo get_sub_field('image'); ?>" />
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php get_template_part('inc/flexible-blocks/breadcrumbs'); ?>
</section>