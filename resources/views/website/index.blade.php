@extends('layout.template')

@section('head')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/website/header.css') }}"/>--}}
    <style>
        #nav-index{
            color: white!important;
        }
    </style>
@endsection

@section('body')
    <!-- !PAGE CONTENT! -->
    <div class="container">

    </div>
@endsection

@push('script')
    <script>
        var d = document.getElementById("nav-index");
        d.className += " w3-text-teal";
    </script>
@endpush
