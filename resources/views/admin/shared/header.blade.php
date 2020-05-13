
<header id="header" class="header" style="height: 67px;">
    <div class="top-left">
        <div class="navbar-header">
            @foreach($option as $item)
            <a class="navbar-brand" href="{{url('/')}}" style="font-family: 'Abril Fatface', cursive; font-size: 33px;color:black;">
                <img src="{{$item->logo}}" alt="logo" style="width: 110px; height: 55px;">BOOKS
            </a>
            @endforeach
            {{-- <a class="navbar-brand hidden" href="./"><img src="/assets_admin/images/logo2.png" alt="Logo"></a> --}}
            <a id="menuToggle" class="menutoggle text-left"><i class="fa fa-bars" style="font-size: 30px;"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form action="{{url('/')}}/admin/search" class="search-form" method="GET">
                        @csrf
                        <div class="form-elemet has-icon">

                            <input type="text" class="form-control mr-sm-2" id="search" name="search" placeholder="Search ..." aria-label="Search">
                            <button type="submit" class="hidden"></button>
                            <button class="search-close" ><i class="fa fa-close"></i></button>
                        </div>
                    </form>
                </div>
            </div>


                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="user-avatar rounded-circle" @if(isset($user['avatar'])) src="$user['avatar']" @endif @if(!isset($user->avatar)) src="https://www.startupdelta.org/wp-content/uploads/2018/04/No-profile-LinkedIn.jpg" @endif alt="User Avatar"> --}}
                    @if($usercomposer['avatar'])
                        <img class="user-avatar rounded-circle" src="{{$usercomposer['avatar']}}" alt="User Avatar">
                    @endif

                    @if(!$usercomposer['avatar'])
                        <img class="user-avatar rounded-circle" src="https://www.startupdelta.org/wp-content/uploads/2018/04/No-profile-LinkedIn.jpg" alt="User Avatar">
                    @endif
                    </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{url('/')}}/admin/user/{{$usercomposer['id']}}/edit"><i class="fa fa-user"></i>Cập nhật tài khoản</a>
                        <a class="nav-link" href="{{url('/')}}/admin/logout"><i class="fa fa-power-off"></i>Đăng xuất</a>
                    </div>
                </div>

        </div>
    </div>
</header>
