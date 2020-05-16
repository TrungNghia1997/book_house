@extends('users.master')
{{--  --}}
@section('title', 'Giới thiệu')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('upload/38.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Chi tiết sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- product-main-area-start -->
    <div class="product-main-area mb-70 margin-top-30px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <!-- product-main-area-start -->
                    <div class="product-main-area">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 bg-gainsboro pb-15 pt-15">
                                <div class="slider-area">
                                    <div class="slider-active owl-carousel">
                                        @foreach($imgs as $img)
                                            <img class="single-slider bg-img" src="{{ $img }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <div class="product-info-main">
                                    <div class="page-title">
                                        <h1>{{$productRepository->name}}</h1>
                                    </div>
                                    <div class="product-info-stock-sku">
                                        <div class="product-attribute">
                                            <span>Mã sản phẩm</span>
                                            <span class="value">{{$productRepository->id_product}}</span>
                                        </div>
                                    </div>
{{--                                    <div class="product-reviews-summary">--}}
{{--                                        <div class="rating-summary">--}}
{{--                                            <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="reviews-actions">--}}
{{--                                            <a href="#">3 Đánh giá</a>--}}
{{--                                            <a href="#" class="view">Thêm đánh giá</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="product-info-price mb-20 margin-top-30px">
                                        <div class="price-final product-price">
                                            <ul>
                                                @if($productRepository->sale > 0)
                                                    <li class="font-size-30">{{number_format($productRepository->price - ($productRepository->sale)*($productRepository->price)/100)}} đ</li>
                                                    <li class="old-price">
                                                        {{number_format($productRepository->price)}} đ
                                                    </li>
                                                @else
                                                    <li class="font-size-30">{{number_format($productRepository->price)}} đ</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product-add-form">
                                        <form action="#">
                                            <div class="quality-button">
                                                <input type="number" value="1" width="50px" class="input-number-product-to-cart"/>
                                                <span class="clear-both">
                                                   <i class="fa fa-check text-success"></i>
                                                        @if($productRepository->status)
                                                            Còn hàng
                                                        @else
                                                            Hết hàng
                                                        @endif
                                                </span>
                                            </div>
                                            <a href="{{ url("/cart/add/$productRepository->id") }}" class="btn btn-primary margin-top-30px">Thêm vào giỏ hàng</a>
                                        </form>
                                    </div>
                                    <div class="product-social-links">
                                        <div class="product-addto-links">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-pie-chart"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
                                        <div class="product-addto-links-text">
                                            <p>{{$productRepository->short_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-main-area-end -->
                    <div class="tab-content margin-top-30px">
                        <div class="tab-pane active" id="Details">
                            <div class="valu">
                                {!!$productRepository->description!!}
                            </div>
                        </div>
                    </div>

                    <!-- new-book-area-start -->
                    <div class="new-book-area mt-100">
                        <div class="section-title text-center mb-40">
                            <h3>Sản phẩm cùng loại</h3>
                        </div>
                        <div class="tab-active-2 owl-carousel owl-loaded owl-drag">
                            <!-- single-product-start -->
                            @if(count($productCategory) > 0 && $productCategory[0]->id != $productRepository->id)
                            @foreach($productCategory as $product)
                                @if($product->id != $productRepository->id)
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#">
                                        <img src="{{$product->avatar}}" alt="book" class="primary" style="width: 212px; height: 272px; padding: 0px 10px" />
                                        </a>
                                        <div class="quick-view">
                                            <a class="action-view" href="#" data-target="#product_{{$product->id}}" data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="product-flag">
                                            <ul>
                                                @if($product->sale > 0)
                                                    <li><span class="sale">new</span> <br></li>
                                                    <li><span class="discount-percentage">-{{$product->sale}}%</span></li>
                                                @else
                                                    <li><span class="sale">new</span> <br></li>
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
                                        <h4><a href="{{ url("/san_pham/$product->id") }}">{{$product->name}}</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                @if($product->sale > 0)
                                                    <li>{{number_format($product->price - ($product->sale)*($product->price)/100)}} đ</li>
                                                    <li class="old-price">
                                                        {{number_format($product->price)}} đ
                                                    </li>
                                                @else
                                                    <li>{{number_format($product->price)}} đ</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-link">
                                        <div class="product-button">
                                            <a href="{{ url("/cart/add/$product->id") }}" title="Add to cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </div>
                                        <div class="add-to-link">
                                            <ul>
                                                <li><a href="{{ url("/san_pham/$product->id") }}" title="Details"><i class="fa fa-external-link-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            @else
                                <p class="text-center"><i>Không có sản phẩm phù hợp!</i></p>
                            @endif
                        </div>
                    </div>
                    <!-- new-book-area-start -->
                </div>
            </div>
        </div>
    </div>

    {{-- show detail --}}
    @foreach($productRepository as $product)
        <div class="modal fade productModal" id="product_{{$product['id']}}" tabindex="-1" role="dialog">
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
                                    <?php $imgs = explode('+img+', $product['images']); ?>
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
                                    <h3>{{$product['name']}}</h3>
                                    <div class="price">
                                        <b class="text-warning">{{number_format($product['price'] - ($product['sale'])*($product['price'])/100)}} đ</b>
                                    </div>
                                    <p>{{$product['short_description']}} ...</p>
                                    <br>
                                    <form action="#">
                                        <input type="number" value="1" width="50px" class="input-number-product-to-cart"/>
                                        <span class="clear-both">
                                            <i class="fa fa-check text-success"></i>
                                                @if($product['status'])
                                                Còn hàng
                                            @else
                                                Hết hàng
                                            @endif
                                        </span>
                                        <a type="button" href="{{ url("/cart/add/". $product['id']) }}" title="Add to cart"
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
