<?php
$login = getSession('loginData');
if ($login) {
    redirect('index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Lấy hash trong database
    $user = first("SELECT * FROM users WHERE email=?", [$email]);

    if (!empty($user)) {
        $passwordHash = $user['password'];
        $check = password_verify($password, $passwordHash);
        if ($check) {
            setSession('loginData', $user);
            redirect('index.php');
        } else {
            setSession('msg', 'Mật khẩu không chính xác');
            setSession('msg_type', 'danger');
            reload();
        }
    } else {
        setSession('msg', 'Không tìm thấy người dùng');
        setSession('msg_type', 'danger');
    }
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
?>
<h2>Login</h2>
<form action="" method="post">
    <?php echo getMessage($msg, $msgType); ?>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email..." required>
    </div>
    <div class="mb-3">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password..." required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>