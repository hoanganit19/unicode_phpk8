@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" class="form-control" name="name" placeholder="Tên..." value="{{old('name')}}" />
        <span class="text-danger">{{error('name')}}</span>
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email..." value="{{old('email')}}" />
        <span class="text-danger">{{error('email')}}</span>
    </div>
    <div class="mb-3">
        <label for="">Trạng thái</label>
        <select name="status" class="form-select" id="">
            <option value="0">Chưa kích hoạt</option>
            <option value="1">Kích hoạt</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Mật khẩu..."
            value="{{old('password')}}" />
        <span class="text-danger">{{error('password')}}</span>
    </div>
    <div class="mb-3">
        <label for="">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu..."
            value="{{old('confirm_password')}}" />
        <span class="text-danger">{{error('confirm_password')}}</span>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="#" class="btn btn-danger back">Hủy</a>
</form>
@endsection