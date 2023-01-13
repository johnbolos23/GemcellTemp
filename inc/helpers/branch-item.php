<?php
$json = json_decode($args['json'], true);
$hasFilter = false;

if( ( isset( $_POST['cityLat'] ) && $_POST['cityLat'] != '' ) && ( isset( $_POST['cityLng'] ) && $_POST['cityLng'] != '' ) ){
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
?>

<div class="branch-results-item-wrapper" data-distancefromuser="<?php echo $distance; ?>" data-branch-id="<?php echo get_the_ID(); ?>">
    <div class="d-flex align-items-center">
        <div class="branch-item-image">
            <img src="<?php echo get_field('logo') ? get_field('logo') : get_field('logo', get_field('gemcell_member_id') );?>" />
        </div>
        <div class="branch-item-details">
            <div class="branch-item-heading">
                <span class="heading"><?php echo get_the_title(); ?></span>
                <span class="distance">(<?php echo $distance; ?> km)</span>
            </div>
            <div class="wysiwyg-content"><?php echo $Branchaddress; ?></div>
            <a href="#" data-branch-target-detail="<?php echo get_the_ID(); ?>">View branch details</a>
        </div>
    </div>
</div>