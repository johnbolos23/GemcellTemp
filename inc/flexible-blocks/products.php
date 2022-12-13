<section class="page-section our-products" id="our-product-<?php echo get_row_index(); ?>">
    <?php 

    get_template_part('inc/style-helper', null, array('target' => '#our-product-'. get_row_index() )); 
 
    ?>
    <div class="container">
        <div class="row">
            <?php if( get_sub_field('subheading') ) : ?>
            <div class="col-12">
                <h4 class="subheading "><?php echo get_sub_field('subheading'); ?></h4>
            </div>
            <?php endif; ?>
            <div class="col-12 col-lg-6">
                <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
            </div>
            <div class="col-12 col-lg-6">
                <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
            </div>
        </div>

        <?php if( get_sub_field('products') ) : ?>
            <div class="our-products-wrapper">
                <div class="d-flex flex-wrap">
                    <?php foreach( get_sub_field('products') as $ourproduct ) : ?>
                    <div class="our-product-item">
                        <div class="our-product-item-wrapper">
                            <a href="<?php echo $ourproduct['link']; ?>">
                                <div class="our-product-item-image">
                                    <img src="<?php echo $ourproduct['icon']; ?>" />
                                </div>
                                <div class="our-product-item-name">
                                    <h3 class="heading"><?php echo $ourproduct['name']; ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>