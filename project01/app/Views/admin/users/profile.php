@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" class="form-control" name="name" placeholder="Tên..."
            value="{{old('name') ?? $user->name}}" />
        <span class="text-danger">{{error('name')}}</span>
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email..."
            value="{{old('email') ?? $user->email}}" />
        <span class="text-danger">{{error('email')}}</span>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection