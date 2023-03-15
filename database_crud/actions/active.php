<div class="container py-3">
    <?php

if (!empty($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE active_token = ?";
    $user = first($sql, [$token]);
    if (empty($user)) {
        echo getMessage('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
    } else {
        update('users', [
            'status' => 1,
            'active_token' => null,
            'updated_at' => date('Y-m-d H:i:s')
        ], 'id = '.$user['id']);

        echo getMessage('Kích hoạt tài khoản thành công. Bạn có thể đăng nhập ngay bây giờ.', 'success');
    }
}
    ?>
</div>