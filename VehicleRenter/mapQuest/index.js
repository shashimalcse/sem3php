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
        zoom: 5,

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

    var oReq = new XMLHttpRequest(); //New request object
    
    var myJSON = null;
    oReq.onload = function () {

        
        myJSON = JSON.parse(this.responseText);
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        console.log(myJSON)
        console.log(myJSON[0]);
        myJSON.forEach(element => {
            console.log(element);
            
        });
        
        
        //console.log(myJSONOb);//Will alert: 42
        
        var myLayer = L.geoJSON().addTo(map);
        
        myLayer.addData(myJSON);

    };
    oReq.open("get", "data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();

    var geojsonFeature = {
        "type": "Feature",
        "properties": {
            "name": "Coors Field",
            "amenity": "Baseball Stadium",
            "popupContent": "This is where the Rockies play!"
        },
        "geometry": {
            "type": "Point",
            "coordinates": [79.8612, 6.9270]

        }
    };
    //alert(typeof geojsonFeature);





};