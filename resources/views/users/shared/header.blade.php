<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                @foreach($option as $item)
                    <a href="{{url('/')}}"><img src="{{$item->logo}}" alt="logo" /></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3" style="padding: 10px 0;">
                            <div class="logo">
                                @foreach($option as $item)
                                    <a href="{{url('/')}}"><img src="{{$item->logo}}" alt="logo" height="70px"/></a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="{{ Request::is('/')? 'active': '' }}"><a href="{{ asset('/') }}">Trang chủ</a>
                                        </li>

                                        <li class="{{ (substr_count(Request::url(), 'san_pham') || substr_count(Request::url(), '/danh_muc/'))? 'active': '' }}">
                                            <a href="{{ url('/san_pham') }}">Sản phẩm</a>
                                        </li>
                                        <li class="{{ Request::is('sale')? 'active': '' }}"><a href="{{url('/sale')}}">sales off</a></li>
                                        <li class="{{ Request::is('lien_he')? 'active': '' }}"><a href="{{ url('/lien_he') }}">Liên hệ</a></li>
                                        <li class="{{ Request::is('gioi_thieu')? 'active': '' }}"><a href="{{ url('/gioi_thieu') }}">Giới thiệu</a></li>
                                        <li class="hidden-mobile auth-user">
                                            @if (Auth::check())
                                                <div class="nomal-text d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                                                    <img src="{{ !empty(Auth::user()->avatar)? Auth::user()->avatar: '/upload/no-profile.jpg' }}" alt="loading..." width="45px" height="45px" style="border-radius: 50%;" class="margin-right-5px">
                                                    <span class="uppercase">{{ Auth::user()->name }}</span>
                                                </div>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ url('/dang_xuat') }}" class="padding-left-10px"><i class="fa fa-sign-in-alt"></i> Đăng xuất</a></li>
                                                </ul>
                                            @else
                                                <a href="{{ url('/dang_nhap') }}" class="btn header-btn">Đăng nhập</a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class="d-none d-xl-block">
                                    <div class="form-box f-right ">
                                        <form action="{{url('/search')}}" class="search-form" id="search-form" method="GET">
                                            @csrf
                                            <div class="form-elemet has-icon">
                                                <input type="text" id="search" name="search" placeholder="Tìm kiếm tại đây..." />
                                                <div class="search-icon" onclick="$('#search-form').submit()">
                                                    <i class="fas fa-search special-tag"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-card">
                                        <a href="{{url('/cart/show')}}"><i class="fas fa-shopping-cart"></i></a>
                                        <span>{{Cart::count()}}</span>
                                    </div>
                                </li>
                                <li class="d-none d-lg-block dropdown">
                                    @if (Auth::check())
                                        <div class="nomal-text d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{ !empty(Auth::user()->avatar)? Auth::user()->avatar: '/upload/no-profile.jpg' }}" alt="loading..." width="45px" height="45px" style="border-radius: 50%;" class="margin-right-5px">
                                            <span class="uppercase">{{ Auth::user()->name }}</span>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/dang_xuat') }}" class="padding-left-10px"><i class="fa fa-sign-in-alt"></i> Đăng xuất</a></li>
                                        </ul>
                                    @else
                                        <a href="{{ url('/dang_nhap') }}" class="btn header-btn">Đăng nhập</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

