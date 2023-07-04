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

<!-- Shop Page Start  -->
<div class="shop-category-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <!-- Left Side start -->
                    <p><span>12</span> Product Found of <span>30</span></p>
                    <!-- Left Side End -->
                    <div class="shop-tab nav">
                        <a class="active" href="#shop-grid" data-bs-toggle="tab">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </a>
                        <a href="#shop-list" data-bs-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <select class="shop-sort">
                                <option data-display="Relevance">Relevance</option>
                                <option value="1"> Name, A to Z</option>
                                <option value="2"> Name, Z to A</option>
                                <option value="3"> Price, low to high</option>
                                <option value="4"> Price, high to low</option>
                            </select>

                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">

                    <!-- Tab Content Area Start -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="shop-grid">
                                    <div class="row mb-n-30px">
                                        @foreach( $products as $product )
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                             data-aos-delay="200">
                                            <!-- Single Prodect -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="{{ route('product_details', $product->slug)  }}" class="image">
                                                        <img src="{{$product->feature_image_path}}" alt="Product"/>
                                                        <img class="hover-image" src="{{$product->feature_image_path}}"
                                                             alt="Product"/>
                                                    </a>
                                                    <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                                    <div class="actions">
                                                        <a href="{{ route('wishlist') }}" class="action wishlist" title="Wishlist"><i
                                                                class="pe-7s-like"></i></a>
                                                        <a href="#" class="action quickview" data-link-action="quickview"
                                                           title="Quick view" data-bs-toggle="modal"
                                                           data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                        <a href="{{ route('compare') }}" class="action compare" title="Compare"><i
                                                                class="pe-7s-refresh-2"></i></a>
                                                    </div>
                                                    <button title="Add To Cart" class=" add-to-cart">Add
                                                        To Cart
                                                    </button>
                                                </div>
                                                <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Review )</span>
                                            </span>
                                                    <h5 class="title"><a href="{{ route('product_details', $product->slug)  }}">{{$product->name}}
                                                        </a>
                                                    </h5>
                                                    <span class="price">
                                                <span class="new">${{$product->price}}</span>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="shop-list">
                                    @foreach( $products as $product )
                                        <div class="shop-list-wrapper">
                                            <div class="row">

                                                <div class="col-md-5 col-lg-5 col-xl-4">
                                                    <div class="product">
                                                        <div class="thumb">
                                                            <a href="{{ route('product_details', $product->slug)  }}" class="image">
                                                                <img src="{{$product->feature_image_path}}"
                                                                     alt="Product" />
                                                                <img class="hover-image"
                                                                     src="{{$product->feature_image_path}}"
                                                                     alt="Product" />
                                                            </a>
                                                            <span class="badges">
                                                                <span class="new">New</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-lg-7 col-xl-8">
                                                    <div class="content-desc-wrap">
                                                        <div class="content">
                                                            <span class="ratings">
                                                                <span class="rating-wrap">
                                                                    <span class="star" style="width: 100%"></span>
                                                                </span>
                                                                <span class="rating-num">( 5 Review )</span>
                                                            </span>
                                                            <h5 class="title"><a href="{{ route('product_details', $product->slug)  }}">{{$product->name}}</a></h5>
                                                            <p>{{$product->content}}</p>
                                                        </div>
                                                        <div class="box-inner">
                                                            <span class="price">
                                                                <span class="new">$38.50</span>
                                                            </span>
                                                            <div class="actions">
                                                                <a href="{{ route('wishlist') }}" class="action wishlist"
                                                                   title="Wishlist"><i class="pe-7s-like"></i></a>
                                                                <a href="#" class="action quickview"
                                                                   data-link-action="quickview" title="Quick view"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#exampleModal"><i
                                                                        class="pe-7s-search"></i></a>
                                                                <a href="{{ route('compare') }}" class="action compare"
                                                                   title="Compare"><i class="pe-7s-refresh-2"></i></a>
                                                            </div>
                                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                                To Cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->

                    <!--  Pagination Area Start -->
                    <div class="load-more-items text-center mb-md-60px mb-lm-60px mt-30px0px" data-aos="fade-up">
                        <a href="#" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i
                                class="fa fa-refresh ml-15px" aria-hidden="true"></i></a>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget-search">
                        <form id="widgets-searchbox" action="#">
                            <input class="input-field" type="text" placeholder="Search">
                            <button class="widgets-searchbox-btn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget mt-8">
                        <h4 class="sidebar-title">Price Filter</h4>
                        <div class="price-filter">
                            <div class="price-slider-amount">
                                <input type="text" id="amount" class="p-0 h-auto lh-1" name="price"
                                       placeholder="Add Your Price" />
                            </div>
                            <div id="slider-range"></div>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Category</h4>
                        <div class="sidebar-widget-category">
                            @foreach($products as $product)
                            <ul>
                                <li><a href="#" class="selected m-0">{{$product->category->name}} </a></li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Color</h4>
                        <div class="sidebar-widget-list color">
                            <ul>
                                <li><a class="active yellow" href="#"></a></li>
                                <li><a class="black" href="#"></a></li>
                                <li><a class="red" href="#"></a></li>
                                <li><a class="pink" href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Size</h4>
                        <div class="sidebar-widget-list size">
                            <ul>
                                <li><a class="active-2 gray" href="#">S</a></li>
                                <li><a class="gray" href="#">M</a></li>
                                <li><a class="gray" href="#">L</a></li>
                                <li><a class="gray" href="#">XL</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget tag">
                        <h4 class="sidebar-title">Tags</h4>
                        <div class="sidebar-widget-tag">

                            <ul>
                                <li><a href="#"> Dress</a></li>
                                <li><a href="#">Organic</a></li>
                                <li><a href="#">Old Fashion</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Dress</a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget-image">
                        <div class="single-banner">
                            <img src="{{asset('home/assets/images/banner/2.jpg')}}" alt="">
                            <div class="item-disc">
                                <h2 class="title">#bestsellers</h2>
                                <a href="{{ route('shop_4_column') }}" class="shop-link">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End  -->


<!-- Vendor JS -->
@include('home.includes.footer')
<!-- Footer Area End -->

<!-- Search Modal Start -->
@include('home.includes.search_modal')
<!-- Search Modal End -->

<!-- Login Modal Start -->
@include('home.includes.login_modal')
<!-- Login Modal End -->

<!-- Modal -->
@include('home.includes.modal')
<!-- Modal end -->

<!-- Global Vendor, plugins JS -->

<!-- Vendor JS -->
@include('home.includes.end')
</body>

</html>
