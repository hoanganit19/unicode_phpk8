<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = []; //Chứa các lỗi của các trường

    //Kiểm tra từng trường
    //Mỗi trường sẽ có 1 hoặc nhiều lỗi
    //email: bắt buộc phải nhập (required), định dạng email (email)

    //password: bắt buộc phải nhập (required), độ dài >=8 (min)

    //$errors[fieldName][rule]

    if (empty($_POST['email'])) {
        $errors['email']['required'] = 'Vui lòng nhập email';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['email'] = 'Email không đúng định dạng';
        }
    }

    if (empty($_POST['password'])) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } else {
        if (mb_strlen($_POST['password'], 'UTF-8') < 8) {
            $errors['password']['min'] = 'Mật khẩu không được nhỏ hợn 8 ký tự';
        }
    }

    if (empty($errors)) {
        //Thành công
        redirect('success.php');
    } else {
        setSession('msg', 'Vui lòng kiểm tra dữ liệu');
        setSession('msg_type', 'danger');
        setSession('errors', $errors);
        setSession('old', $_POST);

        reload(); //reload
    }
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2>Login Form</h2>
                <form action="" method="post">
                    <?php
    echo getMessage($msg, $msgType);
?>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>"
                            name="email" placeholder="Email" value="<?php echo getOld('email'); ?>">

                        <?php
     echo getError('email') ? ' <div class="invalid-feedback">'.getError('email').'</div>' : '';
?>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password"
                            class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>" name="password"
                            placeholder="Password" value="<?php echo getOld('password'); ?>">


                        <?php
                         echo getError('password') ? ' <div class="invalid-feedback">'.getError('password').'</div>' : '';
?>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>