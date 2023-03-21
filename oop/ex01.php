<?php
//Định nghĩa class
class Person
{
    //Thuộc tính
    //Cú pháp: phạm vi (public|protected|private) $tenThuocTinh1, $tenThuocTinh2,...
    public $name;
    public $age;
    public $email = 'contact@unicode.vn';

    //Hằng số
    //Cú pháp: const TEN_HANG_SO
    const MESSAGE = 'Unicode Academy';

    //Phương thức
    //Cú pháp: phạm vi (public|protected|private) function tenPhuongthuc(){
    //Nội dung phương thức
    //}
    function getName()
    {
        return 'Hoàng An';
    }
}

//Tạo đối tượng
$person = new Person;

//Truy cập vào thuộc tính
echo $person->email.'<br/>';
$person->name = 'Hoàng An Unicode';
echo $person->name.'<br />';

//Truy cập vào phương thức
echo $person->getName().'<br/>';

//Truy cập vào hằng số
echo $person::MESSAGE.'<br/>';

/*
Bởi vì hằng số không thay đổi => Không cần phụ thuộc vào đối tượng => Có thể gọi bằng cách sau
TenClass::TenHangSo
*/
echo Person::MESSAGE.'<br/>';