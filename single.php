<?php
defined( 'ABSPATH' ) || exit;

get_header();

$comments = get_comments();


function get_attachment_url_image_comment($comment_id) {
    $meta_key = 'attachment_id';
    $attachment_id = get_comment_meta( $comment_id, $meta_key, true );
    $full_img_url = wp_get_attachment_image_url( $attachment_id, 'full' );
    return $full_img_url;
}

get_template_part('inc/flexible-blocks/breadcrumbs'); ?>

<section class="post-single" id="post-single">
	<div class="container">
		<div class="post-single-wrapper">
			<?php the_post_thumbnail(); ?>

			<div class="post-single-content-wrapper">
				<div class="post-single-content-meta">
					<?php $theTerms = get_the_terms( get_the_ID(), 'category' ); ?>
					<?php foreach( $theTerms as $category ) : ?>
					<span><a href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></span>
					<?php endforeach; ?>

					<span class="post-slider-item-date"><?php echo get_the_date('j F Y'); ?></span>
				</div>
				
				<div class="row pos-relative">
					<div class="col-12 col-lg-12">
                        <div class="post-single-title">
                            <h2 class="heading"><?php the_title(); ?></h2>
                        </div>
                        <div class="">
                            <?php
                            
                            if( have_rows('flexible_content') ){
                                
                                while( have_rows('flexible_content') ) : the_row();

                                    get_template_part( 'inc/post-blocks/' . get_row_layout() );

                                endwhile;
                                
                            }else{
                                echo '<div class="wysiwyg-content">';
                                    echo get_the_content();
                                echo '</div>';
                            }

                            ?>
                        </div>
                        <!-- <div class="wysiwyg-content"><?php the_content(); ?></div> -->

                        <?php if( comments_open() ) : ?>
                        <div class="post-single-comments-section">
                            <h3 class="heading">Comments (<?php echo count( $comments ); ?>)</h3>

                            <?php if( $comments ): ?>
                                <div class="post-single-comments">
                                    <?php foreach( $comments as $comment ) : ?>
                                    <div class="d-flex post-single-comment-item">
                                        <div class="post-single-comment-author-image">
                                            <?php echo get_avatar( $comment->comment_author_email, 70 ); ?> 
                                        </div>
                                        <div class="post-single-comment-details">
                                            <span class="post-single-comment-name"><?php echo $comment->comment_author; ?></span>
                                            <span class="post-single-comment-date"><?php echo date('F j, Y', strtotime( $comment->comment_date )); ?></span>
                                            <div class="wysiwyg-content"><?php echo $comment->comment_content; ?></div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="second-heading">Write a Comment</h3>
                            <?php comment_form(); ?>
                        </div>
                        <?php endif; ?>
					</div>
					<div class="col-12">
						<div class="post-single-share">
                            <h4 class="subheading">Share</h4>
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>&t=<?php echo get_the_title(); ?>"><?php get_template_part('icons/facebook');?></a>
                            <a target="_blank" href="https://www.linkedin.com/shareArticle?title=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>"><?php get_template_part('icons/linkedin');?></a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('inc/post-related'); ?>

<section class="post-single-newsletter" id="post-single-newsletter" style="<?php if( get_field('post_single_bg_image','option') ) : ?>background-image: url(<?php echo get_field('post_single_bg_image','option'); ?>);<?php endif;?> color: <?php echo get_field('post_single_text_color','option'); ?>;">
    <div class="container text-center">
        <h2 class="heading"><?php echo get_field('post_single_heading','option'); ?></h2>
        <div class="wysiwyg-content"><?php echo get_field('post_single_text','option'); ?></div>
        <div class="main-footer-newsletter-wrapper">
            <?php gravity_form( get_field('post_single_form','option') );?>
        </div>
    </div>
</section>

<?php
get_footer();
