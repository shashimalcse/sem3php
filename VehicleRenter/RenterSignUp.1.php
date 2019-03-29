<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <style type="text/css"></style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <h3>Vehicle Rental SignUp</h3>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style media="screen">
    .column {
        float: left;
        width: 50%;
        top: 10px;
    }
    </style>



</head>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<body>



    Fill the following form: <br><br>
    <form method="post" action="RenterSignUpDb.php">

        <br>
        <input type="text" name="username" id="username" autocomplete="on" required>
        <br>
        First Name:
        <br>
        <input type="text" name="firstName" id="firstName" autocomplete="on">
        <br>
        Last Name:
        <br>
        <input type="text" name="lastName" id="lastName" autocomplete="on">
        <br>
        <br>
        <fieldset>
            <legend>Location</legend>
            Address:
            <input type="text" name="address" id="address" size="75">
            <br>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            Location:
            <button type="button" name="getLocation" onclick="unhideFunction()">get location</button>
            <div id="hideLocation" class="container" style="display: none;">
                <div class="row">

                    <div class="column">
                        <div class="header-marker">
                            <div class="col-md-5 signupbox">

                                <div class="form-group">
                                    <input type="text" name="shopname" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="shopaddress" class="form-control" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input type="button" class="btn btn-primary" value="Get Location"
                                        onclick="getLocationConstant()" />
                                </div>
                                <div class="form-group">
                                    <input type="number" step="any" id="Latitude" name="shopLatitude"
                                        class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <input type="number" step="any" id="Longitude" name="shopLongitude"
                                        class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <select name="shopcategory" class="form-control" required>
                                        <option value="Liquor Bar">Bar</option>
                                        <option value="Juice Bar">Juice bar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="marker-submit" class="btn btn-primary">OK</button>
                                </div>




                            </div>





                        </div>
                    </div>
                    <div class="column">
                        <div id="dvMap" style="width: 500px; height: 500px">
                        </div>
                    </div>

                </div>
            </div>


            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        </fieldset>
        <br>
        <fieldset>
            <legend>Contact</legend>
            Email:
            <input type="email" name="email" id="email" size="50">
            <br>
            Mobile:
            <input type="text" name="mobile" id="mobile" size="20" placeholder="+94-*********" required>
        </fieldset>
        <br>
        <input type="submit" name="insert" id="insert" value="Submit" />



    </form>
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
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
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?keyAIzaSyBByZ9yBJHULD6Va0HlE_vNvfRUvohhxNQ&callback=initMap">
    </script>




    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


</body>

</html>