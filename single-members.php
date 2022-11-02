<?php 
defined( 'ABSPATH' ) || exit;

get_header();

?>
<section class="page-title-main">
<div class="row m-0">
        <div class="col-12 col-lg-5 p-0 background-member-color">
            <div class="page-title-wrapper pos-relative">
            <span class="icon-top"><?php get_template_part('icons/banner-content-icon-top'); ?></span>
                <h1 class="heading"><?php echo get_field('members_title', 'option'); ?></h1>
            </div>
        </div>
    <div class="col-12 col-lg-7 p-0">
        <div class="page-title-image pos-relative">
            <img src="<?php echo get_field('background_image') ?>">
        </div>
    </div>
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

<section class="single-members" id="single-members">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="single-members-details top-position" style="display:none;">
                        <?php 
                        $categories = get_the_terms( get_the_ID(), 'member_categories' );
                        $output = '';

                        if( $categories ){
                            echo '<div class="single-members-categories">';
                                echo '<h4 class="subheading"><span>';
                            foreach( $categories as $category ) {
                                $output .= '<a>' . esc_html( $category->name ) . '</a>' . ', ';
                            }
                            echo trim( $output, ', ' );
                                echo '</span></h4>';
                            echo '</div>';
                        }
                        ?>
                    <h2 class="heading"><?php the_title(); ?></h2>
                </div>
                <div class="member-list-col">
                    <div class="owl-carousel member-list-slider owl-theme">
                    <?php if( get_field('member_list') ) : ?>
						<?php foreach( get_field('member_list') as $block ) : ?>
                            <div class="members-item">
                                <img src="<?php echo $block['image']; ?>" />
                                <h4 class="name">
                                    <?php    
                                        if( $block['name'] ) {
                                            echo $block['name'];
                                        } else {
                                            echo '';
                                        }                                    
                                    ?>
                                </h4>
                                <p class="position">
                                    <?php    
                                        if( $block['position'] ) {
                                            echo $block['position'];
                                        } else {
                                            echo '';
                                        }                                    
                                    ?>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="single-members-image">
                    <div class="single-members-image-wrapper">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
                    <div class="member-a-col">
                    <?php if( get_field('address') ) : ?>
                    <div class="member-website">
                        <h4 class="m-0"><b>Address:</b></h4>
                        <p class="m-0"><?php echo get_field('address'); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if( get_field('phone') ) : ?>
                    <div class="member-phone">
                        <h4 class="m-0"><b>Phone:</b></h4>
                        <p class="m-0"><?php echo get_field('phone'); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if( get_field('email') ) : ?>
                    <div class="member-email">
                        <h4 class="m-0"><b>Email:</b></h4>
                        <p class="m-0"><?php echo get_field('email'); ?></p>
                    </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="single-members-details">
                    <div class="single-members-details-wrapper">
                        <?php 
                        $categories = get_the_terms( get_the_ID(), 'member_categories' );
                        $output = '';

                        if( $categories ){
                            echo '<div class="single-members-categories">';
                                echo '<h4 class="subheading"><span>';
                            foreach( $categories as $category ) {
                                $output .= '<a>' . esc_html( $category->name ) . '</a>' . ', ';
                            }
                            echo trim( $output, ', ' );
                                echo '</span></h4>';
                            echo '</div>';
                        }
                        ?>

                        <h2 class="heading"><?php the_title(); ?></h2>
                        
                        <div class="wysiwyg-content"><?php echo get_field('description'); ?></div>
                    </div>
                </div>
                
                
                <div class="member-map-col">
                    <h3 class="members-col-title">Maps</h3>
                    <!-- <img src="<?php echo get_stylesheet_directory_uri() . '/icons/members-image/maps.png'; ?>" /> -->
                    
                    <?php 
                    $location = get_field('maps');
                    if( $location ): ?>
                        <div class="custom-map" data-zoom="16">
                            <?php if( get_field('branches')['list_all'] ) : ?>
                                <?php foreach( get_field('branches')['list_all'] as $block ) : ?>
                                    <?php $address = getGeoCode ($block['address']); ?>
                                    
                                    <div class="marker" data-lat="<?php echo esc_attr($address['lat']); ?>" data-lng="<?php echo esc_attr($address['lng']); ?>" data-mappin="<?php echo get_stylesheet_directory_uri() .'/icons/images/map-marker.png'; ?>">
                                        <?php echo $block['list_item']; ?>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>   
                        </div>
                    <?php endif; ?>
                </div>

                <div class="member-branches-col">
                    <h3 class="members-col-title">Branches</h3>
                    <?php if( have_rows('branches') ): 
                            while( have_rows('branches') ): the_row();                             

                    ?>
                    
                    <ul class="tab-nav">
                            <li class="tab"><span>All</span>
                                <div class="content-holder">
                                    <ul class="member-branch-inner"  id="tab1">
                                        <?php if( get_sub_field('list_all') ) : ?>
                                            <?php foreach( get_sub_field('list_all') as $block ) : ?>
                                            
                                            
                                         
                                            <li class="branch-item">
                                                <p class="item">
                                                    <?php    
                                                        if( $block['list_item'] ) {
                                                            echo $block['list_item'];
                                                        } else {
                                                            echo '';
                                                        }                                    
                                                    ?>
                                                </p>
                                            </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="tab"><span>VIC</span>
                                <div class="content-holder">
                                    <ul class="member-branch-inner"  id="tab1">
                                            <?php if( get_sub_field('list_vic') ) : ?>
                                                <?php foreach( get_sub_field('list_vic') as $block ) : ?>
                                                
                                                
                                            
                                                <li class="branch-item">
                                                    <p class="item">
                                                        <?php    
                                                            if( $block['list_item'] ) {
                                                                echo $block['list_item'];
                                                            } else {
                                                                echo '';
                                                            }                                    
                                                        ?>
                                                    </p>
                                                </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>                      
                                </div>
                            </li>
                    </ul>
                    <?php
                    endwhile;
                    endif; ?>

                </div>
                <div class="member-other-images-col">
                    <h3 class="members-col-title">Other Images</h3>
                    <?php 
                        $images = get_field('other_image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if( $images ): ?>
                            <ul>
                                <?php foreach( $images as $image_id ): ?>
                                    <li>
                                        <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                </div>
            </div>
        </div>

        <?php if( get_field('info_blocks', 'option') ) : ?>
        <div class="row members-info-blocks">
            <?php $counter = 1; foreach( get_field('info_blocks', 'option') as $block ) : ?>
            <div class="col-12 col-lg-4">
                <div class="members-block-item">
                    <div class="members-block-item-wrapper">
                        <img src="<?php echo $block['icon']; ?>" />
                        <h3 class="block-title"><?php echo $block['title']; ?></h3>
                        <div class="wysiwyg-content"><?php echo $block['detail']; ?></div>
                        <?php if( $block['link'] ) : ?>
                        <a href="<?php echo $block['link']['url']; ?>"><?php echo $block['link']['title']; get_template_part('icons/arrow-up'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="members-block-border">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/icons/supplier-image/' . $counter .'.jpg'; ?>" />
                    </div>
                </div>
            </div>
            <?php $counter++; if( $counter > 3 ) { $counter = 1; } endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>







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






<?php get_footer(); ?>