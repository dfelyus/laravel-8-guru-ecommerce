<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="{{asset('/')}}FrontEndSourceFile/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}FrontEndSourceFile/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}FrontEndSourceFile/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('/')}}FrontEndSourceFile/css/owl.carousel.css" type="text/css" media="all" /> <!-- Owl-Carousel-CSS -->
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="{{asset('/')}}FrontEndSourceFile/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
    <!-- //web-fonts -->


    <!--  -->
    <!-- Vendor CSS Files -->
    <link href="{{asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">



    <link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">
    <!--
    <link href="{{asset('/')}}assets/css/style1.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/css/style3.css" rel="stylesheet">
    -->
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid;
            border-radius: 4px;
            background-color: white;

            box-shadow: 8 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 8 1px 3px 8 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }


        .myContainer {
            position: relative;
            text-align: center;
            color: white;
        }

        /* Centered text*/
        .myCenter {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

</head>

<body>
    <!-- banner -->
    @include('FrontEnd.include.banner')
    <!-- //banner -->
    <!-- add-products -->
    @yield('content')

    <!-- footer -->
    @include('FrontEnd.include.footer')
    <!-- //footer -->
    <!-- cart-js -->
    <!-- Vendor JS Files -->
    <script src="{{asset('/')}}assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
    <script src="{{asset('/')}}assets/js/main.js"></script>

    <script src="{{asset('/')}}assets/js/jquery-3.3.1.js"></script>
    <script src="{{asset('/')}}assets/js/popper.js"></script>
    <script src="{{asset('/')}}assets/js/popper.min.js"></script>

    <script src="{{asset('/')}}assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/counterup/counterup.min.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="{{asset('/')}}FrontEndSourceFile/js/minicart.js"></script>
    <script type="text/javascript">
        // <![CDATA[
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            $('#myCarousel').carousel({
                interval: 3000,
                cycle: true
            });
        });
        // ]]>
    </script>
    <script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function(evt) {
            var items, len, i;

            if (this.subtotal() > 0) {
                items = this.items();

                for (i = 0, len = items.length; i < len; i++) {}
            }
        });
    </script>
    <!-- //cart-js -->
    <!-- Owl-Carousel-JavaScript -->
    <script src="{{asset('/')}}FrontEndSourceFile/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items: 3,
                lazyLoad: true,
                autoPlay: true,
                pagination: true,
            });
        });
    </script>
    <!-- //Owl-Carousel-JavaScript -->
    <!-- start-smooth-scrolling -->
    <script src="{{asset('/')}}FrontEndSourceFile/js/SmoothScroll.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}FrontEndSourceFile/js/move-top.js"></script>
    <script type="text/javascript" src="{{asset('/')}}FrontEndSourceFile/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('/')}}FrontEndSourceFile/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('scriptJs')
    <script>
        $(function() {
            $("#example1").dataTable();
            $("#example2").dataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWith": false,
            });
        });
    </script>
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it !",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted !',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
</body>

</html>