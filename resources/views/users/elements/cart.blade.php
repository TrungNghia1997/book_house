@extends('users.master')
{{--  --}}
@section('title', 'Giỏ hàng')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('upload/38.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Giỏ hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- entry-header-area-end -->
    <!-- cart-main-area-start -->
    <div class="cart-main-area cart_area mb-70 margin-top-30px">
        <form action="{{url('/cart/show')}}" method="post" accept-charset="utf-8">
        @csrf
            <div class="container">
                <div class="cart_inner">
                    <div class="table-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail text-center">Hình ảnh</th>
                                    <th class="product-name text-center">Sản phẩm</th>
                                    <th class="product-price text-center">Giá</th>
                                    <th class="product-quantity text-center">Số lượng</th>
                                    <th class="product-subtotal text-center">Tổng tiền</th>
                                    <th class="product-remove text-center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sum =0; @endphp
                                @if(count($items) > 0)
                                @foreach($items as $item)
                                    @php $price_sale = $item->price - ($item->options->price_sale)*($item->price)/100 @endphp
                                    <tr>
                                        <td class="product-thumbnail text-center"><a href="#"><img src="{{$item->options->img}}" alt="man" width="100px"/></a></td>
                                        <td class="product-name"><a href="#">{{$item->name}} </a></td>
                                        <input type="hidden" name="nameproduct[]" value="{{$item->name}}">
                                        <td class="product-price text-center"><span class="amount">{{ number_format($price_sale) }} đ</span></td>
                                        <td class="product-quantity text-center">
                                            <input type="number" value="{{$item->qty}}" name="qty[]" min="1" onchange="updateCart(this.value,'{{$item->rowId}}')" step="1">
                                        </td>
                                        <td class="product-subtotal text-center">{{ number_format($price_sale * $item->qty) }} đ</td>
                                        <td class="product-remove text-center"><a href="{{url('/')}}/cart/delete/{{$item->rowId}}"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    @php
                                        $sum +=  $price_sale * $item->qty;
                                    @endphp
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center"><i>Chưa có sản phẩm nào</i></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="buttons-cart mb-30">
                            <ul>
                                <li><a href="{{url('/cart/show')}}">Cập nhật giỏ hàng</a></li>
                                <li><a href="{{url('/')}}">Tiếp tục mua sắm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cart_totals text-right">
                            <h2>Tổng giỏ hàng</h2>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th class="text-right">Tổng chưa giảm giá</th>
                                        <td>
                                            <span class="amount">{{ str_replace('.00', '', $initial) }} đ</span>
                                        </td>
                                    </tr>

                                    <tr class="order-total">
                                        <th class="text-right">Tổng</th>
                                        <td>
                                            <strong>
                                                <span class="amount">{{ number_format($sum,0,',','.') }} đ
                                                    <input type="hidden" name="sum" value="{{ number_format($sum,0,',','.') }}">
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                    <button type="submut" class="btn btn-primary margin-top-30px"> Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
