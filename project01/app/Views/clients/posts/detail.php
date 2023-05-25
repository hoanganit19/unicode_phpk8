@extends('layouts/client.master')
@section('content')
<div class="posts">
    <h1>{{$post->title}}</h1>
    <div>
        <ul class="list-unstyled d-flex">
            <li class="px-1">Đăng lúc: {{getDateFormat($post->created_at)}}</li>
            <li class="px-1">Bởi: {{$user->name}}</li>
            <li class="px-1">Chuyên mục: {{$category->name}}</li>
        </ul>
    </div>
    {!!$post->content!!}
</div>
@endsection