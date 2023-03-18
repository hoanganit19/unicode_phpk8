<div class="container py-3">
    <?php

if (!empty($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE reset_token = ?";
    $user = first($sql, [$token]);
    if (empty($user)) {
        echo getMessage('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

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
                update('users', [
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'reset_token' => null,
                    'updated_at' => date('Y-m-d H:i:s')
                ], "id=".$user['id']);

                sendMail($user['email'], 'Bạn vừa thay đổi mật khẩu', 'Chúng tôi có nhận được yêu cầu thay đổi mật khẩu thành công. Nếu không phải là bạn vui lòng liên hệ với chúng tôi');

                setSession('msg', 'Đặt lại mật khẩu thành công! Bạn có thể đăng nhập ngay bây giờ');
                setSession('msg_type', 'success');
                redirect('?action=login');
            } else {
                setSession('msg', 'Vui lòng kiểm tra lại dữ liệu');
                setSession('msg_type', 'danger');
                setSession('errors', $errors);
                reload();
            }
        }

        $msg = getFlashData('msg');
        $msgType = getFlashData('msg_type');
        $errors = getFlashData('errors');

        ?>
    <h3>
        Đặt lại mật khẩu
    </h3>
    <form action="" method="post">
        <?php echo getMessage($msg, $msgType); ?>
        <div class="mb-3">
            <label for="">Mật khẩu mới</label>
            <input type="password" name="password"
                class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>"
                placeholder="Mật khẩu mới..." />
            <?php
     echo getError('password') ? ' <div class="invalid-feedback">'.getError('password').'</div>' : '';
        ?>
        </div>
        <div class="mb-3">
            <label for="">Nhập lại mật khẩu mới</label>
            <input type="password" name="confirm_password"
                class="form-control <?php echo getError('confirm_password') ? 'is-invalid' : ''; ?>"
                placeholder="Nhập lại mật khẩu mới..." />
            <?php
     echo getError('confirm_password') ? ' <div class="invalid-feedback">'.getError('confirm_password').'</div>' : '';
        ?>
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
    <?php
    }
}
    ?>
</div>