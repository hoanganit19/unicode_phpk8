@extends('layouts/client')
@section('title')
Sản phẩm
@endsection
@section('content')
<h1>Danh sách sản phẩm</h1>
<h2> {{ $title ?? 'Không xác định' }} </h2>
<h2>
    {{mb_strtolower('Xin chào PHP Dev', 'UTF-8')}}
</h2>
<div>
    {{
        '<p>Unicode</p>'
    }}
</div>
<div>
    {!! $content !!}
</div>
@endsection

@section('scripts')
<script>
//viết gì thì viết
</script>
@endsection