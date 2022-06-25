@section('head')

<link href="{{asset('/')}}FrontEndSourceFile/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="{{asset('/')}}FrontEndSourceFile/css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="{{asset('/')}}FrontEndSourceFile/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('/')}}FrontEndSourceFile/css/owl.carousel.css" type="text/css" media="all" /> <!-- Owl-Carousel-CSS -->
<!-- //Custom Theme files -->

<!-- Bootstrap core CSS -->
<link href="{{asset('/')}}BackEndSourceFile/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="{{asset('/')}}BackEndSourceFile/dist/css/adminlte.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="{{asset('/')}}BackEndSourceFile/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Custom styles for this template -->
<!-- Styles -->

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
<link href="{{asset('/')}}assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Vendor CSS Files -->


<link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">
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
        top: 58%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

@endsection
















@extends('FrontEnd.master')
@section('title')
Contact Us
@endsection

@section('heading','Contact us')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.')


@section('content')

<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title">
            <h2>Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member">
                    <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.1s">
                <div class="member">
                    <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
                <div class="member">
                    <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
                <div class="member">
                    <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Team Section -->












<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="">
                <div class="col-md-12  align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bx-map"></i></div>
                        <h4 class="title"><a href="">Our Address</a></h4>
                        <p class="description">A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
                <div class="col-md-12  align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bx-envelope"></i></div>
                        <h4 class="title"><a href="">Email Us</a></h4>
                        <p class="description">info@example.com <br />contact@example.com</p>
                    </div>
                </div>
                <div class="col-md-12  align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bx-phone-call"></i></div>
                        <h4 class="title"><a href="">Call Us</a></h4>
                        <p class="description">+1 5589 55488 55<br />+1 6678 254445 41</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <form class="row" style="margin-top: 30px;font-size: 22px;" id="needs-validation" novalidate>
                <div class="col-sm">
                    <div class="col-md-12">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" required>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="col-md-12">
                        <label for="validationCustom01">Email</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02">Subject</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" required>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Your Message</label>
                        <textarea class="form-control" placeholder="Message" id="exampleFormControlTextarea1" rows="10"></textarea>
                    </div>
                </div>

                <div class="col-sm-8">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>

            </form>
        </div>

    </div>

</div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            var form = document.getElementById('needs-validation');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            var form = document.getElementById('needs-validation');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>




@endsection



@section('foot')
<script src="{{asset('/')}}js/jquery.js"></script>
<script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{asset('/')}}assets/vendor/php-email-form/validate.js"></script>
<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>

<!-- slide menu JS Files -->
<script src="{{asset('/')}}assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}assets/vendor/counterup/counterup.min.js"></script>


<!-- gallery js -->
<script src="{{asset('/')}}assets/vendor/wow/wow.min.js"></script>
<script src="{{asset('/')}}assets/vendor/superfish/superfish.min.js"></script>
<script src="{{asset('/')}}assets/vendor/hoverIntent/hoverIntent.js"></script>


<!-- Template Main JS File -->
<script src="{{asset('/')}}assets/js/main.js"></script>

<script src="{{asset('/')}}assets/js/jquery-3.3.1.js"></script>


<!-- Template Main JS File -->
<script src="{{asset('/')}}FrontEndSourceFile/js/minicart.js"></script>


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

@endsection