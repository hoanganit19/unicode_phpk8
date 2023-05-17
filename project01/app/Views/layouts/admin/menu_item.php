<?php
$path = request()->getPath();
if (strpos($path, $name.'/add') !== false || strpos($path, $name.'/edit') !== false || strpos($path, $name) !== false) {
    $show = 'show';
} else {
    $show = null;
}
?>
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse{{$name}}"
    aria-expanded="false">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    {{$title}}
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse {{$show}}" id="collapse{{$name}}" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('admin.'.$name.'.index')}}">Danh sách</a>
        <a class="nav-link" href="{{route('admin.'.$name.'.add')}}">Thêm mới</a>
    </nav>
</div>