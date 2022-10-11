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
            $breadcrumbs[] = '<span>'.str_replace( '-', ' ', $title ).'<span>';
        }

    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}

$additionalStyles = array(
    'default_bg' => false,
    'parameters' => array(
        'page-title-wrapper' => array(
            'background-color' => get_sub_field('color'),
        )
    )
); 

get_template_part('inc/style-helper', null, array('target' => '#page-title-'. get_row_index(), 'additional' => $additionalStyles  ) ); 

ob_start();
get_template_part('icons/breadcrumb-arrow');
$breadArrow = ob_get_contents();
ob_end_clean();
?>

<section class="page-title" id="page-title-<?php echo get_row_index(); ?>">
    <div class="row m-0">
        <div class="col-12 col-lg-5 p-0">
            <div class="page-title-wrapper pos-relative">
                <span class="icon-top"><?php get_template_part('icons/banner-content-icon-top'); ?></span>

                <h1 class="heading"><?php echo get_sub_field('heading') ? get_sub_field('heading') : get_the_title(); ?></h1>
            </div>
        </div>
        <div class="col-12 col-lg-7 p-0">
            <div class="page-title-image pos-relative">
                <img src="<?php echo get_sub_field('image'); ?>" />
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <?php echo breadcrumbs( $breadArrow ); ?>
        </div>
    </div>
</section>