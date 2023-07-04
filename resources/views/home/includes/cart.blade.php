<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>

        <div class="body customScroll">
            <ul class="minicart-product-list">
                <li>
                    <a href="" class="image"><img src="{{asset('home/assets/images/product-image/1.jpg')}}"
                                                                     alt="Cart product Image"></a>
                    <div class="content">
                        <a href="{{ route('product_single') }}" class="title">Women's Elizabeth Coat</a>
                        <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('product_single') }}" class="image"><img src="{{asset('home/assets/images/product-image/2.jpg')}}"
                                                                     alt="Cart product Image"></a>
                    <div class="content">
                        <a href="{{ route('product_single') }}" class="title">Long sleeve knee length</a>
                        <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('product_single') }}" class="image"><img src="{{asset('home/assets/images/product-image/3.jpg')}}"
                                                                     alt="Cart product Image"></a>
                    <div class="content">
                        <a href="{{ route('product_single') }}" class="title">Cool Man Wearing Leather</a>
                        <span class="quantity-price">1 x <span class="amount">$37.34</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="foot">
            <div class="buttons mt-30px">
                <a href="{{ route('cart') }}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                <a href="{{ route('checkout') }}" class="btn btn-outline-dark current-btn">checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Cart End -->
