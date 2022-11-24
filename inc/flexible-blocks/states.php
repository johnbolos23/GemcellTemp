<style>
    .state-col ul li .list-inner{
        background-image: url("http://localhost/gemcell/wp-content/uploads/2022/10/tasmania-img.png");
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center;
        position:relative;
    }

</style>


<section class="page-section state-row" id="state-row-<?php echo get_row_index(); ?>">
    
    <div class="state-row-inner">
        <div class="container">
            <div class="row">
                <h2 class="heading">
                    <?php echo get_sub_field('heading'); ?>
                </h2>
                <div class="state-col">  
                    <?php 
                    $categories = get_terms( array(
                        'taxonomy' => 'state',
                        'hide_empty' => false,
                        'parent' => 0,
                    ) );
                    ?>
                    <ul>
                        <?php foreach($categories as $category) { 
                            $term_image = get_field( 'map_image', 'state_' . $category->term_id );     
                            $bg_image = get_field( 'image', 'state_' . $category->term_id ); 
                        ?>
                            
                            <li value="<?php echo $category->term_id; ?>">
                                <div class="list-inner" style="background-image: url('<?php echo $bg_image ?>')">
                                    <h4><a href="<?php echo get_term_link( $category->term_id);?>"><?php echo $category->name; ?></a></h4>
                                    <!-- <img src="http://localhost/gemcell/wp-content/uploads/2022/10/Tasmania.png" class="map-image"> -->
                                    <img src="<?php echo $term_image; ?>" class="map-image">
                                    
                                </div>
                            </li>
                            
                        <?php } ?>                
                    </ul>

                </div>

            </div>
        </div>
    </div>

</section>






