<?php

namespace Core;

use Exception;
use Core\Session;

class Validator
{
    private static $messages = [];
    private static $body = [];

    public static function make($request, $rules, $messages, $attributes=[])
    {
        try {
            if (!empty($request) && is_array($request)) {
                self::$body = $request;
                $rules = array_filter($rules);

                if (!empty($rules)) {
                    foreach ($rules as $field => $ruleList) {
                        $ruleListArr = explode('|', $ruleList);
                        if (!empty($ruleListArr)) {
                            foreach ($ruleListArr as $ruleItem) {
                                $ruleValue = null;

                                if (strpos($ruleItem, ':')!==false) {
                                    $ruleItemArr = explode(':', $ruleItem);

                                    $ruleName = $ruleItemArr[0];

                                    $ruleValue = $ruleItemArr[1];
                                } else {
                                    $ruleName = $ruleItem;
                                }

                                //Xử lý required

                                if ($ruleName == 'required') {
                                    if (isset($request[$field]) && $request[$field]=='') {
                                        //Xảy ra lỗi
                                        self::setMessage($messages[$ruleName], $attributes, $field);
                                    }
                                }

                                //Xử lý min
                                if ($ruleName == 'min' && is_int((int)$ruleValue) && $ruleValue > 0) {
                                    if (isset($request[$field]) && mb_strlen($request[$field], 'UTF-8') < $ruleValue) {
                                        //Xảy ra lỗi
                                        self::setMessage($messages[$ruleName], $attributes, $field, [
                                            ':min' => $ruleValue
                                        ]);
                                    }
                                }

                                //Xử lý max
                                if ($ruleName == 'max' && is_int((int)$ruleValue) && $ruleValue > 0) {
                                    if (isset($request[$field]) && mb_strlen($request[$field], 'UTF-8') > $ruleValue) {
                                        //Xảy ra lỗi
                                        self::setMessage($messages[$ruleName], $attributes, $field, [
                                            ':max' => $ruleValue
                                        ]);
                                    }
                                }

                                //Xử lý email
                                if ($ruleName == 'email') {
                                    if (isset($request[$field]) && !filter_var($request[$field], FILTER_VALIDATE_EMAIL)) {
                                        //Xảy ra lỗi
                                        self::setMessage($messages[$ruleName], $attributes, $field);
                                    }
                                }

                                //Xử lý same
                                if ($ruleName == 'same' && !empty($ruleValue)) {
                                    if (isset($request[$field]) && isset($request[$ruleValue]) && $request[$field]!=$request[$ruleValue]) {
                                        //Xảy ra lỗi
                                        self::setMessage($messages[$ruleName], $attributes, $field);
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                throw new Exception('$request không hợp lệ');
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
            die();
        }

        return new self();
    }

    public static function setMessage($messageTemplate, $attributes, $field, $variables = [])
    {

        $fieldName = !empty($attributes[$field]) ? $attributes[$field] : $field;
        $messageTemplate = str_replace(':attribute', $fieldName, $messageTemplate);
        if (!empty($variables)) {
            foreach ($variables as $key => $value) {
                $messageTemplate = str_replace($key, $value, $messageTemplate);
            }
        }

        self::$messages[$field][] = $messageTemplate;
    }

    private static function isValidate()
    {
        if (empty(self::$messages)) {
            return true;
        }

        //Nếu lỗi => Set thông báo lỗi

        Session::put('errors', self::$messages);
        Session::put('old', self::$body);

        return false;
    }

    public function fails()
    {
        return !self::isValidate();
    }

    public function passes()
    {
        return self::isValidate();
    }
}

/*
$validator = Validator::make($request, $rules, $messages, $attributes=[]);
$validator->fails() => Lỗi
$validator->passes() => Thành công

Lưu ý: Khi Validator::make() => tạo object

- required => Bắt buộc phải nhập
- integer => Kiểu số nguyên
- float => Kiểu số thực
- min => Giá trị nhỏ nhất
- max => Giá trị lớn nhất
- email => Định dạng email
- same => Check trường giống nhau (Nhập lại mật khẩu)
*/
