@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tiêu đề</label>
        <input type="text" class="form-control title" name="title" placeholder="Tiêu đề..."
            value="{{old('title') ?? $post->title}}" />
        <span class="text-danger">{{error('title')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Slug</label>
        <input type="text" class="form-control slug" name="slug" placeholder="Slug..."
            value="{{old('slug') ?? $post->slug}}" />
        <span class="text-danger">{{error('slug')}}</span>
    </div>
    <div class="mb-3">
        <label for="">Nội dung</label>
        <textarea name="content" class="ckeditor">{{old('content') ?? $post->content}}</textarea>
        <span class="text-danger">{{error('content')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Chuyên mục</label>
        <select name="category_id" class="form-select">
            <option value="">Chọn chuyên mục</option>
            {{getCategories(categories: $categories, old: old('category_id') ?? $post->category_id)}}
        </select>
        <span class="text-danger">{{error('category_id')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Mô tả</label>
        <textarea name="excerpt" class="form-control"
            placeholder="Mô tả">{{old('excerpt') ?? $post->excerpt}}</textarea>
    </div>

    <div class="mb-3">
        <label for="">Ảnh đại diện</label>
        <div class="row ckfinder-group">
            <div class="col-6">
                <input type="text" name="thumbnail" class="form-control ckfinder-url" placeholder="Url..."
                    value="{{old('thumbnail') ?? $post->thumbnail}}" />
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success ckfinder-choose">Chọn</button>
            </div>
            <div class="col-4">
                <div class="ckfinder-preview">
                    @if (old('thumbnail') || $post->thumbnail)
                    <img src="{{old('thumbnail') ??  $post->thumbnail}}" style="max-width: 100%;" alt="">
                    @endif
                </div>
            </div>
        </div>
        <span class="text-danger">{{error('thumbnail')}}</span>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="#" class="btn btn-danger back">Hủy</a>
</form>
@endsection