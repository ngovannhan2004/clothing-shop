<!DOCTYPE html>
<html lang="zxx">

@include('home.includes.head')

<body>

<!-- Top Bar -->

<div class="header-to-bar"> HELLO EVERYONE! 25% Off All Products </div>

<!-- Top Bar -->
<!-- Header Area Start -->
@include('home.includes.header')
<!-- Header Area End -->
<div class="offcanvas-overlay"></div>

<!-- OffCanvas Wishlist Start -->
@include('home.includes.wishlist')
<!-- OffCanvas Wishlist End -->
<!-- OffCanvas Cart Start -->
@include('home.includes.cart')
<!-- OffCanvas Cart End -->

<!-- OffCanvas Menu Start -->
@include('home.includes.menu')
<!-- OffCanvas Menu End -->


<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Contact Us</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Contact Area Start -->
<div class="contact-area pt-100px pb-100px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="single-contact">
                            <div class="icon-box">
                                <img src="{{asset('home/assets/images/icons/4.png ')}}" alt="">
                            </div>
                            <div class="info-box">
                                <h5 class="title" >Phone:</h5>
                                <p><a href="tel:0123456789">0765501203</a></p>
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="icon-box">
                                <img src="{{asset('home/assets/images/icons/5.png ')}}" alt="">
                            </div>
                            <div class="info-box">
                                <h5 class="title" >Email:</h5>
                                <p><a href="mailto:demo@example.com">demo@example.com</a></p>
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="icon-box">
                                <img src="{{asset('home/assets/images/icons/6.png ')}}" alt="">
                            </div>
                            <div class="info-box">
                                <h5 class="title" >Address:</h5>
                                <p>Your address goes here</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title" data-aos="fade-up" data-aos-delay="200">Leave a Message</h2>
                            <p>There are many variations of passages of Lorem Ipsum available but the
                                suffered alteration in some form.</p>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="{{asset('home/assets/php/mail.php')}}"  method="post">
                            <div class="row">
                                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                    <input name="name" placeholder="Name*" type="text" />
                                </div>
                                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                    <input name="email" placeholder="Email*" type="email" />
                                </div>
                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                                    <textarea name="message" placeholder="Your Message*"></textarea>
                                    <button class="btn btn-primary mt-4" data-aos="fade-up" data-aos-delay="200" type="submit">Post Comment <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End -->

<!-- map Area Start -->

<div class="contact-map">
    <div id="mapid">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas"
                        src="https://maps.google.com/maps?q=Cầu%20Rồng,%20Đà%20Nẵng&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
            </div>
        </div>
    </div>
</div>

<!-- map Area End -->

<!-- Footer Area Start -->
@include('home.includes.footer')
<!-- Footer Area End -->

<!-- Search Modal Start -->
@include('home.includes.search_modal')
<!-- Search Modal End -->

<!-- Login Modal Start -->
@include('home.includes.login_modal')
<!-- Login Modal End -->

<!-- Global Vendor, plugins JS -->

<!-- Vendor JS -->


@include('home.includes.end')
</body>

</html>
