<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>Sistema Satisfaccion del Cliente</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    @include('layouts.theme.styles')
    @include('layouts.theme.scripts')

</head>

<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('layouts.theme.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        @include('layouts.theme.topbar')
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">@yield('title')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="javascript:void(0);">@yield('part')</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="row layout-top-spacing">
                    @yield('content')
                </div>
                @include('layouts.theme.footer')
            </div>
        </div>
        <!--  END CONTENT PART  -->
    </div>
</body>

</html>
