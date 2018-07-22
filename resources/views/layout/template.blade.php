@extends('layout.html5')

@section('global-head')
       <!-- Layout CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    @yield('head')
@stop

@section('global-body')
    <head>
        @include('layout.header')
    </head>
    <main>
        @yield('body')
    </main>
    @include('layout.footer')
@endsection

@section('global-script')
    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
    @yield('script')
    @stack('script')
@endsection
