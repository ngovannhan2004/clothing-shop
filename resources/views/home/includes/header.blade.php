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
                            <li class=""><a href="{{ route('shop_4_column') }}">Shop </a>

                            </li>
                            <li class="dropdown "><a href="{{ route('shop_left_sidebar') }}">Blogs</a>
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
                        @if(Auth::check())
                            <a href="#offcanvas-cart"
                               class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num">
                                    @php
                                    $countCart = Auth::user()->carts->count();
                                    @endphp
                                   @if($countCart > 0 && $countCart < 10)
                                       {{$countCart}}
                                   @else
                                       10+
                                   @endif
                                </span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu"
                               class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        @endif
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
