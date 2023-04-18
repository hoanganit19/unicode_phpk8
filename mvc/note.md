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

Nếu không sử dụng class mà chỉ sử dụng hàm thuần => Gọi là Helper

Request là gì?

Khi client gửi 1 yêu cầu => tồn tại 1 request

Request bao gồm những gì?

- url
- params
- method
- thông tin về server ($\_SERVER)

Trong lập trình hướng đối tượng có 3 khái niệm

- Class
- Object
- Instance

Class => Object => Instance

Buổi sau:

- Reflection
- Viết phương thức validation

Bài tập:

- Code lại bài học hnay
- Rà soát lại code => Chỗ nào không hiểu hỏi
- Ôn tập: Abstract class, Interface
