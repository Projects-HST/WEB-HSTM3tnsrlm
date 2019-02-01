<div class="container">
  <div class="row">
    <div class="basic-tb-hd">

    </div>
     <div class="container">
       <div class="basic-tb-hd">
           <h2>Tracking view </h2>
       </div>
       <div class="col-md-10">
         <div id="map" style="width:800px; height:400px;"></div>
       </div>
       <div class="col-md-2">
         <p>Total KM  Travelled</p>
<div id="totals">
 <?php

$lats= json_encode( $res, JSON_NUMERIC_CHECK );
if(empty($kms_using_lat)){
 echo "no data found";
}else{
 foreach($kms_using_lat as $mile){}
   $kms=$mile->km;
   if(empty($kms)){
     echo "no data";
   }else{
     echo $mile->km;
   }

}
  ?>
</div>
       </div>
     </div>
  </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD79f4g1cuT6teKfopSTGYBs1-wMm4v4DY&libraries=geometry"></script>
<script>
$('#tracking').addClass('active');
$('#trackingmenu').addClass('active');

function initialize() {
		var homeLatlng = new google.maps.LatLng(11.004556,76.961632);

		var map = new google.maps.Map(document.getElementById("map"), {
			zoom: 13,
			center: homeLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		// add start marker



		var startMarker = new google.maps.Marker({
      <?php   foreach($lat_long as $onlylat){
        if ($onlylat === reset($lat_long)){ ?>
        position: new google.maps.LatLng(<?php   echo $onlylat->lat; ?>,<?php   echo $onlylat->lng; ?>),
        <?php    }} ?>
			map: map,
			icon: 'http://maps.google.co.uk/intl/en_ALL/mapfiles/ms/micons/green-dot.png'
		});

		// add end marker
		var endMarker = new google.maps.Marker({
      <?php foreach($lat_long as $onlylat){
        if ($onlylat === end($lat_long)){ ?>
			position: new google.maps.LatLng(<?php echo $onlylat->lat;  ?>,<?php  echo $onlylat->lng; ?>),
      <?php }} ?>
			map: map,
			icon: 'http://maps.google.co.uk/intl/en_ALL/mapfiles/ms/micons/red-dot.png'
		});

		// create an array of coordinates
		var arrCoords = [
        <?php  foreach($lat_long as $onlylat){ ?>
            new google.maps.LatLng(<?php echo $onlylat->lat; ?>,<?php echo $onlylat->lng; ?>),

      <?php  }  ?>
      <?php foreach($lat_long as $onlylat){
        if ($onlylat === end($lat_long)){ ?>
        new google.maps.LatLng(<?php echo $onlylat->lat; ?>,<?php echo $onlylat->lng; ?>)
      <?php }} ?>



  			// new google.maps.LatLng(11.09699699,77.01954478),
  			// new google.maps.LatLng(11.04807485,77.01371733),
  			//new google.maps.LatLng(11.36773795,77.07507485)


		];

		// draw the route
		var route = new google.maps.Polyline({
			path: arrCoords,
			strokeColor: "#0000FF",
			strokeOpacity: 1,
			strokeWeight: 4,
			map: map
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
