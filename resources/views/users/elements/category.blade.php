@extends('users.master')
{{--  --}}
@section('title', 'Sản phẩm')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('upload/38.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- shop-main-area-start -->
    <div class="shop-main-area mb-70 margin-top-30px">
        <div class="container">
            <div class="col-xs-12 col-sm-12">
                <div class="section-title-5 mb-30">
                    <h2>Sách</h2>
                </div>

                <div class="section-title-5 mb-30 clearfix">
                    <ul id="category-list">
                        @foreach($categories as $item)
                            @if($item->parent == 0)
                                <li class="{{ ($item->name == $category->name)? 'active': '' }}">
                                    <a href="{{url('/')}}/danh_muc/{{$item->id}}">{{$item->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="toolbar mb-30 clearfix">
                    <div class="toolbar-sorter clear-both">
                        <form action="" accept-charset="utf-8">
                            <select name="" id="sorter" class="sorter-options" data-role="sorter" onchange="window.location.href='/'+jQuery(this).find('option:selected').val();">
                                <option value="">Sắp xếp theo</option>
                                <option value="san_pham_gia_tang" @if( Request::is('san_pham_gia_tang')) selected='selected' @endif>Giá tăng dần</option>
                                <option value="san_pham_gia_giam" @if( Request::is('san_pham_gia_giam')) selected='selected' @endif>Giá giảm dần</option>
                                <option value="san_pham_new" @if( Request::is('san_pham_new')) selected='selected' @endif>Mới -> Cũ</option>
                                <option value="san_pham_cu" @if( Request::is('san_pham_cu')) selected='selected' @endif>Cũ -> Mới</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- tab-area-start -->
                @if(!empty($productRepository))
                    <div class="tab-content">
                        <div class="tab-pane active" id="th">
                            <div class="row">
                                @foreach($productRepository as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- single-product-start -->
                                        <div class="product-wrapper mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="{{$product->avatar}}" style="height: 250px; width: 90%" alt="book" class="primary" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" href="#" data-target="#product_{{$product->id}}" data-toggle="modal" title="Quick View">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        <li><span class="sale">new</span></li>
                                                        @if($product->sale > 0)
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
                                        <!-- single-product-end -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center"><i>Không có dữ liệu!</i></p>
                @endif
                <!-- tab-area-end -->

            </div>
        </div>
    </div>

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
                                                <a class="active" href="#image-{{$j}}"><img src="{{$img}}" alt="" style="width: 80px; height: 100px"/></a>
                                            @else
                                                <a href="#image-{{$j}}"><img src="{{$img}}" alt="" style="width: 80px; height: 100px"/></a>
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
                                        <b class="text-warning">{{number_format($product->price - ($product->sale)*($product->price)/100)}} đ</b>
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
                                        <a type="button" href="{{ url("/cart/add/$product->id") }}" title="Add to cart"
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
