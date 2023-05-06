# Dự án web blog cá nhân

## Phân tích Database

1. Bảng posts: Lưu trữ bài viết

- id:

* auto_increment
* int
* primary key

- title: Tiêu đề bài viết

* varchar(255)
* null

- content: Nội dung bài viết

* text
* null

- category_id: ID của chuyên mục (Quan hệ 1-N)

* int
* foreign key tới trường id của bảng categories

- excerpt: Mô tả ngắn của bài viết

* text
* null

- user_id: ID của user đăng bài

* int
* foreign key tới id của bảng users

- view_count: Lượt xem

- thumbnail: Ảnh đại diện

* varchar(255)
* null

- created_at
- updated_at

2. Bảng categories: Lưu trữ chuyên mục

- id

* int
* auto_increment
* primary key

- name: Tên chuyên mục

* varchar(150)
* null

- parent_id

* int
* foreign key tới trường id của bảng categories

- description: Mô tả về chuyên mục

* text
* null

- created_at
- updated_at

3. Bảng users

- id

* int
* auto_increment
* primary key

- name: Tên

* varchar(100)
* null

- email: Email

* varchar(100)
* null

- password: Mật khẩu

* varchar(100)
* null

- status: Trạng thái

* tinyint
* default: 0

- created_at
- updated_at

4. Bảng pages

- id

* int
* auto_increment
* primary key

- title: Tiêu đề trang

* varchar(255)
* null

- content: Nội dung trang

* text
* null

- created_at
- updated_at

## Ghép Front-End vào cấu trúc Folder Project

### Ghép giao diện Admin

### Ghép giao diện Client

Middleware => Lớp trung gian giữa route và controller

Route => Middleware => Controller

- File cấu hình Middleware
- Sử dụng file config/app.php

Chức năng ghi nhớ mật khẩu

- Dùng cookie để lưu phiên đăng nhập
- Cookie được lưu trữ ở trình duyệt => Dễ bị lộ thông tin => Không an toàn
- Nếu user trên database bị xóa => Cookie vẫn tồn tại => Phiên đăng nhập vẫn còn => Vô lý

=> Chỉ lưu token: Tạm đặt tên là remember_token

- Khi đăng nhập => Tạo token
- Lưu token vào trong Cookie và Database
- Khi muốn lấy thông tin đăng nhập, trạng thái đăng nhập => truy vấn tới database dựa vào remember_token
