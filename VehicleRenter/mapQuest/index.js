//this is to use offline json file. IT works!!!
// var jsonOb = null;
// $.getJSON("renter.json", function (data) {
//     jsonOb = data;
//     console.log(jsonOb);
// });

// function reqListener () {
//     console.log(this.responseText);
//   }
window.onload = function () {
    L.mapquest.key = 'DVCBD2Ox8xqJfaPbtLgTMLBAHsWN6XbB';

    var map = L.mapquest.map('map', {
        center: [6.9271510828, 79.845242500], //lat,long
        layers: L.mapquest.tileLayer('map'),
        zoom: 8,

    });

    map.addControl(L.mapquest.geocodingControl({
        position: 'topright',
        searchAhead: true,
        searchAheadOptions: {
            countryCode: 'LK',
        }
    }));
    map.addControl(L.mapquest.control({
        position: 'bottomright',
    }));

    let directionsControl = L.mapquest.directionsControl({
        className: '',
        directions: {
            options: {
                timeOverage: 25,
                doReverseGeocode: false,
            }
        },
        directionsLayer: {
            startMarker: {
                title: 'Drag to change location',
                draggable: true,
                icon: 'marker-start',
                iconOptions: {
                    size: 'sm'
                }
            },
            endMarker: {
                draggable: true,
                title: 'Drag to change location',
                icon: 'marker-end',
                iconOptions: {
                    size: 'sm'
                }
            },
            viaMarker: {
                title: 'Drag to change route'
            },
            routeRibbon: {
                showTraffic: true
            },
            alternateRouteRibbon: {
                showTraffic: true
            },
            paddingTopLeft: [450, 20],
            paddingBottomRight: [180, 20],
        },
        startInput: {
            compactResults: true,
            disabled: false,
            location: {},
            placeholderText: 'Starting point or click on the map...',
            geolocation: {
                enabled: true
            },
            clearTitle: 'Remove starting point'
        },
        endInput: {
            compactResults: true,
            disabled: false,
            location: {},
            placeholderText: 'Destination',
            geolocation: {
                enabled: true
            },
            clearTitle: 'Remove this destination'
        },
        addDestinationButton: {
            enabled: true,
            maxLocations: 10,
        },
        routeTypeButtons: {
            enabled: true,
        },
        reverseButton: {
            enabled: true,
        },
        optionsButton: {
            enabled: true,
        },
        routeSummary: {
            enabled: true,
            compactResults: false,
        },
        narrativeControl: {
            enabled: true,
            compactResults: false,
            interactive: true,
        }
    }).addTo(map);
    var checkB1 = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="hotels" checked><label class="custom-control-label" for="hotels">Hotels</label></div>';
    var checkB2 = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="vehicles" checked><label class="custom-control-label" for="vehicles">Vehicles</label></div>';
    var checkB3 = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="shops"><label class="custom-control-label" for="shops">Shops</label></div>';
    var checkbox = '<div class= "checkboxes">'+checkB1+checkB2+checkB3+'</div>';
    $(".options-control-container").append(checkbox);
    //$(".options-control-container").append(checkB2);
    //
    // Geolocation to get positions.
    $(".custom-control-input").change(function(){
        if(this.checked == true){
            alert(this.id);
        }
        else{

        }
    });
    $.ajax({

        url: 'data.php',
        
        type: 'POST',
        
        data:'type='+'vehiclerenter',
        
        //async: true,
        async: true,
        
        success: function (data) {
            myJSON = JSON.parse(data);
            var myLayer = L.geoJSON().addTo(map);
            myLayer.addData(myJSON);
            console.log(data);
            
            console.log(JSON.parse(data));

        //     var myLayer2 = L.geoJSON().addTo(map);
        //     myLayer2.addData(JSON.stringify(data));
        // alert(data);
        
        },
        
        });
    // var oReq = new XMLHttpRequest(); //New request object
    // var myJSON = null;

    // oReq.onload = function () {
    //     myJSON = JSON.parse(this.responseText);
    //     var myLayer = L.geoJSON().addTo(map);
    //     //var myLayer = L.featureGroup().addTo(map);
    //     myLayer.addData(myJSON);
    //     var mark = L.marker([7.2513, 80.3464], {
    //         title: 'this is ur current position',
    //         properties: {
    //             name: "first"
    //         }
    //     });


    //     myLayer.on("click", markerOnClick);
    //     var props;
    //     var geometry;
    //     var type;
    //     function markerOnClick(e) {


    //         var div = $('<div/>');
    //         div.append('Hello World!');
    //         props = e.layer.feature.properties;
    //         geometry = e.layer.feature.geometry;
    //         type = e.layer.feature.type;
    //         console.log(props);
    //         console.log(geometry);
    //         console.log(type);
    //         $.dialog({
    //             "body": div,
    //             "title": "Details",
    //             "show": true,
    //             "modal": true
    //         });

    //     }
        


    // };
    // oReq.open("get", "data.php", true);
    // // Don't block the rest of the execution.Don't wait until the request finishes to  continue.                             
    // oReq.send();

    function createCircle(lat, lon, radius) {
        L.circle([lat, lon], {
            radius: radius
        }).addTo(map);
    }








};

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2 - lat1); // deg2rad below
    var dLon = deg2rad(lon2 - lon1);
    var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c; // Distance in km
    return d;
}

function deg2rad(deg) {
    return deg * (Math.PI / 180)
}

