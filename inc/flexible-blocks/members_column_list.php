<section class="page-section client-logos members-column-list" id="client-logos-<?php echo get_row_index(); ?>">
    <?php 

    $additionalStyles = array(
        'default_bg' => false,
        'parameters' => array(
            'client-logo-content' => array(
                'background-color' => get_sub_field('color')
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#client-logos-'. get_row_index(), 'additional' => $additionalStyles )); 
	$logosField = get_sub_field('logos');
    ?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4">
                <div class="client-logo-content pos-relative">
                    <?php if( get_sub_field('subheading') ) : ?>
                    <h4 class="subheading"><?php echo get_sub_field('subheading'); ?></h4>
                    <?php endif; ?>

                    <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>

                    <?php if( get_sub_field('content') ) : ?>
                    <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
                    <?php endif; ?>

                    <?php if( get_sub_field('button') ) : ?>
                    <a href="<?php echo get_sub_field('button')['url']; ?>"><?php echo get_sub_field('button')['title']; get_template_part('icons/arrow-up'); ?></a>
                    <?php endif; ?>

                    <?php get_template_part('icons/client-logo-icon-bottom'); ?>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row client-logos-wrapper pos-relative">
                    <?php foreach( $logosField as $logo ) : ?>
                    <div class="col-4 col-lg-2 text-center">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row client-logos-wrapper pos-relative reverse">
                    <?php  shuffle( $logosField ); foreach( $logosField as $logo ) : ?>
                    <div class="col-4 col-lg-2 text-center">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row client-logos-wrapper pos-relative another">
                    <?php shuffle( $logosField ); foreach( $logosField as $logo ) : ?>
                    <div class="col-4 col-lg-2 text-center">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                    <?php endforeach; ?>
                </div>
                    
            </div>
        </div>
    </div>
</section>