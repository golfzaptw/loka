@extends('layout.template')

@section('head')
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script>

        var map;

        var markerData =
            [    @foreach($petani as $data)
            {lat: "{{$data->lat}}", lng: "{{$data->lng}}", zoom: 8, name: "{{$data->name}}"},
                @endforeach
            ];
        function initialize() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: {lat: 18.8, lng: 99}
            });
            markerData.forEach(function (data) {
                var newmarker = new google.maps.Marker({
                    map: map,
                    position: {lat: data.lat, lng:data.lng },
                    title: data.name
                });
                jQuery("#selectlocation").append('<option value="' + [data.lat, data.lng, data.zoom].join('|') + '">' + data.name + '</option>');
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);

        jQuery(document).on('change', '#selectlocation', function () {
            var latlngzoom = jQuery(this).val().split('|');
            var newzoom = 1 * latlngzoom[2],
                newlat = 1 * latlngzoom[0],
                newlng = 1 * latlngzoom[1];
            map.setZoom(newzoom);
            map.setCenter({lat: newlat, lng: newlng});
        });

    </script>
@endsection

@section('body')
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-right:300px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <i class="fas fa-user"></i>ต<label for="sel2">ัวแทนจำหน่าย</label>
                        <select class="form-control" id="selectlocation" style="height: auto">
                            <option value="18.8|99|14">Original Map</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="map" style="width:100%;height:500px"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        var d = document.getElementById("nav-sales");
        d.className += " w3-text-teal";
    </script>
@endpush
