<section class="page-section suggested-articles" id="suggested-articles-<?php echo get_row_index(); ?>">
    <div class="row">
        <div class="heading"><?php echo get_sub_field('heading'); ?></div>
        
        <div class="suggested-articles-wrapper">
        <?php foreach( get_sub_field('suggested_articles') as $article ) : ?>
            <div class="per-suggested-articles">
                <?php echo $article['title']; ?>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>