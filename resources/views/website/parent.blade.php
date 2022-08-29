<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.graygrids.com/themes/classigrids-demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Mar 2022 22:30:06 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tryaq</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo.png') }}" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/main.css') }}" />
    @yield('styles')

</head>

<body>
    <!--[if lte IE 9]>t
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>


    <header class="header navbar-area">
        <div class="container" >
            <div class="row align-items-center">
                <div class="col-lg-12" >
                    <div class="nav-inner" >
                        <nav class="navbar navbar-expand-lg d-flex justify-content-between" >
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ asset('/images/logo2.png') }}" alt="Logo">
                            </a>


                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')




    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('website/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/main.js') }}"></script>
    @yield('scripts')
    <script type="text/javascript">
        //========= Category Slider
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });

        //========= testimonial
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 2,
                }
            }
        });
    </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/classigrids-demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Mar 2022 22:30:34 GMT -->

</html>
