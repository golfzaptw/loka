<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Global CSS -->
    @yield('global-head')

</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
<!-- Global Body -->
@yield('global-body')



<!-- Global JavaScript -->
@yield('global-script')
</body>
</html>
