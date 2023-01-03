<?php 
/*
Cú pháp: 
switch ($tenbien){
    case 1:
    case 2:
    case 3:
        //Nội dung 1
    break;
    
    case 4:
    case 5:
    case 6:
        //Nội dung 2
    break;
    
    default:
        //Nội dung 3
    break;
}

- Câu lệnh switch case chỉ chấp nhận so sánh bằng (===)
- Các case viết trong cùng 1 nhánh => Quan hệ hoặc (||)
- Các câu viết bằng if else chưa chắc đã chuyển thành switch case được
- Các câu lệnh viết bằng switch case chắc chắn sẽ chuyển thành if else được
- Trên thực tế: if else sẽ được lồng vào switch case để bài toán trở nên linh hoạt hơn
*/

$action = 'fvndjhnj';

switch ($action) {
    case 'create':
    case 'add':
        echo 'Thêm khách hàng';
    break;

    case 'edit':
    case 'update':
        echo 'Sửa khách hàng';
    break;   
        
    case 'delete':
    case 'remove':
    case 'destroy':
        echo 'Xóa khách hàng';
    break;       
    
    default:
        echo 'Danh sách khách hàng';
    break;
}

echo '<br/>';

/*
    Cho trước 1 tháng trong năm => Hiển thị tháng đó có bao nhiêu ngày
 *  - Tháng có 31 ngày: 1, 3, 5, 7, 8, 10, 12 
 *  - Tháng có 30 ngày: 4, 6, 9, 11 
 *  - Tháng có 28 hoặc 29 ngày: 2
 * 
 * Yêu cầu ràng buộc dữ liệu:
 * Kiểm tra tháng hợp lệ
 * - >=1 và <=12
 * - Số nguyên
 * 
 * => Yêu cầu bổ sung: 
 * - Nếu năm chia hết cho 4 => Tháng 2 có 29 ngày
 * - Nếu năm không cho hết cho 4 => Tháng 2 có 28 ngày
*/

$month = '2';
$year = 2023;

//Kiểm tra ràng buộc dữ liệu
if (is_int((int)$month) && $month >=1 && $month <=12) {

    $days = null;

    switch ($month) {
         case 2:
            if ($year % 4 === 0) {
                $days = 29;
            }else{
                $days = 28;
            }
            
         break;
         
         case 4:
         case 6:
         case 9:
         case 11:
            $days = 30;
         break;
         
         default:
            $days = 31; 
         break;
    }

    if ($days!==null){
         echo 'Tháng '.$month.' có '.$days.' ngày';
    }
   

}else{
    echo 'Tháng không hợp lệ';
}