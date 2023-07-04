<!-- OffCanvas Menu Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>

    <div class="inner customScroll">

        <div class="offcanvas-menu mb-4">
            <ul>
                <li><a href="{{ route('home') }}"><span class="menu-text">Home</span></a>
                </li>
                <li><a href="#"><span class="menu-text">Shop</span></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#"><span class="menu-text">Shop Page</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('shop_4_column') }}">Shop 4 Column</a></li>
                                <li><a href="{{ route('shop_left_sidebar') }}">Shop Left Sidebar</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="menu-text">Other Shop Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href=" {{ route('cart') }}">Cart Page</a></li>
                                <li><a href=" {{ route('checkout') }}l">Checkout Page</a></li>
                                <li><a href=" {{ route('compare') }}">Compare Page</a></li>
                                <li><a href=" {{ route('wishlist') }}">Wishlist Page</a></li>
                                <li><a href=" {{ route('account') }}">Account Page</a></li>
                                <li><a href=" {{ route('login') }}">Login & Register Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('error')}}">404 Page</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('about') }}">About us</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
            </ul>
        </div>
        <!-- OffCanvas Menu End -->
        <div class="offcanvas-social mt-auto">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- OffCanvas Menu End -->
