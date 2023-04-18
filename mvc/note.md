# MVC

/app => Chứa các folder: controllers, model, views => Dùng để viết các module cho project

/core => Lõi của framework, không thay đổi giữa các project

/core/Route.php => Class xử lý định tuyến

Khi làm việc với đường dẫn

- path
- method

Ví dụ:

/tin-tuc
get

Template engine

{{$tenbien}} => hiển thị
{!! $tenbien !!} => Hiển thị có html

@if (dieukien)

@endif

@for ()

@endfor

@foreach ($users as $user)

@endforeach

<?php foreach ($users as $user): ?>

<?php endforeach; ?>
