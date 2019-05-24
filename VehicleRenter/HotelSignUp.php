<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel Sign Up</title>
    <style type="text/css"></style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="RenterSignUpstyle.css">
</head>

<body>
    <div class="bg">
        <div class="container">
            <h1>Hotel SignUp</h1>
            <br><br>
    </div>

        <div class="form">
            <form method="post" action="HotelSignUpDb.php">
                <label for="username">Username:</label>
                <br>
                <input type="text" name="username" id="username" autocomplete="on" class="form-control" required>
                <br>
                <label for="firstName">First Name:</label>
                <br>
                <input type="text" name="firstName" id="firstName" autocomplete="on" class="form-control">
                <br>
                <label for="lastName">Last Name:</label>
                <br>
                <input type="text" name="lastName" id="lastName" autocomplete="on" class="form-control">
                <br>
                <br>
                <label for="address">Address :</label>
                <input type="text" name="address" id="address" class="form-control">
                <br>
                <br>
                
                Location:
                <button type="button" name="getLocation" class="btn btn-primary" onclick="unhideFunction()">Get
                    location</button>
                <br><br>

                <div id="hideLocation" class="mapcontainer" style="display: none;">
                    <div class="row">
                        <div id="dvMap" style="width: 500px; height: 500px; margin-left: 2%; margin-right: 2%;margin-top: 2%;">
                        </div>
                    </div><br><br>
                    <div class="row">

                        <div class="locationColumn">
                            <div class="header-marker">
                                <div class="col-md-5 signupbox">
                                    <div class="form-group">
                                        <input type="number" step="any" id="Latitude" name="shopLatitude"
                                            class="location" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" step="any" id="Longitude" name="shopLongitude"
                                            class="location" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" class="btn btn-primary" value="Current Position"
                                            onclick="getLocationConstant()" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" size="50" class="form-control">
                <br>
                <label for="mobile">Mobile: </label>
                <input type="text" name="mobile" id="mobile" size="20" placeholder="+94-*********" class="form-control"required>
                <br>
                <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-outline-primary">
            </form>
        </div>
        <br><br>

    </div>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?keyAIzaSyBByZ9yBJHULD6Va0HlE_vNvfRUvohhxNQ&callback=initMap">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

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