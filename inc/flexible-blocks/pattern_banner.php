
<style>
    .pattern-banner .row .col-a{
        background-image: url("<?php echo get_stylesheet_directory_uri() ?>/icons/pattern bg.png");
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center;
        position:relative;
    }

    .pattern-banner .row .col-b{
        /* background-image: url("<?php echo get_stylesheet_directory_uri() ?>/icons/road.png"); background-size: cover; background-repeat: no-repeat; background-position: center; position:relative; */
    }

</style>


<section class="page-title pattern-banner" id="pattern-banner-<?php echo get_row_index(); ?>">
    
    <div class="pattern-banner">
        <div class="container">
            <div class="row">
            <div class="owl-carousel pattern-banner-slider owl-theme">
            <?php if( get_sub_field('banner_slider') ) : ?>
            <?php foreach( get_sub_field('banner_slider') as $block ) : ?>            
            <div class="row-inner">
                <div class="col-a" style="">
                    <h2 class="heading">
                        <?php echo $block['heading']; ?>
                        <!-- Take the road to Rewards -->
                        
                    </h2>
                    <div class="contant-col">
                        <div class="wysiwyg-content">
                            <!-- <?php echo get_sub_field('paragraph'); ?> -->
                            <?php    
                                if( $block['paragraph'] ) {
                                    echo $block['paragraph'];
                                } else {
                                    echo '';
                                }                                    
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-b" style="background-image: url('<?php echo $block['background_image']; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center; position:relative;">
                    <img src="<?php echo $block['logo_image']; ?>" class="logo-img"/> 
                </div>
            </div>

            <?php endforeach; ?>
            <?php endif; ?>
            </div>
            </div>
        </div>
    </div>

</section>

