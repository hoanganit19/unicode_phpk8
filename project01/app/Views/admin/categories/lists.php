@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}

<p><a href="{{route('admin.categories.add')}}" class="btn btn-primary">Thêm</a></p>
<form action="">
    <div class="row mb-3">

        <div class="col-10">
            <input type="search" class="form-control" name="query" placeholder="Từ khóa..."
                value="{{request('query')}}" />
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="{{route('admin.categories.index')}}" class="btn btn-danger">&times;</a>
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
            <th>Link</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        {{getCategoriesTable($categories)}}
    </tbody>
</table>
<div class="row">
    <div class="col-6">
        {{view('admin/includes/deletes', ['action' => route('admin.categories.deletes')])}}
    </div>
    <div class="col-6">
        {{!empty($links) ? view('admin/includes/paginations', ['align'=>'end', 'links' => $links]): ''}}

    </div>
</div>
{{view('admin/includes/delete')}}
@endsection