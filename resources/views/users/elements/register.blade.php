@extends('users.master')
{{--  --}}
@section('title', 'Đăng ký')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('upload/38.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Đăng ký</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->



        <!-- user-login-area-start -->
        @if(session('thongbao'))
               <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>

            @endif
        {{ ShowErrors($errors, 'email')}}
        <div class="user-login-area mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-2"></div>
                    <div class="col-xs-12 col-sm-8" id="regíster-section">
                        <div class="billing-fields">
                            <form action="{{url('/dang_ky')}}" method="post" accept-charset="utf-8" id="register-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="single-register">
                                            <label>Họ và tên <span class="text-danger">*</span></label>
                                            <input type="text" name="name" required="" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="single-register">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" required="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="single-register">
                                            <label>Số điện thoại <span class="text-danger">*</span></label>
                                            <input type="text" name="phone_number" required="" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-register">
                                    <label>Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="" name="address" required="" class="form-control"/>
                                </div>
                                <div class="single-register">
                                    <label>Mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" placeholder="" name="password" required="" class="form-control"/>
                                </div>
                                <div class="single-register">
                                    <label>Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" placeholder="" name="password_confirm" required="" class="form-control"/>
                                </div>
                                <div class="single-register margin-top-30px">
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2"></div>
                </div>
            </div>
        </div>
@endsection
