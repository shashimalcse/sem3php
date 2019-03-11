<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=divice-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
    .column {
      float: left;
      width: 50%;
      top:10px;


}
    </style>
  </head>
  <body>

    
    <script type="text/javascript">
function getLocationConstant() {
  var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError,options);
    } else {
        alert("Your browser or device doesn't support Geolocation");
    }
}

// If we have a successful location update
function onGeoSuccess(event) {
    document.getElementById("Latitude").value = event.coords.latitude;
    document.getElementById("Longitude").value = event.coords.longitude;


}

// If something has gone wrong with the geolocation request
function onGeoError(event) {
    alert("Error code " + event.code + ". " + event.message);
}
function initMap() {
     var mapOptions = {
         center: new google.maps.LatLng(7.927818456366202, 80.67881188707315),
         zoom: 8,

     };
     var infoWindow = new google.maps.InfoWindow();
     var latlngbounds = new google.maps.LatLngBounds();
     var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
     google.maps.event.addListener(map, 'click', function (e) {
          document.getElementById("Latitude").value = e.latLng.lat() ;
          document.getElementById("Longitude").value =  e.latLng.lng();
     });
 }
 function unhideFunction() {
  
  var divelement= document.getElementById("hideLocation");
        if(divelement.style.display == 'none' )
            divelement.style.display = 'block';
 }

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?keyAIzaSyBByZ9yBJHULD6Va0HlE_vNvfRUvohhxNQ&callback=initMap">
</script>

<button type="button" name="getLocation" onclick="unhideFunction()" >get location</button>
  <div id="hideLocation" style="display: none;">

    <div class="container">
      <div class="row">

      <div class="column">
        <div class="header-marker" >
          <div class="col-md-5 signupbox">
          <form class="form-markers" action="includes/markers.inc.php" method="post">
            <div class="form-group">
              <input type="text" name="shopname" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="text" name="shopaddress" class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary" value="Get Location" onclick="getLocationConstant()" />
            </div>
            <div class="form-group">
              <input type="number" step="any" id="Latitude" name="shopLatitude"  class="form-control" value="">
            </div>
            <div class="form-group">
              <input type="number" step="any" id="Longitude" name="shopLongitude"  class="form-control" value="">
            </div>
            <div class="form-group">
              <select name="shopcategory" class="form-control" required >
                    <option value="Liquor Bar">Bar</option>
                    <option value="Juice Bar">Juice bar</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" name="marker-submit" class="btn btn-primary">OK</button>
            </div>


          </form>

        </div>





        </div>
      </div>
      <div class="column">
        <div id="dvMap" style="width: 500px; height: 500px">
      </div>
      </div>

      </div>
    </div>
  </div>
  </body>
</html>
