<?php if( $args['theQuery']->have_posts() ) : ?>
<div class="posts-slider">
    <?php while( $args['theQuery']->have_posts() ) : $args['theQuery']->the_post(); ?>
    <div class="post-slider-item">
        <div class="post-slider-item-wrapper">
            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
            <div class="post-slider-item-details">
                <?php $theTerms = get_the_terms( get_the_ID(), 'category' ); ?>
                <?php foreach( $theTerms as $category ) : ?>
                <span><a href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></span>
                <?php endforeach; ?>

                <span class="post-slider-item-date"><?php echo get_the_date('j F Y'); ?></span>

                <a href="<?php echo get_the_permalink(); ?>"><h3 class="heading"><?php echo get_the_title(); ?></h3></a>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>