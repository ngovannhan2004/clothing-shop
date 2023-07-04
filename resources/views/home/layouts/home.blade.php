<!DOCTYPE html>
<html lang="zxx">

@include('home.includes.head')

<body>

<!-- Top Bar -->

<div class="header-to-bar"> HELLO EVERYONE! 25% Off All Products</div>

<!-- Top Bar -->
<!-- Header Area Start -->

@include('home.includes.header')
<!-- Header Area End -->
<div class="offcanvas-overlay"></div>

@include('home.includes.wishlist')
@include('home.includes.cart')

@include('home.includes.menu')

<!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide d-flex bg-color1">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">Offer 2023</span>
                                <h2 class="title-1">Sale Up To </h2>
                                <h2 class="title-2"><span>50%</span> Off</h2>
                                <a href="{{ route('shop_left_sidebar') }}" class="btn btn-lg btn-primary btn-hover-dark"> Shop Now
                                    <i
                                        class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div
                            class="col-xl-7 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="{{asset('home/assets/images/slider-image/slider-1.png ')}}" alt=""/>
                                </div>
                                <div class="display-wrapper">
                                    <div class="content-side">
                                        <h4 class="title">Full Dress</h4>
                                        <span class="price">$21.00</span>
                                        <a href="{{ route('shop_left_sidebar') }}" class="shop-link">Shop Now</a>
                                    </div>
                                    <div class="image-side">
                                        <img src="{{asset('home/assets/images/slider-image/display-image.png')}}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide d-flex bg-color2">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">Offer 2023</span>
                                <h2 class="title-1">Sale Up To </h2>
                                <h2 class="title-2"><span>50%</span> Off</h2>
                                <a href="{{ route('shop_left_sidebar') }}" class="btn btn-lg btn-primary btn-hover-dark"> Shop Now
                                    <i
                                        class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div
                            class="col-xl-7 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="{{asset('home/assets/images/slider-image/slider-2.png')}}" alt=""/>
                                </div>
                                <div class="display-wrapper">
                                    <div class="content-side">
                                        <h4 class="title">Full Dress</h4>
                                        <span class="price">$21.00</span>
                                        <a href="{{ route('shop_left_sidebar') }}" class="shop-link">Shop Now</a>
                                    </div>
                                    <div class="image-side">
                                        <img src="{{asset('home/assets/images/slider-image/display-image.png')}}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- Hero/Intro Slider End -->

<!-- Banner Area Start -->
<div class="banner-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="single-col">
                <a href="{{ route('shop_left_sidebar') }}" class="single-banner">
                    <img src="{{asset('home/assets/images/banner/1.jpg')}}" alt="">
                    <div class="item-disc">
                        <span class="item-title">Women</span>
                        <span class="item-amount">16 items</span>
                    </div>
                </a>
            </div>
            <div class="single-col center-col">
                <div class="single-banner">
                    <img src="{{asset('home/assets/images/banner/2.jpg ')}}" alt="">
                    <div class="item-disc">
                        <h2 class="title">#bestsellers</h2>
                        <a href="{{ route('shop_left_sidebar') }}" class="shop-link">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="single-col">
                <a href="{{ route('shop_left_sidebar') }}" class="single-banner">
                    <img src="{{asset('home/assets/images/banner/3.jpg ')}}" alt="">
                    <div class="item-disc">
                        <span class="item-title">Nomen</span>
                        <span class="item-amount">16 items</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

@include('home.includes.feature')

@include('home.includes.product_area')

<!-- Deal Area Start -->
<div class="deal-area pb-100px pt-100px">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="deal-inner deal-bg position-relative pt-100px pb-100px"
                     data-bg-image="{{asset('home/assets/images/deal-img/deal-bg.jpg')}}">
                    <div class="deal-wrapper">
                        <span class="category">#FASHION SHOP</span>
                        <h3 class="title">Deal Of The Day</h3>
                        <div class="deal-timing">
                            <div data-countdown="2021/05/15"></div>
                        </div>
                        <a href="{{ route('shop_left_sidebar') }}" class="btn btn-lg btn-primary btn-hover-dark m-auto">
                            Shop
                            Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                    </div>
                    <div class="deal-image">
                        <img class="img-fluid" src="{{asset('home/assets/images/deal-img/woman.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Area End -->

@include('home.includes.testimonial')

@include('home.includes.brand')

@include('home.includes.footer')

@include('home.includes.search_modal')

@include('home.includes.login_modal')

@include('home.includes.modal')

<!-- Global Vendor, plugins JS -->

<!-- Vendor JS -->
@include('home.includes.end')
</body>

</html>
