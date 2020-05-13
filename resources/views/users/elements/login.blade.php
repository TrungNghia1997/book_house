@extends('users.master')
{{--  --}}
@section('title', 'Đăng nhập')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('upload/38.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Đăng nhập</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Bạn có tài khoản?</h2>
                            <p>Để có trải nghiệm, ưu đãi tốt nhất vui lòng tạo tài khoản mới</p>
                            <a href="{{ url('/dang_ky') }}" class="btn_3">Tạo tài khoản mới</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Vui lòng đăng nhập</h3>
                            <form class="row contact_form" action="{{url('/dang_nhap')}}" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value=""
                                           placeholder="Nhập email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                           placeholder="Nhập mật khẩu">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="rememberme" name="rememberme" value="forever">
                                        <label for="rememberme">Ghi nhớ</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        Đăng nhập
                                    </button>
{{--                                    <a class="lost_pass" href="#">forget password?</a>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

@endsection
