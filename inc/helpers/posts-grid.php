<?php 
$counter = 0;

if( $args['theQuery']->have_posts() ) : ?>
<div class="posts-grid">
    <div class="container">
        <div class="row">
        <?php while( $args['theQuery']->have_posts() ) : $args['theQuery']->the_post(); $counter++; ?>
            <div class="col-12 <?php echo $counter != 1 ? 'col-lg-6' : 'post-grid-first-article'; ?>">
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

                            <?php if( $counter == 1 ) : ?>
                            <?php 
                                $theContent = get_the_content();

                                if( wp_is_mobile() ){
                                    if (str_word_count($theContent, 0) > 8) {
                                        $words = str_word_count($theContent, 2);
                                        $pos   = array_keys($words);
                                        $theContent  = substr($theContent, 0, $pos[8]) . '...';
                                    }
                                }else{
                                    if (str_word_count($theContent, 0) > 40) {
                                        $words = str_word_count($theContent, 2);
                                        $pos   = array_keys($words);
                                        $theContent  = substr($theContent, 0, $pos[40]) . '...';
                                    }
                                }
                                
                            ?>
                            <div class="wysiwyg-content"><?php echo $theContent; ?></div>

                            <a class="post-grid-readmore" href="<?php echo get_the_permalink(); ?>">Read More <?php get_template_part('icons/arrow-up'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php endif; ?>