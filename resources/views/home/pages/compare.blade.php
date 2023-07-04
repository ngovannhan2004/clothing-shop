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
@include('home.includes.breadcrumb_area')

<!-- breadcrumb-area end -->
<!-- Compare Area Start -->
<div class="compare-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <!-- Compare Table -->
                    <div class="compare-table table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td class="first-column">Product</td>
                                @foreach($products as $product)
                                <td class="product-image-title">

                                    <a href="#" class="image"><img class="img-responsive"
                                                                   src="{{$product->feature_image_path}}" alt="Compare Product" /></a>
                                    <a href="#" class="category">{{$product->category->name}}</a>
                                    <a href="#" class="title">{{$product->name}}</a>
                                </td>
                                @endforeach

                            </tr>
                            <tr>
                                <td class="first-column">Description</td>
                                @foreach($products as $product)
                                <td class="pro-desc">
                                    <p>{{$product->description}}</p>
                                </td>
                                @endforeach

                            </tr>
                            <tr>
                                <td class="first-column">Price</td>
                                @foreach($products as $product)
                                <td class="pro-price">${{$product->price}}</td>
                                @endforeach

                            </tr>
                            <tr>
                                <td class="first-column">Color</td>
                                <td class="pro-color">Black</td>
                                <td class="pro-color">Black</td>
                                <td class="pro-color">Black</td>
                            </tr>
                            <tr>
                                <td class="first-column">Stock</td>
                                <td class="pro-stock">In Stock</td>
                                <td class="pro-stock">In Stock</td>
                                <td class="pro-stock">In Stock</td>
                            </tr>
                            <tr>
                                <td class="first-column">Add to cart</td>
                                <td class="pro-addtocart">
                                    <a href="#" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a>
                                </td>
                                <td class="pro-addtocart">
                                    <a href="#" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a>
                                </td>
                                <td class="pro-addtocart">
                                    <a href="#" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="first-column">Delete</td>
                                <td class="pro-remove">
                                    <button><i class="fa fa-trash-o"></i></button>
                                </td>
                                <td class="pro-remove">
                                    <button><i class="fa fa-trash-o"></i></button>
                                </td>
                                <td class="pro-remove">
                                    <button><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="first-column">Rating</td>
                                <td class="pro-ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="pro-ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="pro-ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Compare Area End -->

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
