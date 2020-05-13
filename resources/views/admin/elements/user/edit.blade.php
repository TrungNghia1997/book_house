{{-- extends Kế thừa từ file --}}
@extends('admin.master')
{{--  --}}
@section('title', 'Edit user')
@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Trang chủ</li>
        <li class="breadcrumb-item">
            <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Cập nhật tài khoản</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{url('/')}}/admin/user/{{$user->id}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" name="name"  value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirm" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="avatar"  id="file" style="display: none; " onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" placeholder="Chèn tên công ty của bạn" class="inputfile" />
                            <label for="file">Chọn ảnh đại diện tại đây</label><br>
                            <img id="blah" name="avatar" src="" style="max-width: 180px; height: 180px;" />
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input name="phone_number" value="{{$user->phone_number}}" type="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phân quyền</label>
                            <select name="role" class="form-control">
                            <option @if($user->role == 1) selected @endif value="1">Admin</option>
                            <option @if($user->role == 2) selected @endif value="2">Nhân Viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="" class="btn btn-success">Sửa</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
