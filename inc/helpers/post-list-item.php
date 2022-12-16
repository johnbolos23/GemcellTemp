<?php 
    $theTax = $args['post_type'] == 'post' ? 'category' : ( $args['post_type'] == 'competition' ? 'competition_tax' : 'product_cat' );

    $theTerms = get_the_terms( get_the_ID(), $theTax );
?>
<div class="col-12 col-lg-<?php echo 12 / $args['column']; ?>">
    <div class="post-list-item-wrapper <?php echo $args['post_type']; ?>-type">
        <div class="post-list-item-image-title">
            <?php if( $args['post_type'] == 'competition' ) : ?>
            <div class="post-list-item-title-wrapper style-<?php echo get_field('shade_style'); ?>">
                <div class="post-list-item-title-inner-wrapper">
                    <?php the_title(); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="post-list-item-image">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <div class="post-list-item-meta">
            <?php foreach( $theTerms as $category ) : ?>
            <span><a href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></span>
            <?php endforeach; ?>

            <?php if( $args['show_date'] ) : ?>
            <span class="post-list-item-date"><?php echo get_the_date('j F Y'); ?></span>
            <?php endif; ?>
        </div>
        <h3 class="heading"><?php echo get_the_title(); ?></h3>

        <?php if( $args['show_excerpt'] ) : ?>
        <div class="wysiwyg-content">
            <?php echo get_the_content(); ?>
        </div>
        <?php endif; ?>

        <?php if( $args['show_view_more'] ) : ?>
        <div class="post-list-item-link">
            <a href="<?php the_permalink( get_the_ID() ); ?>">Explore More <?php get_template_part('icons/arrow-up'); ?></a>
        </div>
        <?php endif; ?>
    </div>
</div>