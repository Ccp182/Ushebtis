<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Thot - Administración Alertas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Ushebtis - Administración Alertas" name="description" />
        <meta content="Themesdesign" name="author" />
        @include('layouts.head')
    </head>

   

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages home-center my-5 pt-5">
            <div class="home-desc-center"> 
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- end Account pages -->

        @include('layouts.vendor-scripts')
    </body>
</html>
