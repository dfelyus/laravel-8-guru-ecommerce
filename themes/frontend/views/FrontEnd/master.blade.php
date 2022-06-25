<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- CSRF Token -->
    @yield('tokken')

    @include('FrontEnd.include.main_head')

    @yield('head')


</head>

<body>


    @include('FrontEnd.include.banner')

    <div style="background-image: url(@yield('bg-img'))">
        @yield('content')
    </div>



    @include('FrontEnd.include.footer')

    @yield('foot')

    @include('FrontEnd.include.main_foot')

</body>

</html>