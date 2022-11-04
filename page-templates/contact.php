<?php 

/* Template Name: Contact Us */ 

get_header();
?>
<!-- Container -->
<div class="container contact-us">
    <div class="row">

        <!-- Left Side Image -->
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 left-side-image">
            <img src="<?php echo get_field('left_side_image'); ?>" class="for-laptop"/>
            <img src="<?php echo get_field('tablet_size_image'); ?>" class="for-tablet"/>
            <span><?php echo get_field('image_design'); ?></span>
        </div>
        <!-- End of Left Side Image -->
        
        <!-- Get in touch content -->
        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 get-in-touch">
            <h2>Get In Touch With Us</h2>
            <h6>I would like to:</h6>

            <!-- Accordion -->
            <?php if( get_field('accordion') ) : ?>
                <div class="accordion" id="accordion">
                    <?php foreach( get_field('accordion') as $key => $accordion ) : ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="custom-control custom-radio">
                                    <input checked="<?php echo $key == 0 ? true : false; ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" type="radio" id="customRadio<?php echo $key; ?>_PreChecked" name="customRadio" class="custom-control-input" />
                                    <label class="custom-control-label" for="customRadio<?php echo $key; ?>_PreChecked"><?php echo $accordion['accordion_header']; ?></label>
                                    <?php if( $accordion['accordion_icon'] ){  echo $accordion['accordion_icon']; } ?>
                                </div>
                            </div>
                            <div id="collapse<?php echo $key; ?>" class="collapse <?php echo $key == 0 ? 'show': ''; ?>" data-parent="#accordion">
                                <div class="card-body"> 
                                    <div class="accordion-content">
                                        <?php echo $accordion['accordion_content'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <!-- End of Accordion -->
        </div>
        <!-- End of Get in touch content -->
    </div>

    <!-- Contact Details -->
    <div class="row contact">
        <?php if( get_field('contact_details') ) : ?>
            <?php foreach( get_field('contact_details') as $key => $contact_details ) : ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 contact-details">
                    <div class="row">
                        <!-- Icon -->
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-2 col-3 contact-detail-icon">              
                            <?php if( $contact_details['contact_detail_icon'] ){  echo $contact_details['contact_detail_icon']; } ?>
                        </div>
                        <!-- End of Icon -->
                        <!-- Contact Info -->
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-10 col-9 contact-info">
                            <h5><?php echo $contact_details['contact_title']; ?></h5>
                            <?php echo $contact_details['contact_detail_info']; ?>
                        </div>
                        <!-- End of Contact Info -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <!-- End of Contact Details -->
</div>
<!-- End of Container -->


<script>
    var $ = jQuery;

    $(document).on('click', 'input[name="customRadio"]', function(){
        $('.card-header').removeClass('active');
        $('.card .collapse').removeClass('show');

        if( $(this).is(':checked') ){
            $(this).closest('.card-header').addClass('active');
            $(this).closest('.card-header').next('.collapse').addClass('show');
        } 
    });
</script>

<?php get_footer(); ?>