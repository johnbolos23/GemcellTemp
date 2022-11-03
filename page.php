<?php 
defined( 'ABSPATH' ) || exit;

get_header();


if( have_rows('flexible_content') ){
    
    while( have_rows('flexible_content') ) : the_row();

        get_template_part( 'inc/flexible-blocks/' . get_row_layout() );

    endwhile;
    
}else{
    the_content();
}

?>

<?php if( is_page(630) ) : ?>

<section class="post-single-newsletter" id="post-single-newsletter" style="<?php if( get_field('post_single_bg_image','option') ) : ?>background-image: url(<?php echo get_field('post_single_bg_image','option'); ?>);<?php endif;?> color: <?php echo get_field('post_single_text_color','option'); ?>;">
    <div class="container text-center">
        <h2 class="heading"><?php echo get_field('post_single_heading','option'); ?></h2>
        <div class="wysiwyg-content"><?php echo get_field('post_single_text','option'); ?></div>
        <div class="main-footer-newsletter-wrapper">
            <?php gravity_form( get_field('post_single_form','option') );?>
        </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>