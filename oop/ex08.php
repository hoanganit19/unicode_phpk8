<?php

class User
{
    private static $name = 'Hoàng An';

    private $email = 'contact@unicode.vn';

    //Tạo 1 thuộc tính tĩnh để lưu đối tượng $this
    private static $user = null;

    public function __construct()
    {
        self::$user = $this;
    }

    public function getName()
    {
        return self::$name;
    }

    public static function getEmail()
    {
        return self::$user->email;
    }

    public static function getInfo()
    {
        echo self::$user->getName();
        echo '<br/>';
        echo self::getEmail();
    }
}

/*
- phương thức tĩnh và phương thức thông thường đều có thể truy cập tới thuộc tính tĩnh bằng từ khóa self
- phương thức tĩnh không được sử dụng từ khóa $this
- thuộc tính thông thường không được truy cập bằng từ khóa self
- Nếu muốn truy cập từ phương thức tĩnh tới thuộc tính thông thường => sử dụng 1 thuộc tính tĩnh trung gian (Mang giá trị $this)
*/

$user = new User();
// echo $user->getName();
//echo User::getEmail();
User::getInfo();
