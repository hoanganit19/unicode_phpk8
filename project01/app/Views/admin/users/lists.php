@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}

<p><a href="{{route('admin.users.add')}}" class="btn btn-primary">Thêm</a></p>
<form action="">
    <div class="row mb-3">
        <div class="col-3">
            <select name="status" class="form-select" id="">
                <option value="all">Tất cả trạng thái</option>
                <option value="active" {{request()->status == 'active' ? 'selected': false}}>Kích hoạt</option>
                <option value="inactive" {{request()->status == 'inactive' ? 'selected': false}}>Chưa kích hoạt</option>
            </select>
        </div>
        <div class="col-7">
            <input type="search" class="form-control" name="query" placeholder="Từ khóa..."
                value="{{request('query')}}" />
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="{{route('admin.users.index')}}" class="btn btn-danger">&times;</a>
        </div>
    </div>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" class="checkAll" />
            </th>
            <th>Tên</th>
            <th>Email</th>
            <th>Trạng thái</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($users))
        @foreach ($users as $user)
        <tr>
            <td>
                @if ($user->id != Auth::user()->id)
                <input type="checkbox" class="check-item" value="{{$user->id}}" />
                @endif
            </td>
            <td>
                {{$user->name}}
            </td>
            <td>
                {{$user->email}}
            </td>
            <td>
                {!! $user->status == 1 ? '<span class="badge bg-success">Kích hoạt</span>': '<span
                    class="badge bg-warning">Chưa kích hoạt</span>' !!}

            </td>
            <td>
                {{getDateFormat($user->created_at)}}
            </td>
            <td>
                <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-warning btn-sm">Sửa</a>
                @if ($user->id != Auth::user()->id)
                <a href="{{route('admin.users.delete', ['id' => $user->id])}}"
                    class="btn btn-danger btn-sm delete-action">Xóa</a>
                @endif
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="row">
    <div class="col-6">
        {{view('admin/includes/deletes', ['action' => route('admin.users.deletes')])}}
    </div>
    <div class="col-6">
        {{view('admin/includes/paginations', ['align'=>'end', 'links' => $links])}}

    </div>
</div>
{{view('admin/includes/delete')}}
@endsection