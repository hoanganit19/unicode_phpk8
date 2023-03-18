<h3>Quên mật khẩu</h3>
<p>Vui lòng nhập địa chỉ email mà bạn đã đăng ký tài khoản</p>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = first($sql, [$email]);
        if (!empty($user)) {
            //Thiết lập gửi email
            $token = md5(uniqid());
            update('users', [
                'reset_token' => $token,
                'updated_at' => date('Y-m-d H:i:s')
            ], "email='$email'");

            $link = APP_URL.'?action=reset&token=' . $token;

            //Gửi email
            $subject = "Hướng dẫn đặt lại mật khẩu";
            $content = "<p>Chào bạn: ".$user['name']."</p>";
            $content.="<p>Bạn vui lòng click vào link dưới đây để đặt lại mật khẩu</p>";
            $content.=$link;

            sendMail($email, $subject, $content);

            setSession('msg', 'Chúng tôi đã gửi cho 1 email hướng dẫn cách lấy lại mật khẩu');
            setSession('msg_type', 'success');
        } else {
            setSession('msg', 'Email bạn nhập không tồn tại trong hệ thống');
            setSession('msg_type', 'danger');
        }

        reload();
    }

    $msg = getFlashData('msg');
$msgType = getFlashData('msg_type');

?>
<form action="" method="post">
    <?php echo getMessage($msg, $msgType); ?>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email..." />
    </div>
    <button type="submit" class="btn btn-primary">Xác nhận</button>
</form>