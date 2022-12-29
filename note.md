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
