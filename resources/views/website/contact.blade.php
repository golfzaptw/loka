@extends('layout.template')

@section('head')

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <script>
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();
        // arrays to hold copies of the markers and html used by the side_bar
        // because the function closure trick doesnt work there
        var gmarkers = [];
        var htmls = [];

        // arrays to hold variants of the info window html with get direction forms open
        var to_htmls = [];
        var from_htmls = [];

        // global "map" variable
        var map = null;

        var infowindow = new google.maps.InfoWindow({
            size: new google.maps.Size(150, 50)
        });


        function initialize() {

            var location = new google.maps.LatLng(18.8, 99);

            var mapOptions = {
                center: location,
                zoom: 11,
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById("map"),
                mapOptions);

            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById("directionsPanel"));
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });

            var image = {
                url: 'http://maps.google.com/mapfiles/ms/micons/blue.png'
            };
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: image,
                title: 'TMP WATER HILL .Co,Ltd'
            });

            var i = gmarkers.length;
            latlng = location;

            // The info window version with the "to here" form open
            to_htmls[i] = html + '<br>Directions: <b>To here<\/b> - <a href="javascript:fromhere(' + i + ')">From here<\/a>' +
                '<br>Start address:<form action="javascript:getDirections()">' +
                '<input type="text" SIZE=40 MAXLENGTH=40 name="saddr" id="saddr" value="" /><br>' +
                '<INPUT value="Get Directions" TYPE="button" onclick="getDirections()"><br>' +
                'Walk <input type="checkbox" name="walk" id="walk" /> &nbsp; Avoid Highways <input type="checkbox" name="highways" id="highways" />' +
                '<input type="hidden" id="daddr" value="' + latlng.lat() + ',' + latlng.lng() +
                '"/>';
            // The info window version with the "from here" form open
            from_htmls[i] = html + '<br>Directions: <a href="javascript:tohere(' + i + ')">To here<\/a> - <b>From here<\/b>' +
                '<br>End address:<form action="javascript:getDirections()">' +
                '<input type="text" SIZE=40 MAXLENGTH=40 name="daddr" id="daddr" value="" /><br>' +
                '<INPUT value="Get Directions" TYPE="SUBMIT"><br>' +
                'Walk <input type="checkbox" name="walk" id="walk" /> &nbsp; Avoid Highways <input type="checkbox" name="highways" id="highways" />' +
                '<input type="hidden" id="saddr" value="' + latlng.lat() + ',' + latlng.lng() +
                '"/>';
            // The inactive version of the direction info
            var html = marker.getTitle() + '<br>Directions: <a href="javascript:tohere(' + i + ')">To here<\/a> - <a href="javascript:fromhere(' + i + ')">From here<\/a>';
            var contentString = html;

            google.maps.event.addListener(marker, 'click', function() {
                map.setZoom(15);
                map.setCenter(marker.getPosition());
                infowindow.setContent(contentString);
                infowindow.open(map, marker);
            });
            // save the info we need to use later for the side_bar
            gmarkers.push(marker);
            htmls[i] = html;
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        // ===== request the directions =====
        function getDirections() {
            // ==== Set up the walk and avoid highways options ====
            var request = {};
            if (document.getElementById("walk").checked) {
                request.travelMode = google.maps.DirectionsTravelMode.WALKING;
            } else {
                request.travelMode = google.maps.DirectionsTravelMode.DRIVING;
            }

            if (document.getElementById("highways").checked) {
                request.avoidHighways = true;
            }
            // ==== set the start and end locations ====
            var saddr = document.getElementById("saddr").value;
            var daddr = document.getElementById("daddr").value;

            request.origin = saddr;
            request.destination = daddr;
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else alert("Directions not found:" + status);
            });
        }


        // This function picks up the click and opens the corresponding info window
        function myclick(i) {
            google.maps.event.trigger(gmarkers[i], "click");
        }


        // functions that open the directions forms
        function tohere(i) {
            // gmarkers[i].openInfoWindowHtml(to_htmls[i]);
            infowindow.setContent(to_htmls[i]);
            infowindow.open(map, gmarkers[i]);
        }

        function fromhere(i) {
            // gmarkers[i].openInfoWindowHtml(from_htmls[i]);
            infowindow.setContent(from_htmls[i]);
            infowindow.open(map, gmarkers[i]);
        }

        // This Javascript is based on code provided by the
        // Community Church Javascript Team
        // http://www.bisphamchurch.org.uk/
        // http://econym.org.uk/gmap/
        // from the v2 tutorial page at:
        // http://econym.org.uk/gmap/basic3.htm

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection

@section('body')
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-right:300px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div id="map" style="width:100%;height:400px"></div>
                </div>
                <div class="col-lg-6">
                    <form action="/action_page.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
                        <h2 class="w3-center">Contact Us</h2>

                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border" name="first" type="text" placeholder="First Name">
                            </div>
                        </div>

                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border" name="last" type="text" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
                            </div>
                        </div>

                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone">
                            </div>
                        </div>

                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border" name="message" type="text" placeholder="Message">
                            </div>
                        </div>

                        <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var d = document.getElementById("nav-contact");
        d.className += " w3-text-teal";
    </script>
@endpush
