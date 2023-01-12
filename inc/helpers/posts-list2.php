<?php 
if( $args['theQuery']->have_posts() ) : ?>
<div class="posts-grid post-featured">
    <div class="container">
        <div class="row">
        <?php while( $args['theQuery']->have_posts() ) : $args['theQuery']->the_post(); ?>
            <div class="col-12">
                <div class="post-grid-item">
                    <div class="post-grid-item-wrapper">
                        <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        <div class="post-grid-item-details">
                            <?php $theTerms = get_the_terms( get_the_ID(), 'category' ); ?>
                            <?php foreach( $theTerms as $category ) : ?>
                            <span><a href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></span>
                            <?php endforeach; ?>

                            <span class="post-grid-item-date"><?php echo get_the_date('j F Y'); ?></span>

                            <a href="<?php echo get_the_permalink(); ?>"><h3 class="heading"><?php echo get_the_title(); ?></h3></a>

                            <?php 
                                $theContent = get_the_content();

                                if (str_word_count($theContent, 0) > 40) {
                                    $words = str_word_count($theContent, 2);
                                    $pos   = array_keys($words);
                                    $theContent  = substr($theContent, 0, $pos[40]) . '...';
                                }
                            ?>
<!--                             <div class="wysiwyg-content"><?php echo $theContent; ?></div> -->
							<div class="wysiwyg-content s"><?php echo get_field('excerpt'); ?></div>

                            <a class="post-grid-readmore" href="<?php echo get_the_permalink(); ?>">Read More <?php get_template_part('icons/arrow-up'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
