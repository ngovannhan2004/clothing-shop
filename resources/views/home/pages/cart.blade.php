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
@include('home.includes.breadcrumb_area')

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Until Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $groupedCarts = Auth::user()->carts->groupBy('product_id');
                            @endphp

                            @foreach ($groupedCarts as $productCarts)
                                @php
                                    $firstItem = $productCarts->first();
                                    $quantity = $productCarts->sum('quantity');
                                    $priceWithQuantity = $firstItem->product->price * $quantity;
                                @endphp

                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px"
                                                         src="{{ $firstItem->product->feature_image_path }}"
                                                         alt=""/></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{ $firstItem->product->name }}</a></td>
                                    <td class="product-price-cart"><span
                                            class="amount">${{$priceWithQuantity }}</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                   value="{{ $quantity }}"/>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"> ${{$priceWithQuantity }}</td>
                                    <td class="product-remove">
                                        <a href="{{ route('update', $firstItem->id) }}"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="{{ route('destroy', $firstItem->id) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="#">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    <a href="#">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Region / State
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select mb-25px">
                                        <label>
                                            * Zip/Postal Code
                                        </label>
                                        <input type="text"/>
                                    </div>
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name"/>
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            @php
                                $totalProductsPrice = 0;
                            @endphp

                            @foreach ($groupedCarts as $productCarts)
                                @php
                                    $firstItem = $productCarts->first();
                                    $quantity = $productCarts->sum('quantity');
                                    $priceWithQuantity = $firstItem->product->price * $quantity;
                                    $totalProductsPrice += $priceWithQuantity;
                                @endphp
                            @endforeach

                            <h5>Total products <span>${{ $totalProductsPrice }}</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    @foreach($groupedCarts as $productCarts)
                                        @php
                                            $firstItem = $productCarts->first();
                                            $quantity = $productCarts->sum('quantity');
                                            $priceWithQuantity = $firstItem->product->price * $quantity;
                                        @endphp
                                        <li>
                                            <input type="checkbox" data-price="{{ $priceWithQuantity }}" class="shipping-checkbox" />
                                            {{ $firstItem->product->name }}
                                            <span>{{ $priceWithQuantity }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <h4 class="grand-totall-title" id="grand-total-title">Grand Total <span>${{ $totalProductsPrice }}</span></h4>
                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->

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
