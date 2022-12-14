<?php
$json = json_decode($args['json'], true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];
$hasFilter = false;

if( isset( $_POST['cityLat'] ) && isset( $_POST['cityLng'] ) ){
    $hasFilter = true;
    $currentUserLatLong[] = $_POST['cityLat'];
    $currentUserLatLong[] = $_POST['cityLng'];
}else{
    if( $json['loc'] ){
        $currentUserLatLong = explode(',', $json['loc']);
    }else{
        $country  = $json['country'];
        $region   = $json['region'];
        $city     = $json['city'];
    
        $addressString = $city . ','. $region . ','. $country;
    
        $currentUserAddress = getGeoCode($addressString);
        
        $currentUserLatLong[] = $currentUserAddress['lat'];
        $currentUserLatLong[] = $currentUserAddress['lng'];
    }
}

$Branchlatitude = get_field('address')['lat'];
$Branchlongtitude = get_field('address')['lng'];
$Branchaddress = get_field('address')['address'];

if( $currentUserLatLong && ( $Branchlatitude != 'null' && $Branchlongtitude != 'null' ) ){
    $distance = getDistanceBetweenCoordinates( $Branchlatitude, $Branchlongtitude, $currentUserLatLong[0], $currentUserLatLong[1], 'K' );
}else{
    $distance = 13685.38;
}

$distance = number_format((float)$distance, 2, '.', '');

if( $distance > 100 && $hasFilter ){
    return false;
}

$origin = urlencode( $city . ','. $region . ','. $country );
$destination = get_field('address')['address'];
$directionURL = "https://www.google.com/maps/dir/?api=1&origin=$origin&destination=$destination";

?>

<div class="branch-result-list-detail-wrapper hide" data-branch-detail="<?php echo get_the_ID(); ?>">
<img src="<?php echo get_field('logo') ? get_field('logo') : get_field('logo', get_field('gemcell_member_id') );?>" />

    <h3 class="heading"><?php echo get_the_title(); ?></h3>
    <div class="branch-result-list-detailed">
        <?php if( get_field('address')['address'] ) : ?>
        <div class="d-flex">
            <div class="branch-label">Address:</div>
            <div class="branch-detail-text"><?php echo get_field('address')['address']; ?></div>
        </div>
        <?php endif;?>
        <?php if( get_field('phone') ) : ?>
        <div class="d-flex">
            <div class="branch-label">Phone:</div>
            <div class="branch-detail-text"><?php echo get_field('phone'); ?></div>
        </div>
        <?php endif;?>
        <?php if( get_field('fax') ) : ?>
        <div class="d-flex">
            <div class="branch-label">Fax:</div>
            <div class="branch-detail-text"><?php echo get_field('fax'); ?></div>
        </div>
        <?php endif;?>
        <?php if( get_field('email') ) : ?>
        <div class="d-flex">
            <div class="branch-label">Email:</div>
            <div class="branch-detail-text"><?php echo get_field('email'); ?></div>
        </div>
        <?php endif;?>
        <?php if( get_field('website') ) : ?>
        <div class="d-flex">
            <div class="branch-label">Website:</div>
            <div class="branch-detail-text"><?php echo get_field('website'); ?></div>
        </div>
        <?php endif;?>
    </div>

    <a href="<?php echo $directionURL; ?>" target="_blank" class="main-button main-button-bordered"><?php get_template_part('icons/direction-icon'); ?> Get Directions</a>
</div>