<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="article-inner">

    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<header class="entry-header">

        
		<?php
		the_title(
			sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
		);
		?>

        <a href="<?php echo get_permalink(); ?>" class="view-single-detail-link">View member details</a>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->



	<div class="entry-content">

		<?php
		// the_excerpt();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

    </div>
</article><!-- #post-## -->
