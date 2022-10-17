<style>
    <?php if( !isset($args['additional']) || $args['additional']['default_bg'] ) : ?>
    <?php echo $args['target']; ?>{
        background-color: <?php echo get_sub_field('color'); ?>;
        background-image: url(<?php echo get_sub_field('image'); ?>);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    <?php endif; ?>
    <?php echo $args['target']; ?> .subheading{
        color: <?php echo get_sub_field('subheading_color'); ?>;
    }
    <?php echo $args['target']; ?> .heading{
        color: <?php echo get_sub_field('heading_color'); ?>;
    }
    <?php echo $args['target']; ?> .wysiwyg-content,
    <?php echo $args['target']; ?> .wysiwyg-content *{
        color: <?php echo get_sub_field('content_color'); ?>;
    }

    <?php if( isset($args['additional']) && $args['additional']['parameters'] ) : ?>
        <?php foreach( $args['additional']['parameters'] as $class => $values ){
            echo $args['target'] . ' .' . $class . '{';
                foreach( $values as $parameter => $value ){
                    echo $parameter . ': ' . $value.';';
                }
            echo '}';
        } ?>
    <?php endif; ?>
</style>