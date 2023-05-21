@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}

<p><a href="{{route('admin.pages.add')}}" class="btn btn-primary">Thêm</a></p>
<form action="">
    <div class="row mb-3">

        <div class="col-10">
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
            <th>Tiêu đề</th>
            <th>Email</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($pages))
        @foreach ($pages as $page)
        <tr>
            <td>
                <input type="checkbox" class="check-item" value="{{$page->id}}" />
            </td>
            <td>
                {{$page->title}}
            </td>

            <td>
                <a class="badge bg-success text-white" href="{{route('page', ['slug' => $page->slug])}}"
                    target="_blank">Link</a>
            </td>
            <td>
                {{getDateFormat($page->created_at)}}
            </td>
            <td>
                <a href="{{route('admin.pages.edit', ['id' => $page->id])}}" class="btn btn-warning btn-sm">Sửa</a>
                <a href="{{route('admin.pages.delete', ['id' => $page->id])}}"
                    class="btn btn-danger btn-sm delete-action">Xóa</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="row">
    <div class="col-6">
        {{view('admin/includes/deletes', ['action' => route('admin.pages.deletes')])}}
    </div>
    <div class="col-6">
        {{view('admin/includes/paginations', ['align'=>'end', 'links' => $links])}}

    </div>
</div>
{{view('admin/includes/delete')}}
@endsection