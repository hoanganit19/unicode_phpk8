@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}
<form action="" method="post">
    <div class="mb-3">
        <label for="">Mật khẩu cũ</label>
        <input type="password" class="form-control" name="old_password" placeholder="Mật khẩu cũ..." />
        <span class="text-danger">{{error('old_password')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Mật khẩu mới</label>
        <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới..." />
        <span class="text-danger">{{error('password')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Nhập lại mật khẩu mới</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu mới..." />
        <span class="text-danger">{{error('confirm_password')}}</span>
    </div>

    <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
</form>
@endsection