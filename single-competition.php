<?php 
defined( 'ABSPATH' ) || exit;

get_header();

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
            $breadcrumbs[] = '<span>'.str_replace( '-', ' ', get_the_title() ).'<span>';
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

<section class="single-competition" id="single-competition">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="single-competition-image">
                    <div class="post-list-item-image-title">
                            
                        <div class="post-list-item-title-wrapper style-<?php echo get_field('shade_style'); ?>">
                            <div class="post-list-item-title-inner-wrapper">
                                <?php echo get_the_title(); ?>
                            </div>
                        </div>
                    
                        <div class="post-list-item-image">
                        <?php echo get_the_post_thumbnail(); ?>
                        </div>
                    </div>
                        
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="single-competition-details">
                    <div class="single-competition-details-wrapper">
                        <?php 
                        $categories = get_the_terms( get_the_ID(), 'competition_tax' );
                        $output = '';

                        if( $categories ){
                            echo '<div class="single-competition-categories">';
                                echo '<h4 class="subheading-competition"><span>';
                            foreach( $categories as $category ) {
                                $output .= '<a>' . esc_html( $category->name ) . '</a>' . ', ';
                            }
                            echo trim( $output, ', ' );
                                echo '</span></h4>';
                            echo '</div>';
                        }
                        ?>

                        <h2 class="heading"><?php the_title(); ?></h2>
                        <h5 class="subcontent"><?php the_content(); ?></h5>
                        <div class="wysiwyg-content"><?php echo get_field('description'); ?></div>
                        <div class="competition-col-wrapper">
                            <?php if( get_field('competition_form', 'option')['show_form'] ) : $competitionGroup = get_field('competition_form', 'option'); ?>
                            <div class="competition-wrapper">
                                <?php if( $competitionGroup['form_heading'] ) : ?>
                                    <h3><?php echo $competitionGroup['form_heading']; ?></h3>
                                <?php endif; ?>
                                <?php 
                                    if( $competitionGroup['form'] ){
                                        gravity_form( $competitionGroup['form'] );
                                    }
                                ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- 
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
        <?php endif; ?> -->

        <?php if( get_field('info_blocks', 'option') ) : ?>
        <div class="row competition-info-blocks">
            <?php $counter = 1; foreach( get_field('info_blocks', 'option') as $block ) : ?>
            <div class="col-12 col-lg-4">
                <div class="competition-block-item">
                    <div class="competition-block-item-wrapper">
                        <img src="<?php echo $block['icon']; ?>" />
                        <h3 class="block-title"><?php echo $block['title']; ?></h3>
                        <div class="wysiwyg-content"><?php echo $block['detail']; ?></div>
                        <?php if( $block['link'] ) : ?>
                        <a href="<?php echo $block['link']['url']; ?>"><?php echo $block['link']['title']; get_template_part('icons/arrow-up'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="competition-block-border">
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