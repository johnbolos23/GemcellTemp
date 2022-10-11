<?php
get_template_part('inc/style-helper', null, array('target' => '#page-title-'. get_row_index() ) ); 

?>

<section class="page-section simple-text" id="simple-text-<?php echo get_row_index(); ?>">
    <div class="container">
        <div class="simple-text-wrapper">
            <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
        </div>
    </div>
</section>