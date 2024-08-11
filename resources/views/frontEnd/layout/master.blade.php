<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>admin panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
       
        {{-- css files --}}
         @include('backEnd.inc.css_file')

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            {{-- header  --}}
            @include('frontEnd.inc.header')

            <div class="main-content">

                <!-- End Page-content -->

                <section class="section" style="margin-top: 180px">
                  @yield('content')
                </section>


                @include('backEnd.inc.footer')
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
          @include('backEnd.inc.js_file')

    </body>

</html>