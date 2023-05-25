@extends('layouts/client.master')
@section('content')
<div class="posts">
    <div class="row">
        @if ($posts)
        @foreach ($posts as $post)
        <div class="col-4">
            <div class="posts-item">
                <p class="post-thumbnail"><a href="{{route('posts', ['slug' => $post->slug])}}"><img
                            src="{{$post->thumbnail}}" alt=""></a></p>
                <h3><a href="{{route('posts', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
                <p>{{$post->excerpt}}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <nav class="d-flex justify-content-center" aria-label="Page navigation example">
        {!! $links !!}
    </nav>
</div>
@endsection