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
            @include('backEnd.inc.header')


            <!-- ========== Left Sidebar Start ========== -->
              @include('backEnd.inc.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        @include('backEnd.inc.page_title')
                        <!-- end page title -->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <section class="section mt-4">
                  @yield('content')
                </section>


                @include('backEnd.inc.footer')
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        @include('backEnd.inc.rightbar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
          @include('backEnd.inc.js_file')

    </body>

</html>