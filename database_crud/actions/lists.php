<?php

$login = getSession('loginData');
if (empty($login)) {
    redirect('?action=login');
}

$limit = 3;
$get = isset($_GET) ? $_GET : false;
//Xử lý lọc
$filters = "";
if (!empty($get['status'])) {
    if ($get['status'] == 'active' || $get['status'] == 'inactive') {
        $status = $get['status'] == 'active' ? 1 : 0;
        $filters.=getOperator($filters).' status='.$status;
    }
}

if (!empty($get['group_id'])) {
    $groupId = $get['group_id'];
    $filters.=getOperator($filters).' users.group_id='.$groupId;
}

if (!empty($get['keyword'])) {
    $keyword = $get['keyword'];
    $filters.=getOperator($filters)." (users.name LIKE '%".$keyword."%' OR users.email LIKE '%".$keyword."%')";
}

//Xử lý phân trang
//1. Tính tổng số trang: số lượng bản ghi / số lượng bản ghi 1 trang => Làm tròn lên
$totalRows = getRows("SELECT id FROM users $filters");
$maxPage = ceil($totalRows / $limit);

//2. Lấy trang hiện tại
if (!empty($get['page']) && filter_var($get['page'], FILTER_VALIDATE_INT, [
    'options' => [
       'min_range' => 1,
       'max_range' => $maxPage,
    ]
])!== false) {
    $page = $get['page'];
} else {
    $page = 1;
}

//3. Tính offset
$offset = $limit * ($page - 1);
$order = 'users.id DESC';
if (!empty($get['orderBy'])) {
    $orderBy = $get['orderBy'];
    $type = $get['type'] ?? 'asc';

    $order = "users.$orderBy $type, users.id DESC";
}

$users = get("SELECT users.*, groups.name AS group_name FROM users INNER JOIN groups ON users.group_id=groups.id $filters ORDER BY $order LIMIT $limit OFFSET $offset");

$groups = get("SELECT * FROM groups ORDER BY name");

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
echo getMessage($msg, $msgType);

?>
<div>
    <ul class="nav">
        <li>Chào bạn: <?php echo $login['name']; ?></li>
        <li><a href="?action=logout">Đăng xuất</a></li>
    </ul>
</div>
<h2>Danh sách người dùng</h2>
<a href="?action=add" class="btn btn-primary mb-3">Thêm mới</a>
<form action="" class="mb-3">
    <div class="row">
        <div class="col-3">
            <select name="status" class="form-select" id="">
                <option value="all">Tất cả trạng thái</option>
                <option value="active"
                    <?php echo !empty($get['status']) && $get['status']=='active' ? 'selected' : false; ?>>Kích hoạt
                </option>
                <option value="inactive"
                    <?php echo !empty($get['status']) && $get['status']=='inactive' ? 'selected' : false; ?>>Chưa kích
                    hoạt
                </option>
            </select>
        </div>
        <div class="col-3">
            <select name="group_id" class="form-select" id="">
                <option value="0">Tất cả nhóm</option>
                <?php
                    if (!empty($groups)) {
                        foreach ($groups as $group) {
                            $selected = !empty($get['group_id']) && $get['group_id'] == $group['id'] ? 'selected' : false;
                            echo "<option value='".$group['id']."' $selected>".$group['name']."</option>";
                        }
                    }
?>
            </select>
        </div>
        <div class="col-4">
            <input type="search" name="keyword" class="form-control" placeholder="Từ khóa..."
                value="<?php echo $get['keyword']??false; ?>" />
        </div>
        <div class="col-2 d-grid">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th><a
                    href="?orderBy=name&type=<?php echo !empty($get['type']) && $get['type']=='asc' ? 'desc' : 'asc'; ?>">Tên</a>
            </th>
            <th>
                <a
                    href="?orderBy=email&type=<?php echo !empty($get['type']) && $get['type']=='asc' ? 'desc' : 'asc'; ?>">
                    Email
                </a>
            </th>
            <th>Nhóm</th>
            <th>Trạng thái</th>
            <th><a
                    href="?orderBy=created_at&type=<?php echo !empty($get['type']) && $get['type']=='asc' ? 'desc' : 'asc'; ?>">Thời
                    gian</a></th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (!empty($users)):
                foreach ($users as $index => $user):
                    ?>
        <tr>
            <td><?php echo $index+1; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <?php echo $user['group_name']; ?>
            </td>
            <td><?php echo $user['status']==1 ? 'Kích hoạt' : 'Chưa kích hoạt'; ?></td>
            <td>
                <?php echo getDateFormat($user['created_at'], 'd/m/Y H:i:s'); ?>
            </td>
            <td>
                <a href="?action=edit&id=<?php echo $user['id']; ?>" class="btn btn-warning">Sửa</a>
            </td>
            <td>
                <a href="#" class="btn btn-danger delete-btn">Xóa</a>
                <?php require('form_delete.php'); ?>
            </td>
        </tr>
        <?php
                endforeach;
            else:
                ?>
        <tr>
            <td colspan="8" class="text-center">Không có dữ liệu</td>
        </tr>
        <?php
            endif;
?>
    </tbody>
</table>
<?php
if ($maxPage > 1):
    ?>
<nav aria-label="Page navigation example" class="d-flex justify-content-end">
    <ul class="pagination">
        <?php
            if ($page > 1) {
                echo '<li class="page-item"><a class="page-link" href="'.getPaginateUrl($page-1).'">Quay lại</a></li>';
            }

            $begin = $page - 3;
    if ($begin < 1) {
        $begin = 1;
    }

    $end = $page + 3;
    if ($end > $maxPage) {
        $end = $maxPage;
    }

    for ($index = $begin; $index <= $end; $index++) {
        $active = $index == $page ? 'active' : false;
        echo '<li class="page-item"><a class="page-link '.$active.'" href="'.getPaginateUrl($index).'">'.$index.'</a></li>';
    }

    if ($page < $maxPage) {
        echo '<li class="page-item"><a class="page-link" href="'.getPaginateUrl($page+1).'">Tiếp theo</a></li>';
    }
    ?>

    </ul>
</nav>
<?php endif; ?>

<script>
const deleteBtn = document.querySelectorAll('.delete-btn');
if (deleteBtn.length) {
    deleteBtn.forEach((item) => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            if (confirm('Bạn có chắc chắn muốn xóa?')) {
                const formDelete = e.target.nextElementSibling;
                formDelete.submit();
            }
        })
    })
}
</script>