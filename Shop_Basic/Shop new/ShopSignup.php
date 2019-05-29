<!-- <?php
session_start();
?> -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="ShopSignup.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
    <!-- <script type="text/javascript">
        function hide_fun(id){
            
            var divelement= document.getElementByID(id);
            if(divelement.style.display == 'block')
                divelement.style.display = 'none';
        }
    </script> -->
</head>
<body>
    <div class="bg">
        <div class="container">
            <h1>Shop Owner SignUp</h1>
            <br><br>
        </div>
    <!-- <h2>Shop Owner Signup</h2> -->
    
        <div class="form"   >
            <form class="ShopOwner" action = "shop.php" method="POST" enctype="multipart/form-data" >
            <label for="Image"><b>Upload Image</b></label><br>
            <input type="file" name="image" id="image" accept="image/*" required><br><br>
        
            <label for="UserName"><b>Full Name</b></label><br>
            <input type="text" placeholder="Enter Username" name="UserName" required><br>

            <label for="email"><b>Email</b></label><br>
            <input type="email" placeholder="Enter Email" name="email" required><br><br>

            <label for="number"><b>Mobile Number</b></label><br>
            <input type="tel" placeholder="Enter Mobile Number" name="number"  required ><br>

            <label for="ShopName"><b>Shop Name</b></label><br>
            <input type="text" placeholder="Enter Shopname" name="ShopName" required><br>

            <label for="geolocation"><b>Geolocation</b></label><br><br>
            <button type="button" name="getLocation" class="btn btn-primary" onclick="unhideFunction()">Getlocation</button>
            <br><br>

            <div id="hideLocation" class="mapcontainer" style="display: none;">
                <div class="row">
                    <div id="dvMap" style="width: 500px; height: 500px; margin-left: 2%;margin-right: 2%;margin-top: 2%;">
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="locationColumn">
                        <div class="header-marker">
                            <div class="col-md-5 signupbox">
                                <div class="form-group">
                                    <input type="number" step="any" id="Latitude" name="shopLatitude"class="location" value="">
                                </div>
                                <div class="form-group">
                                    <input type="number" step="any" id="Longitude" name="shopLongitude"class="location" value="">
                                </div>
                                <div class="form-group">
                                    <input type="button" class="btn btn-primary" value="Current Position"onclick="getLocationConstant()" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


      
            <br><label for="type"><b>Shop Type</b></label><br>
            <input type="radio" name="type" value="grocery"> Grocery<br>
            <input type="radio" name="type" value="retail"> Retail<br>
            <input type="radio" name="type" value="clothes"> Clothes<br>
            <input type="radio" name="type" value="baker"> Baker<br><br>
            <!-- <textarea id="desc" name="desc" placeholder="Write a description about your shop" style="height:90px"></textarea><br> -->

            <input type="submit" name="submit" value="Submit" class="btn btn-outline-primary">
        </form>
        
    </div>
    <script type="text/javascript">
        function getLocationConstant() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
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
            var marker = new google.maps.Marker({
                position: {
                    lat: 7.927818456366202,
                    lng: 80.67881188707315
                },
                map: map
            });
            google.maps.event.addListener(map, 'click', function(e) {
                marker.setMap(null);
                var geo = {
                    lat: e.latLng.lat(),
                    lng: e.latLng.lng()
                };
                marker = new google.maps.Marker({
                    position: geo,
                    map: map
                });
                document.getElementById("Latitude").value = e.latLng.lat();
                document.getElementById("Longitude").value = e.latLng.lng();
            });
        }
        function unhideFunction() {
            var divelement = document.getElementById("hideLocation");
            if (divelement.style.display == 'none')
                divelement.style.display = 'block';
        }
        </script>
       
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?keyAIzaSyBByZ9yBJHULD6Va0HlE_vNvfRUvohhxNQ&callback=initMap">
        </script>
    
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    
        <script>
        $(document).ready(function() {
            function disableBack() {
                window.history.forward()
            }
            window.onload = disableBack();
            window.onpageshow = function(evt) {
                if (evt.persisted) disableBack()
            }
        });
        </script>
   
</body>
</html> 