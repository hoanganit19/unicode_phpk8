@extends('layouts/admin.master')
@section('content')
{{view('admin/includes/breadcrumb', ['pageTitle' => $pageTitle])}}
{!!showMsg($msg)!!}
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" class="form-control title" name="title" placeholder="Tên chuyên mục..."
            value="{{old('name') ?? $category->name}}" />
        <span class="text-danger">{{error('name')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Slug</label>
        <input type="text" class="form-control slug" name="slug" placeholder="Slug..."
            value="{{old('slug') ?? $category->slug}}" />
        <span class="text-danger">{{error('slug')}}</span>
    </div>

    <div class="mb-3">
        <label for="">Cha</label>
        <select name="parent_id" class="form-select">
            <option value="0">Không</option>
            {{getCategories(categories: $categories, old: old('parent_id') ?? $category->parent_id, currentId: $id)}}
        </select>
    </div>

    <div class="mb-3">
        <label for="">Mô tả</label>
        <textarea name="description" class="ckeditor">{{old('description') ?? $category->description}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="#" class="btn btn-danger back">Hủy</a>
</form>
@endsection