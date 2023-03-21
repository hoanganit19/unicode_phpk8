<?php
require_once 'classes/Template.php';
class Person{
    private $name, $age, $email;
    public $template = null;
    
    //Phương thức khởi tạo
    public function __construct($name, $age)
    {
        //Chạy ngay sau khi đối tượng được tạo
        //echo 'Phương thức khởi tạo';
        
        //Thường được dùng để khởi tạo giá trị cho thuộc tính hoặc khởi tạo 1 đối tượng mới
        $this->name = $name;
        $this->age = $age;
        $this->email = 'contact@unicode.vn';

        $this->template = new Template();
    }

    // public function Person(){
    //     echo 'Phương thức khởi tạo';  
    // }

    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    public function getEmail(){
        return $this->email;
    }

    public function makeRender(){
        echo $this->template->render();
    }

    //Phương thức hủy
    //Tự động gọi khi đối tượng sử dụng xong
 
    public function __destruct()
    {
        echo 'Phương thức hủy được gọi';
        //Đóng kết nối database

        $this->template = null;
    }
}

$person = new Person('Hoàng An', 31);
echo $person->getName().'<br/>';
echo $person->getAge().'<br/>';
echo $person->getEmail().'<br/>';
echo $person->template->render();
$person->makeRender();
echo $person->template->status.'<br/>';