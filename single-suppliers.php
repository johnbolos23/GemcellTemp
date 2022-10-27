<?php 
defined( 'ABSPATH' ) || exit;

get_header();

get_template_part('inc/flexible-blocks/breadcrumbs'); ?>

<section class="single-suppliers" id="single-suppliers">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="single-supplier-image">
                    <div class="single-supplier-image-wrapper">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
                    <?php if( get_field('website') ) : ?>
                    <div class="supplier-website">
                        <h4 class="m-0"><b>Website:</b></h4>
                        <p class="m-0"><a href="<?php echo get_field('website'); ?>" target="_blank"><?php echo get_field('website'); ?></a></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="single-supplier-details">
                    <div class="single-supplier-details-wrapper">
                        <?php 
                        $categories = get_the_terms( get_the_ID(), 'suppliers_cat' );
                        $output = '';

                        if( $categories ){
                            echo '<div class="single-supplier-categories">';
                                echo '<h4 class="subheading"><span>';
                            foreach( $categories as $category ) {
                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . ', ';
                            }
                            echo trim( $output, ', ' );
                                echo '</span></h4>';
                            echo '</div>';
                        }
                        ?>

                        <h2 class="heading"><?php the_title(); ?></h2>
                        
                        <div class="wysiwyg-content"><?php echo get_field('description'); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <?php if( get_field('info_blocks') ) : ?>
        <div class="row supplier-info-blocks">
            <?php $counter = 1; foreach( get_field('info_blocks') as $block ) : ?>
            <div class="col-12 col-lg-4">
                <div class="supplier-block-item">
                    <div class="supplier-block-item-wrapper">
                        <img src="<?php echo $block['icon']; ?>" />
                        <h3 class="block-title"><?php echo $block['title']; ?></h3>
                        <div class="wysiwyg-content"><?php echo $block['detail']; ?></div>
                        <?php if( $block['link'] ) : ?>
                        <a href="<?php echo $block['link']['url']; ?>"><?php echo $block['link']['title']; get_template_part('icons/arrow-up'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="supplier-block-border">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/icons/supplier-image/' . $counter .'.jpg'; ?>" />
                    </div>
                </div>
            </div>
            <?php $counter++; if( $counter > 3 ) { $counter = 1; } endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>



<?php get_footer(); ?>