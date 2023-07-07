<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Styles -->
    @stack('prepend-style')

    @include('includes.style')

    @stack('addon-style')

    <!-- /Styles -->

</head>

<body>
    <!--Navbar-->

    @include('includes.navbar2')

    <!--/Navbar-->



    <!--Content-->

    @yield('content')

    <!--/Content-->


    <!-- Footer -->

    @include('includes.footer')

    <!-- /Footer -->


    <!-- Scripts -->
    @stack('prepend-script')

    @include('includes.script')

    @stack('addon-script')
    <!-- /Scripts -->


</body>

</html>