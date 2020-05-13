@extends('users.master')
{{--  --}}
@section('title', 'Trang chủ')
@section('content')
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach($option as $item)
                <?php $imgs = explode('+img+', $item->slides) ?>
                @foreach($imgs as $img)
                    <img class="single-slider bg-img home-slide" src="{{ $img }}">
                @endforeach
            @endforeach
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- product-area-start -->
    <div class="product-area pt-95 xs-mb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="section-title text-center mb-50">
                        <h2>Sản phẩm nổi bật</h2>
                        <p>Tổng hợp các sản phẩm nổi bật và bán chạy nhất <br/> Chắc chắn bạn sẽ tìm được chính xác
                            những gì bạn muốn</p>
                    </div>
                </div>
            </div>
            <!-- tab-area-start -->
            @if(!empty($productRepository))
                <div class="tab-content">
                    <!-- single-product-start -->
                    @foreach($productRepository as $product)
                        @if($product->is_feature == 1)
                            <div class="col-xs-6 col-sm-3 product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{$product->avatar}}" style="height: 350px" width="100%" alt="book"
                                             class="primary"/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="#" data-target="#product_{{$product->id}}"
                                           data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span> <br></li>
                                            @if(!empty($product->sale) && $product->sale > 0)
                                            <li><span class="discount-percentage">-{{$product->sale}}%</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{url('/')}}san_pham/{{$product->id}}">{{$product->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($product->sale > 0)
                                                <li>{{number_format($product->price)}} đ</li>
                                                <li class="old-price">
                                                    ${{number_format(($product->sale)*($product->price)/100)}} đ
                                                </li>
                                            @else
                                                <li>{{number_format($product->price)}} đ</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="{{url('/')}}cart/add/{{$product->id}}" title="Add to cart">
                                            <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                                        </a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li>
                                                <a href="{{url('/')}}san_pham/{{$product->id}}" title="Details">
                                                    <i class="fa fa-external-link-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p class="text-center"><i>Không có dữ liệu!</i></p>
            @endif
        <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->
    <!-- banner-area-start -->
    <div class="banner-area-5 mtb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img-2">
                        <a href="#"><img src="{{asset('/frontend/img/banner/5.jpg')}}" alt="banner" width="100%"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- bestseller-area-start -->
    <div class="new-book-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                        <h2>Sản phẩm giảm giá nhiều nhất</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel owl-loaded owl-drag">
                @if(!empty($productSale))
                    @foreach($productSale as $product)
                        <div class="tab-total">
                            <!-- single-product-start -->
                            <div class="col-xs-6 col-sm-3 product-wrapper mb-40">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{$product->avatar}}" style="height: 350px" width="100%" alt="book"
                                             class="primary"/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="#" data-target="#product_{{$product->id}}"
                                           data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            @if(!empty($product->sale) && $product->sale > 0)
                                            <li><span class="discount-percentage">-{{$product->sale}}%</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{url('/')}}san_pham/{{$product->id}}">{{$product->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($product->sale > 0)
                                                <li>{{number_format($product->price)}} đ</li>
                                                <li class="old-price">{{number_format(($product->sale)*($product->price)/100)}}
                                                    đ
                                                </li>
                                            @else
                                                <li>{{number_format($product->price)}} đ</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="{{url('/')}}cart/add/{{$product->id}}" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="{{url('/')}}san_pham/{{$product->id}}" title="Details"><i
                                                        class="fa fa-external-link-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-end -->
                        </div>
                    @endforeach
                @else
                    <p class="text-center"><i>Không có dữ liệu!</i></p>
                @endif
            </div>
        </div>
    </div>
    <!-- bestseller-area-end -->
    <!-- new-book-area-start -->
    <div class="new-book-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                        <h2>Sản phẩm mới</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel owl-loaded owl-drag">
                @if(!empty($product_new))
                    @foreach($product_new as $product)
                        <div class="tab-total">
                            <!-- single-product-start -->
                            <div class="col-xs-6 col-sm-3 product-wrapper mb-40">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{$product->avatar}}" style="height: 350px" width="100%" alt="book" class="primary"/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="#" data-target="#product_{{$product->id}}"
                                           data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            @if(!empty($product->sale) && $product->sale > 0)
                                            <li><span class="discount-percentage">-{{$product->sale}}%</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{url('/')}}san_pham/{{$product->id}}">{{$product->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($product->sale > 0)
                                                <li>{{number_format($product->price)}} đ</li>
                                                <li class="old-price">{{number_format(($product->sale)*($product->price)/100)}}
                                                    đ
                                                </li>
                                            @else
                                                <li>{{number_format($product->price)}} đ</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="{{url('/')}}cart/add/{{$product->id}}" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="{{url('/')}}san_pham/{{$product->id}}" title="Details"><i
                                                        class="fa fa-external-link-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- single-product-end -->
                        </div>
                    @endforeach
                @else
                    <p class="text-center"><i>Không có dữ liệu!</i></p>
                @endif
            </div>
        </div>
    </div>
    <!-- new-book-area-start -->
    <!-- banner-static-area-start -->

    <!-- END section -->

    {{-- show detail --}}
    @foreach($productRepository as $product)
        <div class="modal fade productModal" id="product_{{$product->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding: 0 20px;border: none;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="modal-tab">
                                    <?php $imgs = explode('+img+', $product->images); ?>
                                    <div class="product-details-large tab-content text-center">
                                        <?php $j = 1; ?>
                                        @foreach($imgs as $img)
                                            @if($j == 1)
                                                <div class="tab-pane active" id="image-{{$j}}">
                                                    <img src="{{$img}}" alt="" style="width: 300px; height: 380px"/>
                                                </div>
                                            @else
                                                <div class="tab-pane" id="image-{{$j}}">
                                                    <img src="{{$img}}" alt="" style="width: 300px; height: 380px"/>
                                                </div>
                                            @endif
                                            <?php $j++; ?>
                                        @endforeach
                                    </div>
                                    <br>
                                    <div class="product-details-small quickview-active owl-carousel text-center">
                                        <?php $j = 1; ?>
                                        @foreach($imgs as $img)
                                            @if($j == 1)
                                                <a class="active" href="#image-{{$j}}"><img src="{{$img}}" alt=""
                                                                                            style="width: 80px; height: 100px"/></a>
                                            @else
                                                <a href="#image-{{$j}}"><img src="{{$img}}" alt=""
                                                                             style="width: 80px; height: 100px"/></a>
                                            @endif
                                            <?php $j++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="modal-pro-content">
                                    <h3>{{$product->name}}</h3>
                                    <div class="price">
                                        <b class="text-warning">{{number_format($product->price)}} đ</b>
                                    </div>
                                    <p>{{$product->short_description}} ...</p>
                                    <br>
                                    <form action="#">
                                        <input type="number" value="1" width="50px" class="input-number-product-to-cart"/>
                                        <span class="clear-both">
                                            <i class="fa fa-check text-success"></i>
                                                @if($product->status)
                                                    Còn hàng
                                                @else
                                                    Hết hàng
                                                @endif
                                        </span>
                                        <a type="button" href="{{url('/')}}cart/add/{{$product->id}}" title="Add to cart"
                                        class="btn btn-primary margin-top-20px clear-both">Thêm vào giỏ hàng</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
