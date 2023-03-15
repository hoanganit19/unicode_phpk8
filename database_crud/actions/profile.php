<h2>Tài khoản</h2>
<?php
$login = getSession('loginData');
$id = $login['id'];
if (!empty($id)) {
    $user = first("SELECT * FROM users WHERE id = ?", [$id]);
    if (!$user) {
        redirect('index.php');
    }
} else {
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
            //Kiểm tra email trùng lặp (ignore email hiện tại)
            $rows = getRows("SELECT id FROM users WHERE email='".$_POST['email']."' AND id != ".$id);
            if ($rows > 0) {
                $errors['email']['unique'] = 'Email đã tồn tại trên hệ thống';
            }
        }
    }

    if (!empty($_POST['password'])) {
        if (mb_strlen($_POST['password'], 'UTF-8')<6) {
            $errors['password']['min'] = 'Mật khẩu phải từ 6 ký tự trở lên';
        }

        if (empty($_POST['confirm_password'])) {
            $errors['confirm_password']['required'] = 'Vui lòng nhập lại mật khẩu';
        } elseif ($_POST['confirm_password'] !== $_POST['password']) {
            $errors['confirm_password']['same'] = 'Xác nhận mật khẩu không khớp';
        }
    }


    if (empty($errors)) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $condition = "id = ".$id;

        $dataUpdate = [
            'name' => $name,
            'email' => $email,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($_POST['password'])) {
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $dataUpdate['password'] = $passwordHash;
        }

        $updateStatus = update('users', $dataUpdate, $condition);

        if ($updateStatus) {
            //Cập nhật thành công
            setSession('msg', 'Cập nhật người dùng thành công');
            setSession('msg_type', 'success');
        } else {
            setSession('msg', 'Cập nhật người dùng thất bại');
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
if (!empty($user) && empty($old)) {
    $old = $user;
}
?>
<h2>Cập nhật người dùng</h2>
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
    </div>

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
    </div>


    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>