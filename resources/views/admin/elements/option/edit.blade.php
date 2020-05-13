{{-- extends Kế thừa từ file --}}
@extends('admin.master')
{{--  --}}
@section('title', 'Add Product')
@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Trang chủ</li>
        <li class="breadcrumb-item">
            <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Tùy chỉnh</li>
    </ol>
    <div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form action="{{url('/')}}/admin/option/{{$optionRepository->id}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{$optionRepository->id}}">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control"  value="{{$optionRepository->email}}" name="email" required="">
                    </div>
                    <div class="form-group">
                        <label for="input-select-images" class="btn btn-danger">Logo</label>
                        <input id="input-select-images" class="hidden" type="file" name="logo">
                        <div class="avatar-commic-preview">
                            <img src="{{$optionRepository->logo}}" id="profile-img-tag" width="200px"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh slide</label>
                        <input type="file" class="form-control" multiple="multiple" name="slides[]" style="height: 56px;">
                        <br>
                        <ul class="fix-show-images">
                            @if(isset($slides))
                            @foreach($slides as $images)
                            <li><img src="{{$images}}" alt="" width="100px"></li>
                            @endforeach
                            @endif
                        </ul>

                        <div class="clearfix">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Số điện thoại liên hệ:</label>
                            <input type="text" class="form-control" value="{{$optionRepository->phone}}" name="phone" required="">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" class="form-control" value="{{$optionRepository->address}}" name="address" required="">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
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
<script>
    function Quantum(obj) {
        var count = Number($('.count').val());
        var a = count +1;
        var i = obj.value;
        var data = new Array();
        for(var j=a; j<=i; j++){
            data[j] = '<p>Banner trang chủ '+j+'</p>'+'<input class="" type="file" name="banner[]">';
        }
        $('.banner').html(
            data);
     }

</script>
@endsection
{{-- @section('content')
<p>This is my body content.</p>
@endsection --}}
