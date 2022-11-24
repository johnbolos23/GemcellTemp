<?php 

get_template_part('inc/style-helper', null, array('target' => '#archived-gems-'. get_row_index() )); 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$format  = isset( $format ) ? $format : '';
$prevSVG = '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.22 6.71997C0.0793075 6.57946 0.000175052 6.38882 0 6.18997V5.80997C0.00230401 5.61156 0.081116 5.4217 0.22 5.27997L5.36 0.149974C5.45388 0.055318 5.58168 0.0020752 5.715 0.0020752C5.84832 0.0020752 5.97612 0.055318 6.07 0.149974L6.78 0.859974C6.87406 0.952138 6.92707 1.07828 6.92707 1.20997C6.92707 1.34166 6.87406 1.46781 6.78 1.55997L2.33 5.99997L6.78 10.44C6.87466 10.5339 6.9279 10.6617 6.9279 10.795C6.9279 10.9283 6.87466 11.0561 6.78 11.15L6.07 11.85C5.97612 11.9446 5.84832 11.9979 5.715 11.9979C5.58168 11.9979 5.45388 11.9446 5.36 11.85L0.22 6.71997Z" fill="#BCBCBC"/></svg>';
$nextSVG = '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.78 6.71997C6.92069 6.57946 6.99982 6.38882 7 6.18997V5.80997C6.9977 5.61156 6.91888 5.4217 6.78 5.27997L1.64 0.149974C1.54612 0.055318 1.41832 0.0020752 1.285 0.0020752C1.15168 0.0020752 1.02388 0.055318 0.93 0.149974L0.22 0.859974C0.125936 0.952138 0.0729284 1.07828 0.0729284 1.20997C0.0729284 1.34166 0.125936 1.46781 0.22 1.55997L4.67 5.99997L0.22 10.44C0.125343 10.5339 0.0721006 10.6617 0.0721006 10.795C0.0721006 10.9283 0.125343 11.0561 0.22 11.15L0.93 11.85C1.02388 11.9446 1.15168 11.9979 1.285 11.9979C1.41832 11.9979 1.54612 11.9446 1.64 11.85L6.78 6.71997Z" fill="#263238"/></svg>';

$args = array(
    'post_type' => 'archive_gems',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => 'featured',
            'value' => 1
        ),
    )
);

$theFeatured = new WP_Query( $args );

$args = array(
    'post_type' => 'archive_gems',
    'post_status' => 'publish',
    'posts_per_page' => get_option( 'posts_per_page' ),
    'paged' => $paged
);

$theQuery = new WP_Query( $args );

?>

<section class="page-section archived-gems" id="archived-gems-<?php echo get_row_index(); ?>">
    <div class="container">
        <?php if( $theFeatured->have_posts() ) : $theFeatured->the_post(); ?>
            <div class="archive-gems-featured">
                <div class="archive-gems-featured-wrapper">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="archive-gems-image-wrapper">
                                <div class="archive-item-image-gallery" id="lightgallery-feat-<?php echo get_the_ID(); ?>">
                                    <a href="<?php echo get_the_post_thumbnail_url(); ?>">
                                        <?php echo get_the_post_thumbnail(); ?>
                                    </a>
                                    <?php if( get_field('contents') ) : ?>
                                    <?php foreach( get_field('contents') as $gallery ) : ?>
                                    <a href="<?php echo $gallery; ?>" style="display: none;">
                                        <img src="<?php echo $gallery; ?>" />
                                    </a>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="archive-gems-featured-details">
                                <h4 class="subheading"><span>Out Now</span></h4>
                                <h2 class="heading"><?php echo get_the_title(); ?></h2>
                                <div class="wysiwyg-content">
                                    <p><b>Current Issue</b></p>
                                    <p><b><?php echo get_the_title(); ?></b></p>
                                    <p><?php echo get_field('date_start'); ?></p>
                                </div>
                                <a href="#" class="main-button main-button-bordered view-archive-toggle">View Issue</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="archive-gems-block-border">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/icons/supplier-image/4.jpg'; ?>" />
                </div>
            </div>
        <?php endif; wp_reset_postdata(); ?>

        <?php if( $theQuery->have_posts() ) : ?>
            <div class="archive-gems-posts">
                <div class="row">
                    <?php while( $theQuery->have_posts() ) : $theQuery->the_post(); ?>
                    <div class="col-6 col-lg-3">
                        <div class="archive-gems-post-item">
                            <div class="archive-item-image-gallery" id="lightgallery-<?php echo get_the_ID(); ?>">
                                <a href="<?php echo get_the_post_thumbnail_url(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                                </a>
                                <?php if( get_field('contents') ) : ?>
                                <?php foreach( get_field('contents') as $gallery ) : ?>
                                <a href="<?php echo $gallery; ?>" style="display: none;">
                                    <img src="<?php echo $gallery; ?>" />
                                </a>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <div class="archive-gems-post-item-details">
                                <div class="archive-gems-post-item-meta">
                                    <?php $theTerms = get_the_terms( get_the_ID(), 'archive_tax' ); ?>
                                    <?php foreach( $theTerms as $category ) : ?>
                                    <span><a href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></span>
                                    <?php endforeach; ?>

                                    <span class="archive-gems-post-item-date"><?php echo get_field('date_start'); ?></span>
                                </div>
                                <h3 class="heading"><?php echo get_the_title(); ?></h3>
                                <div class="wysiwyg-content"><?php echo get_field('issue_number'); ?></div>
                                <a href="#" class="view-issue view-archive-toggle">View Issue <?php get_template_part('icons/arrow-up'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

                <?php if( $theQuery->found_posts > get_option( 'posts_per_page' ) ) : ?>
                <div class="archive-gems-pagination">
                    <div class="pagination">
                        <?php if( $paged == 1 ) : ?>
                            <span class="prev page-numbers">
                                <span><?php echo $prevSVG ?></span>
                            </span>
                        <?php endif; ?>
                        <?php echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $theQuery->max_num_pages,
                                'current'      => max( 1, $paged ),
                                'format'       => $format,
                                'type'         => 'plain',
                                'end_size'     => 3,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => '<span>'. $prevSVG .'</span>',
                                'next_text'    => '<span>'. $nextSVG .'</span>',
                                'add_args'     => false,
                            ) );
                        ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>