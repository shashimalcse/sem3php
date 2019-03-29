<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=divice-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
    .column {
        float: left;
        width: 50%;
        top: 10px;


    }
    </style>

</head>

<body>
    <div id="test" class="hello"></div>
    <div class="form-group">
        <label for="vehicleType">Select Vehicle Type : </label>
        <select name="vehicleType" id="vehicleType" class="custom-select">
            <option selected>Choose one</option>
            <option value="Car">Car</option>
            <option value="Van">Van</option>
            <option value="SUV">SUV</option>
            <option value="Cab">Cab</option>
            <option value="Bike">Bike</option>
            <option value="Bus">Bus</option>
        </select>
    </div>
    <button type="button" name="getLocation" onclick="unhideFunction()">get location</button>
    <div id="hideLocation" style="display: none;">
        <div class="container">
            <div class="row">

                <div class="column">
                    <div class="header-marker">
                        <div class="col-md-5 signupbox">
                            <form class="form-markers" action="includes/markers.inc.php" method="post">
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



    

    <?php
    $dom = new DOMDocument();
    //$dom->validate();
    try {
        //code...
        if($dom->loadHTMLFile("test.php")){
            echo('noice');
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    
    //$dom->validate();
    $div = $dom->getElementById('test');
    if($div!= null){
        echo('nope');
    }
    //print_r($div);

?>


</body>

</html>