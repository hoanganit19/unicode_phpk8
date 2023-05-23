@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}

<p><a href="{{route('admin.posts.add')}}" class="btn btn-primary">Thêm</a></p>
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
            <th>Chuyên mục</th>
            <th>Link</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($posts))
        @foreach ($posts as $post)

        <tr>
            <td>
                <input type="checkbox" class="check-item" value="{{$post->id}}" />
            </td>
            <td>
                {{$post->title}}
            </td>
            <td>
                <a target="_blank"
                    href="{{route('categories', ['slug' => $post->slug_category])}}">{{$post->category_name}}</a>
            </td>

            <td>
                <a class="badge bg-success text-white" href="{{route('posts', ['slug' => $post->slug])}}"
                    target="_blank">Link</a>
            </td>
            <td>
                {{getDateFormat($post->created_at)}}
            </td>
            <td>
                <a href="{{route('admin.posts.edit', ['id' => $post->id])}}" class="btn btn-warning btn-sm">Sửa</a>
                <a href="{{route('admin.posts.delete', ['id' => $post->id])}}"
                    class="btn btn-danger btn-sm delete-action">Xóa</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="row">
    <div class="col-6">
        {{view('admin/includes/deletes', ['action' => route('admin.posts.deletes')])}}
    </div>
    <div class="col-6">
        {{view('admin/includes/paginations', ['align'=>'end', 'links' => $links])}}

    </div>
</div>
{{view('admin/includes/delete')}}
@endsection