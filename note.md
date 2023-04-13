# Khóa học PHP Dev - K8

- Các câu lệnh php cần được đặt trong cặp: <?php ?>
- Các câu lệnh không phải php => Viết ở bên ngoài cặp <?php ?>
- Nếu trong file php chỉ có câu lệnh php => không cần đóng ?>

## Comment trong PHP

Giải thích, ghi chú đoạn code => Trình biên duyệt sẽ không biên dịch những nội dung đó

- Cách 1: Comment 1 dòng: `//Nội dung comment`
- Cách 2: Comment nhiều dòng: `/*Nội dung comment*/`

=> Nên comment code

- Dễ hiểu hơn
- Người khác biết bạn viết gì

Phím tắt để comment 1 đoạn

- Chọn nội dung cần comment
- Bấm tổ hợp phím Ctrl + /

## Biến trong PHP

- Có thể thay đổi
- Cú pháp: $tenBien ($ bắt buộc)
- Quy tắc đặt tên:

* Bắt đầu bằng chữ cái hoặc gạch dưới
* Chỉ cấp nhận: $, chữ cái, số, gạch dưới
* Nên sử dụng quy tắc đặt tên camelCase để đặt tên biến

Ví dụ: $customer_id, $customer_name, $customer_address_shipping (Undercore)
$customerId, $customerName, $customerAddressShipping

=> Ký tự đầu tiên của chữ thứ 2 trở đi viết hoa

Nếu không muốn gán giá trị cho biến mà vẫn biến tồn tại => Gán các giá trị mặc định cho biến (null, false, 0, '')

## Debug dữ liệu

- var_dump() => Show ra kiểu dữ liệu của biến, xem cấu trúc của các kiểu dữ liệu phức hợp: array, object, callable,...
- print_r() => Xem kiểu dữ liệu phức hợp (Không trả về kiểu dữ liệu của từng phần tử)

## Nối biến (Chuỗi)

- Sử dụng dấu .
- Nếu bị trùng dấu nháy => Cần thêm ký tự escape (\)

## Hằng số

- Không thể thay đổi
- Khai báo bằng hàm define() hoặc từ khóa const
- Tên hằng sẽ không có ký hiệu $
- Nên sử dụng quy tắc undercore và viết hoa tất cả các ký tự (Hoặc thêm gạch dưới phía trước)

- Kiểm tra hằng số tồn tại: defined() => Áp dụng chống truy cập trực tiếp vào file php

## Kiểu dữ liệu trong PHP

### 1. Số nguyên (int)

### 2. Số thực (Float)

### 3. Chuỗi (String)

### 4. Boolean (Logic)

### 5. Null

### 6. Mảng (Array)

### 7. Đối tượng (Object)

### 8. Resource (File, curl, database,...)

### 9. Callable (Callback)

## Vòng lặp

### Vòng lặp for

- Lặp với số lần lặp xác định trước
- Vòng lặp tăng và vòng lặp giảm
- Vòng lặp lồng nhau

### Vòng lặp while

- Lặp với số lần lặp không xác định trước
- Vòng lặp tăng, giảm
- Vòng lặp lồng nhau
- Dễ bị rơi vào vòng lặp vô hạn
- Giải quyết các bài toán dạng chung chung (Không biết trước chạy bao nhiêu lần)
- Các bài toán viết bằng for, đều chuyển được sang while

### Vòng lặp do while

- Giống while
- Khác: Chạy trước rồi kiểm tra điều kiện

## Import

- require, include
- require_once, include_once

Sự khác nhau giữa include và require

- nếu import lỗi => include chỉ báo lỗi warning => Chương trình vẫn chạy
- nếu import lỗi => require sẽ dừng chương trình

Sự khác nhau giữa include (require) với include_once (require_once)

- include, require: Cho phép import nhiều file giống nhau
- require_once, include_once: Chỉ cho phép import 1 file

Đường dẫn khi sử dụng import ở dạng document path (File gốc trên server)

Nên dùng đường dẫn tương đối

- Không bị phụ thuộc vào folder gốc
- Dễ dàng thay đổi mà không bị ảnh hưởng và sửa lại code

## Định nghĩa hàm

1. Khái niệm

- Gom nhóm các đoạn chương trình con để thuận tiện hơn trong quá trình tái sử dụng
- Tham số
- Đối số
- Tham trị
- Tham biến
- Tham chiếu
- Hàm có giá trị trả về (Hàm return)
- Hàm không có giá trị trả về (Hàm void)

2. Cú pháp

function tenHam($thamso1, $thamso2){
//Nội dung hàm
}

- Tên hàm: Dùng động từ, đặt theo quy tắc camelCase

* create, get, set, delete, add, do, make, build,....

Lưu ý với từ khóa return

- Trả về giá trị của hàm (Chỉ trả về 1 gias tri)
- Sau khi gọi return => Các đoạn code bên dưới return sẽ không hoạt động

Hàm có thể hàm khác

=> Tổng kết:

- Vòng lặp
- Từ khóa hỗ trợ
- Import
- Định nghĩa hàm (Nhập môn)

Tổng kết ngày 10/1/2022

- Hoàn thành phần định nghĩa hàm
- Giải thuật đệ quy

Nội dung buổi học sau:

Xử lý chuỗi trong PHP

- Các kỹ thuật xử lý
- Các hàm hỗ trợ
- Xử lý chuỗi nâng cao (Regular Expressions - Biểu thức chính quy) => Học ở phần php nâng cao

Thao tác xử lý chuỗi

- Hiển thị chuỗi
- Kiểm tra chuỗi hợp lệ: kiểm tra chuỗi có phải số điện thoại không? Chuỗi có phải email không?
- Tìm kiếm trong chuỗi
- Cắt chuỗi
- Chèn chuỗi

Tổng kết buổi học đầu tiên về chuỗi

- Tổng quan về chuỗi
- mbstring extensions
- Hàm xử lý chuỗi (Hay dùng)
- Ví dụ xử lý chuỗi: lấy username của email, convert ký tự đầu của mỗi chữ sang chữ hoa

Các phương thức nhận và gửi dữ liệu => http method

- get => Nhận dữ liệu
- post => Gửi dữ liệu

Client => Gửi request (url, method, headers, body,...) => Server => Tiếp nhận request => Xử lý => Response

1. Http method GET

- Để gửi nội dung qua http method get => Query String

- Cấu trúc query string: http://tenmien/path?querystring

Ví dụ: http://tenmien/path?keyword=abc&id=123

Ứng dụng:

- Thiết kế và xây dựng các tính năng có sự thay đổi url
- Xây dựng lên cấu trúc của dự án

2. Http method POST

- Để gửi nội dung qua http method post => body (payload)
- Gửi dữ liệu với phương thức post => Không thay đổi url
- Để gửi dữ liệu bằng post => Cần sử dụng form hoặc thông qua 1 số trình cho phép gửi http method post (file_get_contents(), curl, js: fetch, axios,...)

Khi gửi dữ liệu bằng http method post => Có content-type = application/x-www-form-urlencoded

Ngoài ra có thể 1 số trường content-type = application/json

3. Upload file php

- Để upload được file từ client lên server => content-type = multipart/form-data
- Trong php sử dụng `$_FILES` để lấy thông tin file gửi lên

timestamp => Số giây tính từ thời điểm 00h00m00s năm 1970 tới thời điểm muốn kiểm tra

session: khi tắt trình duyệt => tạo file session mới => set cookie mới

Xử lý thời gian trong PHP

- Phụ thuộc vào thời gian trên Server
- Trong quá trình lấy thời gian => Chú ý múi giờ

- timestamp: Số giây từ năm 1970 đến thời điểm muốn kiểm tra
- Định dạng thời gian:

* d => Ngày
* m => Tháng
* Y => Năm

- H => Giờ
- i => Phút
- s => Giây

Trong quá trình xử lý thời => Định dạng thời gian đầu vào nên để ở dạng: Y-m-d

## Ngôn ngữ truy vấn SQL

- Hệ quản trị CSDL: Phần mềm (MySQL)

- Khi làm việc với Table trong MySQl

* Cấu trúc bảng
* Dữ liệu

Tên cột trong table => field (Trường)
Dữ liệu trong Table => record

Ví dụ 1 về quan hệ trong Database:

Table users

id => Khóa chính
name
email
group_id => Khóa ngoại
created_at
updated_at

Table groups
id => Khóa chính
name
created_at
updated_at

=> Quan hệ 1 - nhiều (1 group có thể có 1 hoặc nhiều user)

Ví dụ 2:

Table users

- id => Khóa chính
- name
- email
- created_at
- updated_at

Table phones

- id => Khóa chính
- phone
- user_id => Khóa ngoại (Liên kết tới id của bảng users)
- created_at
- updated_at

=> Quan hệ 1-1

Ví dụ 3:

Table posts

- id
- title
- content
- created_at
- updated_at

Table categories

- id
- name
- created_at
- updated_at

Table posts_categories => Liên kết giữa posts và categories

- id
- post_id => Khóa ngoại (Liên kết tới trường id của table posts)
- category_id => Khóa ngoại (Liên kết tới trường id của table categories)
- created_at

=> Quan hệ nhiều - nhiều

Ví dụ phức tạp:

- Tin tức
- Sản phẩm
- Đều có phần bình luận
  => Chỉ muốn dùng 1 table comments chung cho cả tin tức và sản phẩm

Truy vấn dữ liệu (Ôn tập)

- Join bảng
- SubQuery (Select lồng)
- Group By

Tìm hiểu thêm các phần mềm quản lý Database

- phpmyadmin
- mysql workbench
- Navicat
- sequel pro

## Lưu mật khẩu trong Database

Cách cũ:

- md5()
- sha1()

Khi xây dựng chức năng login:

- Lấy mật khẩu nhập từ input
- Mã hóa md5 hoặc sha1
- So sánh mã md5 hoặc sha1 với database

Ưu điểm

- Dễ triển khai
- Dễ reset lại mật khẩu

Nhược điểm

- Kém an toàn: Tạo hash giống nhau nếu cùng chuỗi đầu vào
- Những mật khẩu đơn giản dễ bị dịch ngược lại

BÀI TẬP VỀ NHÀ

- Xây dựng chức năng tài khoản (Thông tin cá nhân)
- Xây dựng chức năng đăng ký tài khoản => Đăng ký thành công, tự động đăng nhập

Buổi sau:

- Quên mật khẩu => Reset mật khẩu
- Kích hoạt tài khoản => Gửi email
- Xác minh 2 bước (Qua email)
- Ajax trong PHP (Tìm hiểu Javascript, jQuery)

Hướng dẫn xây dựng chức năng quên mật khẩu => reset mật khẩu

- Xây dựng form quên mật khẩu (Trường email)

- Kiểm tra email có trùng khớp với database hay không?

* TH1: Trùng => Xử lý tiếp theo
* TH2: Không trùng => Thông báo lỗi

- Tạo 1 token mới (reset_token)

- Tạo link reset password và gửi email

- Xây dựng trang reset-password

* Kiểm tra token có tồn tại không?

* Nếu tồn tại => Hiển thị form đặt lại mật khẩu (Mật khẩu mới, nhập lại mật khẩu mới)

* Xử lý cập nhật lại mật khẩu

## Ajax

- Ajax là 1 công nghệ hoặc là 1 kỹ thuật
- Dùng để trao đổi dữ liệu giữa client với server thông qua Javascript

- Client: Javascript
- Server: PHP

Yêu cầu:

Có kiến thức về Javascript

- Event
- DOM
- Fetch Data: fetch(), jquery ajax, axois,...

Bài tập về nhà: 23/03/2023

- Xây dựng class Database có đủ các phương thức giống như phần function: connect, query, creeate, update, remove, get, first...
- Thực hành xây dựng CRUD sử dụng class Database đã viết

Interface1

extends

Interface2

implement

Class

Thực tế thường:
Interface => Abstract Class => Class

Bài tập về nhà: 28/03/2023

Code Query Builder để thao tác với CSDL

$db = new DB();

Thêm: $db->table('users')->create([
'name' => 'Hoàng An',
'email' => 'contact@contact'
])

Sửa: $db->table('users')->where('id', '=', 1)->update([
'name' => 'Hoàng An',
'email' => 'contact@contact'
])

Xóa: $db->table('users')->where('id', '=', 1)->delete();

Fetch All: $db->table('users')->select('id', 'name', 'email')->where('id', '>', 1)->get();

## Rewrite URL

- Viết lại đường dẫn cho đẹp
- Đường dẫn trên thanh địa chỉ trình duyệt => Đường dẫn ảo => Ánh xạ tới đường dẫn thật nằm trên server
- Viết lại đường dẫn cần sử dụng các ngôn ngữ ở phía server
- Phụ thuộc vào WebServer đang sử dụng

* Apache => Viết trong file .htaccess
* Nginx => Viết trong file cấu hình của tên miền (virtual host)
* IIS => Viết trong web.config

## Rewrite với Apache (.htaccess)

- Server phải được enable mod_rewrite
- Giống như 1 lớp bảo vệ folder => Các request do htaccess kiểm soát
- Ánh xạ tất cả các request vào file index.php

Ví dụ: /san-pham => index.php?module=products

- Enable Rewrite với folder cần rewrite: `RewriteEngine On`
- Khai báo đường dẫn và đường dẫn thật thông qua `RewriteRule duong-dan-ao duong-dan-that`
- Chú ý tránh bị trùng cú pháp rewrite (regex)

- Trỏ tên miền unicode.test => rewrite

Lưu ý:

- File index.php nên đặt trong folder public => Bảo mật
- Trong folder public: Có file .htaccess để ánh xạ url tĩnh => động
- Trong folder ngoài public: Có file .htaccess => Ánh xạ từ url không có public sang url có public (Loại bỏ public trên url)
- Nếu có quyền kiểm soát server => Trỏ trực tiếp DOCUMENT_ROOT tới folder public
