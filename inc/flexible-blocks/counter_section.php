<section class="page-section counter-section" id="counter-section-<?php echo get_row_index(); ?>">
    <?php 

    get_template_part('inc/style-helper', null, array('target' => '#counter-section-'. get_row_index() )); 

    ?>
    <div class="container">
        <div class="row">
        <?php foreach( get_sub_field('counter') as $item ) : ?>
            <div class="col-6 col-lg-3">
                <div class="counter-item-wrapper text-center">
                    <img src="<?php echo $item['icon']; ?>" />
                    <span class="heading" data-counter="<?php echo $item['number']; ?>" data-counter-append="<?php echo preg_replace('/[0-9]+/', '', $item['number']); ?>">0</span>
                    <div class="wysiwyg-content">
                        <?php echo $item['title']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>