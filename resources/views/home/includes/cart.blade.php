<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>

        <div class="body customScroll">
            <ul class="minicart-product-list">
                @php
                    $user = Auth::user();
                    $groupedCarts = $user ? $user->carts->groupBy('product_id') : collect();
                @endphp

                @if($user)
                    @foreach ($groupedCarts as $productCarts)
                        @php
                            $firstItem = $productCarts->first();
                            $quantity = $productCarts->sum('quantity');
                            $subtotal = $firstItem->product->price * $quantity;
                        @endphp
                        <li>
                            <a href="" class="image"><img src="{{ $firstItem->product->feature_image_path }}" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="   " class="title">{{ $firstItem->product->name }}</a>
                                <span class="quantity-price"> {{ $quantity }} x <span class="amount">${{ $firstItem->product->price }}</span></span>
                                <a href="#" class="remove">×</a>
                            </div>
                        </li>

                    @endforeach
                @endif

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
