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

                        <tr>
                            <td class="product-thumbnail">
                                <a href="#"><img class="img-responsive ml-15px" src="{{ $firstItem->product->feature_image_path }}" alt="" /></a>
                            </td>
                            <td class="product-name"><a href="#">{{ $firstItem->product->name }}</a></td>
                            <td class="product-price-cart"><span class="amount">{{ $firstItem->product->price }}</span></td>
                            <td class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $quantity }}" />
                                </div>
                            </td>
                            <td class="product-subtotal">${{ $subtotal }}</td>
                            <td class="product-remove">
                                <a href="{{ route('destroy', $firstItem->id) }}"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('destroy', $firstItem->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
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
