<section class="page-section team-members" id="team-members-<?php echo get_row_index(); ?>">
    <?php

    $additionalStyles = array(
        'default_bg' => true,
        'parameters' => array(
            'team-name' => array(
                'color' => get_sub_field('heading_color'),
            ),
            'description' => array(
                'color' => get_sub_field('content_color'),
            )
        )
    ); 

    get_template_part('inc/style-helper', null, array('target' => '#team-members-'. get_row_index() ) ); 

    ?>
    <div class="container">
        <div class="text-center">
            <h2 class="heading"><?php echo get_sub_field('heading'); ?></h2>
            <?php if( get_sub_field('content')) : ?>
            <div class="wysiwyg-content"><?php echo get_sub_field('content'); ?></div>
            <?php endif; ?>
        </div>

        <?php if( get_sub_field('team') ) : ?>
        <div class="team-members-wrapper">
            <div class="row">
                <?php foreach( get_sub_field('team') as $team ) : $teamDetails = $team['team_details']; ?>
                <div class="col-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                    <div class="team-member-item">
                        <img src="<?php echo $team['image']; ?>" />
                        <div class="team-member-details">
                            <h4 class="team-name"><?php echo $teamDetails['name']; ?></h4>
                            <p class="position"><?php echo $teamDetails['position']; ?></p>
                            <p class="description"><?php echo $teamDetails['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>