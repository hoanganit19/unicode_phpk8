<?php
$login = getSession('loginData');
if ($login) {
    redirect('index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    if (empty($_POST['name'])) {
        $errors['name']['required'] = 'Vui lòng nhập tên';
    }

    if (empty($_POST['email'])) {
        $errors['email']['required'] = 'Vui lòng nhập email';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['email'] = 'Email không đúng định dạng';
        } else {
            //Kiểm tra email trùng lặp
            $rows = getRows("SELECT id FROM users WHERE email='".$_POST['email']."'");
            if ($rows > 0) {
                $errors['email']['unique'] = 'Email đã tồn tại trên hệ thống';
            }
        }
    }

    if (empty($_POST['password'])) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } elseif (mb_strlen($_POST['password'], 'UTF-8')<6) {
        $errors['password']['min'] = 'Mật khẩu phải từ 6 ký tự trở lên';
    }

    if (empty($_POST['confirm_password'])) {
        $errors['confirm_password']['required'] = 'Vui lòng nhập lại mật khẩu';
    } elseif ($_POST['confirm_password'] !== $_POST['password']) {
        $errors['confirm_password']['same'] = 'Xác nhận mật khẩu không khớp';
    }

    if (empty($errors)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $groupId = 6;
        $status = 0;

        $activeToken = md5(uniqid());

        $linkActive = APP_URL.'?action=active&token='.$activeToken;

        $subject = 'Vui lòng kích hoạt tài khoản tại Unicode Academy';

        $content = '<p>Chào bạn: '.$name.'</p>
        <p>Bạn vui lòng kích hoạt tài khoản bằng cách nhấp vào link dưới đây</p>
        <p>'.$linkActive.'</p>
        <p>Nếu trình duyệt không tự chuyển, vui lòng copy link và dán lên thanh địa chỉ</p>';

        $createStatus = create('users', [
            'name' => $name,
            'email' => $email,
            'group_id' => $groupId,
            'status' => $status,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'active_token' => $activeToken,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($createStatus) {
            //Thêm thành công
            setSession('msg', 'Đăng ký tài khoản thành công');
            setSession('msg_type', 'success');

            sendMail($email, $subject, $content);
        } else {
            setSession('msg', 'Đăng ký tài khoản không thành công');
            setSession('msg_type', 'danger');
        }
    } else {
        setSession('msg', 'Vui lòng kiểm tra lại dữ liệu');
        setSession('msg_type', 'danger');
        setSession('errors', $errors);
        setSession('old', $_POST);
    }

    reload();
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
?>
<h2>Đăng ký tài khoản</h2>
<form action="" method="post">
    <?php echo getMessage($msg, $msgType); ?>
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" class="form-control <?php echo getError('name') ? 'is-invalid' : ''; ?>" name="name"
            placeholder="Tên..." value="<?php echo getOld('name'); ?>" />
        <?php
     echo getError('name') ? ' <div class="invalid-feedback">'.getError('name').'</div>' : '';
?>
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>" name="email"
            placeholder="Email..." value="<?php echo getOld('email'); ?>" />
        <?php
     echo getError('email') ? ' <div class="invalid-feedback">'.getError('email').'</div>' : '';
?>
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>"
                name="password" placeholder="Mật khẩu..." value="" />
            <?php
     echo getError('password') ? ' <div class="invalid-feedback">'.getError('password').'</div>' : '';
?>
        </div>

        <div class="mb-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" class="form-control <?php echo getError('confirm_password') ? 'is-invalid' : ''; ?>"
                name="confirm_password" placeholder="Nhập lại mật khẩu..." value="" />
            <?php
     echo getError('confirm_password') ? ' <div class="invalid-feedback">'.getError('confirm_password').'</div>' : '';
?>
            <button type="submit" class="btn btn-primary">Login</button>
</form>