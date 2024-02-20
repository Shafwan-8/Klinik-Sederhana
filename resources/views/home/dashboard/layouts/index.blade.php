<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- theme meta -->

    <title>{{ $title }}</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="/plugins/simplebar/simplebar.css" rel="stylesheet" />
    <link href="/plugins/nprogress/nprogress.css" rel="stylesheet" />

    <!-- No Extra plugin used -->
    <link href='/plugins/ladda/ladda.min.css' rel='stylesheet'>


    <link href='/plugins/toastr/toastr.min.css' rel='stylesheet'>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="/css/sleek.css" />

    <!-- FAVICON -->
    <link href="/img/trika.png" rel="shortcut icon" />

    <!-- CSS KAMERA -->
    @yield('cssCamera')

    {{-- jsChart --}}
    @yield('jsChart')

    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/plugins/nprogress/nprogress.js"></script>


</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>




    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

        @include('home.dashboard.layouts.sidebar')

        <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

            @include('home.dashboard.layouts.header')

            <!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
            @yield('content_profile')

            @if (!request()->is('profile*'))
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <!-- Recent Order Table -->
                            @yield('headerContainer')

                            <div class="card card-table-border-none recent-orders" id="recent-orders">
                                @if(!request()->is('pemeriksaan/*/surat*'))
                                <div class="card-header justify-content-between text-dark">
                                    @yield('title')
                                </div>
                                @endif
                                <div class="card-body pt-0 pb-2 text-dark">
                                    @include('home.dashboard.layouts.alert')

                                    @yield('container')
                                </div>
                            </div>
                        </div>
                        @if(Route::currentRouteName() == 'pemeriksaan.create' ||
                             Route::currentRouteName() == 'pemeriksaan.detail' ||
                             Route::currentRouteName() == 'pemeriksaan.edit')
                        <div class="col-12 p-0">
                            <!-- Recent Order Table -->
                            <div class="card card-table-border-none recent-orders" id="recent-orders">
                                <div class="card-body pt-0 pb-2 text-dark">
                                    @yield('container2')
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->
            @endif

            <!-- Footer -->
            <footer class="footer mt-auto d-print-none">
                <div class="copyright bg-white">
                    <p>
                        Kopi Kanan &copy; <span id="copy-year"></span>
                    </p>
                </div>

                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>
        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <script>
        function callToaster(positionClass) {
            if (document.getElementById("toaster")) {
                toastr.options = {
                    closeButton: true,
                    debug: false,
                    newestOnTop: false,
                    progressBar: true,
                    positionClass: positionClass,
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut"
                };
                toastr.success("Selamat datang di Trika Klinik", "Halo, {{ auth()->user()->name }}");
            }
        }

        function hapusData(name, id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                event.preventDefault();
                document.getElementById(`hapus-${name}-${id}`).submit();
            }
        }
        
    </script>

    <script>
        // <!-- Feather -->
        feather.replace();
        @yield('footerJs')
    </script>

    <!-- Javascript -->
    <script src="/js/sleek.js"></script>
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='/plugins/toastr/toastr.min.js'></script>
    <script src="/js/sleek.js"></script>
    <script src="/options/optionswitcher.js"></script>
    <script src='/plugins/ladda/spin.min.js'></script>
    <script src='/plugins/ladda/ladda.min.js'></script>

    <script>        
        /*======== 8. LOADING BUTTON ========*/
        /* 8.1. BIND NORMAL BUTTONS */
        Ladda.bind(".ladda-button", {
            timeout: 5000
        });
    
        /* 7.2. BIND PROGRESS BUTTONS AND SIMULATE LOADING PROGRESS */
        Ladda.bind(".progress-demo button", {
            callback: function(instance) {
            var progress = 0;
            var interval = setInterval(function() {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);
        
                if (progress === 1) {
                instance.stop();
                clearInterval(interval);
                }
            }, 200);
            }
        });
    </script>
    <script src="/options/optionswitcher.js"></script>
    <link href="/options/optionswitch.css" rel="stylesheet">
</body>

</html>