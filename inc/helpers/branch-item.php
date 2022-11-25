<?php
$PublicIP = get_client_ip() != '::1' ? get_client_ip() : '35.201.24.201';
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];

$addressString = $city . ','. $region . ','. $country;

$currentUserAddress = getGeoCode($addressString);


$Branchlatitude = get_field('maps')['lat'];
$Branchlongtitude = get_field('maps')['lng'];
$Branchaddress = get_field('maps')['address'];

if( $Branchlatitude != 'null' && $Branchlongtitude != 'null' ){
    $distance = getDistanceBetweenCoordinates( $Branchlatitude, $Branchlongtitude, $currentUserAddress['lat'], $currentUserAddress['lng'], 'K' );
}else{
    $distance = 13685.38;
}

$distance = number_format((float)$distance, 2, '.', '');
?>

<div class="branch-results-item-wrapper" data-branch-id="<?php echo get_the_ID(); ?>">
    <div class="d-flex align-items-center">
        <div class="branch-item-image">
            <?php echo get_the_post_thumbnail(); ?>
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