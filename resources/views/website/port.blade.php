@extends('layout.template')

@section('head')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/website/header.css') }}"/>--}}
@endsection

@section('body')
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-right:300px;margin-bottom: 50px">
        <div class="w3-content w3-display-container">
            <img class="mySlides" src="https://www.w3schools.com/w3css/img_nature_wide.jpg" style="width:100%">
            <img class="mySlides" src="https://www.w3schools.com/w3css/img_snow_wide.jpg" style="width:100%">
            <img class="mySlides" src="https://www.w3schools.com/w3css/img_mountains_wide.jpg" style="width:100%">

            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var d = document.getElementById("nav-port");
        d.className += " w3-text-teal";
    </script>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex-1].style.display = "block";
        }

        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
@endpush
