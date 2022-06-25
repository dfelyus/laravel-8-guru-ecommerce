<script>
    var tabQty = {};
</script>



<!-- ======= Footer ======= -->
<div class="container">
    <div>
        <iframe src="{{$set_->map}}" width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>{{config('app.name')}}<span>.</span></h3>
                        <p>
                            {{$set_->address}} <br>
                            {{$set_->country}}<br><br>
                            <strong>Phone:</strong>{{$set_->phone_number}}<br>
                            <strong>Email:</strong> {{$set_->email}}<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('menu')}}">Menu</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('contact_us')}}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('banquet_facility')}}">banquet facility</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('images')}}">gallery</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('catering')}}">catering</a></li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('menu_kit_pages')}}">menu kit pages</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('terms_and_conditions')}}">Terms and conditions</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('disclaimer')}}">Disclaimer</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('visiting_hours')}}">Visiting Hours</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('privacy_policy')}}">privacy policy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('online_booking')}}">online booking</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">

                    </form>
                    <img src="{{asset('/')}}FrontEndSourceFile/images/i1.png" class="sub-w3lsimg" alt="" width="100" />
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{$set_->footerlogo}}" class="sub-w3lsimg" alt="" width="120" />
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>{{config('app.name')}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Made by <a href="https://Elyus77.com/">Elyus Team</a>
        </div>
    </div>
</footer><!-- End Footer -->