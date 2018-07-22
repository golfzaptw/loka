@extends('layout.template')

@push('style')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/website/header.css') }}"/>--}}
@endpush

@section('body')
    <!-- !PAGE CONTENT! -->
    <div class="container">

    </div>
@endsection

@push('script')
    <script>
        var d = document.getElementById("nav-buy");
        d.className += " w3-text-teal";
    </script>
@endpush
