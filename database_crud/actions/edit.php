<?php
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = first("SELECT * FROM users WHERE id = ?", [$id]);
    if (!$user) {
        redirect('index.php');
    }
} else {
    redirect('index.php');
}

$groups = get("SELECT * FROM groups ORDER BY name");

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

    if (empty($_POST['group_id'])) {
        $errors['group_id']['required'] = 'Vui lòng chọn nhóm';
    }

    if (empty($errors)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $groupId = $_POST['group_id'];
        $status = $_POST['status'];

        $condition = "id = ".$id;

        $updateStatus = update('users', [
            'name' => $name,
            'email' => $email,
            'group_id' => $groupId,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ], $condition);

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
        <label for="">Nhóm</label>
        <select name="group_id" class="form-select <?php echo getError('group_id') ? 'is-invalid' : ''; ?>">
            <option value="">Chọn nhóm</option>
            <?php
                    if (!empty($groups)) {
                        foreach ($groups as $group) {
                            $selected = getOld('group_id') == $group['id'] ? 'selected' : false;
                            echo "<option value='".$group['id']."' $selected>".$group['name']."</option>";
                        }
                    }
?>
        </select>
        <?php
     echo getError('group_id') ? ' <div class="invalid-feedback">'.getError('group_id').'</div>' : '';
?>
    </div>
    <div class="mb-3">
        <label for="">Trạng thái</label>
        <select name="status" class="form-select">
            <option value="0" <?php echo getOld('status')==0 ? 'selected' : false; ?>>Chưa kích hoạt</option>
            <option value="1" <?php echo getOld('status')==1 ? 'selected' : false; ?>>Kích hoạt</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>