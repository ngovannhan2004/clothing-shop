<header>
    <div class="header-main sticky-nav ">
        <div class="container position-relative">
            <div class="row">
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="{{ route('home') }}"><img src="{{asset('home/assets/images/logo/logo.png')}}" alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col align-self-center d-none d-lg-block">
                    <div class="main-menu">
                        <ul>
                            <li class=""><a href="{{ route('home') }} ">Home</a>
                            </li>
                            <li class="dropdown position-static"><a href="#">Shop <i
                                        class="pe-7s-angle-down"></i></a>
                                <ul class="mega-menu d-block">
                                    <li class="d-flex">
                                        <ul class="d-block">

                                            <li class="title"><a href="#">Shop Page</a></li>
                                            <li><a href="{{ route('shop_4_column') }}">Shop 4 Column</a></li>
                                            <li><a href="{{ route('shop_left_sidebar') }}">Shop Left Sidebar</a></li>

                                        </ul>

                                        <ul class="d-block">
                                            <li class="title"><a href="#">Other Shop Pages</a></li>
                                                <li><a href=" {{ route('cart') }}">Cart Page</a></li>
                                                <li><a href=" {{ route('compare') }}">Compare Page</a></li>
                                                <li><a href=" {{ route('wishlist') }}">Wishlist Page</a></li>
                                                <li><a href=" {{ route('account') }}">Account Page</a></li>


                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">Pages</a></li>
                                            <li><a href="{{route('error')}}">404 Page</a></li>
                                            <li><a href=" {{ route('login') }}">Login & Register Page</a></li>
                                            <li><a href=" {{ route('checkout') }}">Checkout Page</a></li>
                                        </ul>
                                    </li>
                                    <li>

                                        <ul class="menu-banner w-100">
                                            <li>
                                                <a class="p-0" href="{{ route('shop_left_sidebar') }}"><img
                                                        class="img-responsive w-100"
                                                        src="{{asset('home/assets/images/banner/7.jpg')}}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="p-0" href="{{ route('shop_left_sidebar') }}"><img
                                                        class="img-responsive w-100"
                                                        src="{{asset('home/assets/images/banner/8.jpg')}}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="p-0" href="{{ route('shop_left_sidebar') }}"><img
                                                        class="img-responsive w-100"
                                                        src="{{asset('home/assets/images/banner/9.jpg')}}" alt=""></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown "><a href="#">Blogs <i class="pe-7s-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('shop_left_sidebar') }}">Single Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('about') }}">About us</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Action Start -->
                <div class="col col-lg-auto align-self-center pl-0">
                    <div class="header-actions">
                        <a href="{{ route('login') }}" class="header-action-btn login-btn" data-bs-toggle="modal"
                           data-bs-target="#loginActive">Sign In</a>
                        <!-- Single Wedge Start -->
                        <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                            <i class="pe-7s-search"></i>
                        </a>
                        <!-- Single Wedge End -->
                        <!-- Single Wedge Start -->
                        <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                            <i class="pe-7s-like"></i>
                        </a>
                        <!-- Single Wedge End -->
                        <a href="#offcanvas-cart"
                           class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                            <i class="pe-7s-shopbag"></i>
                            <span class="header-action-num">01</span>
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                        <a href="#offcanvas-mobile-menu"
                           class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="pe-7s-menu"></i>
                        </a>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
