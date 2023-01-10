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
