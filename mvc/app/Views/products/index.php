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

@foreach ($products as $index => $product)
<h3>{{$product}}</h3>
<h3>{{'Index = '.$index}}</h3>
@endforeach