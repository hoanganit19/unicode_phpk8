<?php

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
            //Kiểm tra email trùng lặp
            $rows = getRows("SELECT id FROM users WHERE email='".$_POST['email']."'");
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

        $createStatus = create('users', [
            'name' => $name,
            'email' => $email,
            'group_id' => $groupId,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($createStatus) {
            //Thêm thành công
            setSession('msg', 'Thêm người dùng thành công');
            setSession('msg_type', 'success');
            redirect('index.php');
        } else {
            setSession('msg', 'Thêm người dùng thất bại');
            setSession('msg_type', 'danger');
            reload();
        }
    } else {
        setSession('msg', 'Vui lòng kiểm tra lại dữ liệu');
        setSession('msg_type', 'danger');
        setSession('errors', $errors);
        setSession('old', $_POST);
        reload();
    }
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
?>
<h2>Thêm người dùng</h2>
<form action="" method="post">
    <?php echo getMessage($msg, $msgType); ?>
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" class="form-control <?php echo getError('name') ? 'is-invalid' : ''; ?>" name="name"
            placeholder="Tên..." value="<?php echo getOld('password'); ?>" />
        <?php
     echo getError('name') ? ' <div class="invalid-feedback">'.getError('name').'</div>' : '';
?>
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>" name="email"
            placeholder="Email..." value="" />
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
                            $selected = !empty($get['group_id']) && $get['group_id'] == $group['id'] ? 'selected' : false;
                            echo "<option value='".$group['id']."' $selected>".$group['name']."</option>";
                        }
                    }
?>
        </select>
        <?php
     echo getError('group_id') ? ' <div class="invalid-feedback">'.getError('nagroup_idme').'</div>' : '';
?>
    </div>
    <div class="mb-3">
        <label for="">Trạng thái</label>
        <select name="status" class="form-select">
            <option value="0">Chưa kích hoạt</option>
            <option value="1">Kích hoạt</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>