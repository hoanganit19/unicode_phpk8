@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tiêu đề</label>
        <input type="text" class="form-control title" name="title" placeholder="Tiêu đề..."
            value="{{old('title') ?? $page->title}}" />
        <span class="text-danger">{{error('title')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Slug</label>
        <input type="text" class="form-control slug" name="slug" placeholder="Slug..."
            value="{{old('slug') ?? $page->slug}}" />
        <span class="text-danger">{{error('slug')}}</span>
    </div>
    <div class="mb-3">
        <label for="">Nội dung</label>
        <textarea name="content" class="ckeditor">{{old('content') ?? $page->content}}</textarea>
        <span class="text-danger">{{error('content')}}</span>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="#" class="btn btn-danger back">Hủy</a>
</form>
@endsection