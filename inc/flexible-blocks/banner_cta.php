<style>
    #banner-cta-<?php echo get_row_index(); ?> .banner-cta-inner .row{
        background-image: url("<?php echo get_sub_field('background_image') ?>");
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center;
        position:relative;
    }


</style>

<section class="page-section banner-cta" id="banner-cta-<?php echo get_row_index(); ?>">
    
    <div class="banner-cta-inner">
        <div class="container">
            <div class="row">
                <div class="inner-row">
                    <div class="vector"><?php get_template_part('icons/vector-bg'); ?></div>
                    <div class="banner-content-col">
                        <h3 class="heading">
                            <?php echo get_sub_field('heading'); ?>
                        </h3>

                        <div class="wysiwyg-content">
                            <?php echo get_sub_field('paragraph'); ?>
                        </div>

                        <div class="col-wrapper">
                            <?php if( get_sub_field('newsletter')['show_newsletter'] ) : $newsletterGroup = get_sub_field('newsletter'); ?>
                            <div class="newsletter-wrapper">
                              
                                <?php 
                                    if( $newsletterGroup['form'] ){
                                        gravity_form( $newsletterGroup['form'] );
                                    }
                                ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php if( get_sub_field('button') ) : ?>
                                <a href="<?php echo get_sub_field('button')['url']; ?>" class="main-button dark-gray"><?php echo get_sub_field('button')['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section>