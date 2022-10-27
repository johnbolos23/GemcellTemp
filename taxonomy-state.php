<?php

/**
 * Template Name: Archive Page Custom
 * 
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$term = get_queried_object();
?>

<style>
    .state-col ul li .list-inner{
        /* background-image: url("http://localhost/gemcell/wp-content/uploads/2022/10/tasmania-img.png"); */
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center;
        position:relative;
    }

</style>


<div class="wrapper" id="archive-wrapper">
		<section class="archive-page-title-main">
			<div class="row m-0">
				<img src="<?php echo get_field('image', $term); ?>" alt="">
			</div>
		</section>

		<?php

function breadcrumbs($separator = ' &raquo; ', $home = 'Home')
{
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ( ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = $_SERVER['HTTP_HOST'] == 'localhost' ? array() : array("<a href=\"$base\">$home</a>");

    // Initialize crumbs to track path for proper link
    $crumbs = '';

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path as $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(array('.php', '_', '%20'), array('', ' ', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last) {
            if( $base . $crumbs . $crumb == site_url() ){
                $breadcrumbs[] = "<a href=\"$base$crumbs$crumb\">$home</a>";
            }else{
                $breadcrumbs[] = "<a href=\"$base$crumbs$crumb\">$title</a>";
            }
            
            $crumbs .= $crumb . '/';
        }
        // Otherwise, just display the title (minus)
        else {
            $breadcrumbs[] = '<span>'.str_replace( '-', ' ', get_the_archive_title() ).'<span>';
        }

    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}


ob_start();
get_template_part('icons/breadcrumb-arrow');
$breadArrow = ob_get_contents();
ob_end_clean();

?>


<section class="page-title">
    <div class="breadcrumbs">
        <div class="container">
            <?php echo breadcrumbs( $breadArrow ); ?>
        </div>
    </div>
</section>

</div>




	

	<div class="<?php echo esc_attr( $container ); ?> tax-state-row" id="content" tabindex="-1">

		<div class="row">

		

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) {
					?>
					<header class="page-header">

						<?php
						the_archive_title( '<h2 class="page-title">', '</h2>' );
						// the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
						<h2 style="color:#90989B">(<?php echo get_field('number_of_branches', $term); ?> Branches)</h2>
					</header><!-- .page-header -->
					<div class="article-col-main-custom">
						<div class="article-col-custom">
						<?php
						// Start the loop.
						while ( have_posts() ) {
							the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/state_content', get_post_format() );
						}?>
						</div>
						<div class="map">
							<h3>Map</h3>
							<!-- <img src="<?php echo get_stylesheet_directory_uri() . '/icons/main-map.png'; ?>" /> -->
							<?php 
							$location = get_field('map_locations', $term);
							if( $location ): ?>
								<div class="custom-map" data-zoom="16">
									<?php if( get_field('list_of_branches', $term) ) : ?>
										<?php foreach( get_field('list_of_branches', $term) as $block ) : ?>
											<?php $address = getGeoCode ($block['branch_address']); ?>
											
											<div class="marker" data-lat="<?php echo esc_attr($address['lat']); ?>" data-lng="<?php echo esc_attr($address['lng']); ?>" data-mappin="<?php echo get_stylesheet_directory_uri() .'/icons/images/map-marker.png'; ?>">
												<!-- <?php echo $block['list_item']; ?> -->
											</div>

										<?php endforeach; ?>
									<?php endif; ?>   
								</div>
							<?php endif; ?>

						</div>
					</div>
					<?php
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<?php
			// Display the pagination component.
			understrap_pagination();
			// Do the right sidebar check.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->
		<section class="page-title state-row" id="state-row-<?php echo get_row_index(); ?>">
    
			<div class="state-row-inner">
				<div class="container">
					<div class="row">
						<h2 class="heading">
							Find Members by States
						</h2>
						<div class="state-col">  
							<?php 
							$categories = get_terms( array(
								'taxonomy' => 'state',
								'hide_empty' => false,
								'parent' => 0,
							) );
							?>
							<ul>
								<?php foreach($categories as $category) { 
									$term_image = get_field( 'map_image', 'state_' . $category->term_id );     
									$bg_image = get_field( 'image', 'state_' . $category->term_id ); 
								?>
									
									<li value="<?php echo $category->term_id; ?>">
										<div class="list-inner" style="background-image: url('<?php echo $bg_image ?>')">
											<h4><a href="<?php echo get_term_link( $category->term_id);?>"><?php echo $category->name; ?></a></h4>
											<!-- <img src="http://localhost/gemcell/wp-content/uploads/2022/10/Tasmania.png" class="map-image"> -->
											<img src="<?php echo $term_image; ?>" class="map-image">
											
										</div>
									</li>
									
								<?php } ?>                
							</ul>

						</div>

					</div>
				</div>
			</div>

		</section>

	</div><!-- #content -->

</div><!-- #archive-wrapper -->
<style type="text/css">
.custom-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}

// Fixes potential theme css conflict.
.custom-map img {
   max-width: inherit !important;
}
</style>
<?php
get_footer();
