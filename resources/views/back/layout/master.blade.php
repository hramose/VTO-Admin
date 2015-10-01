<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('headermenus')
             @include('back.layout.headermenu')
        @show

        <div class="container">
        @yield('headermenu')
            @yield('content')
        </div>
    </body>
</html>


