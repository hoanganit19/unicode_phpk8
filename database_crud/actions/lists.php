<?php
$users = get("SELECT users.*, groups.name AS group_name FROM users INNER JOIN groups ON users.group_id=groups.id ORDER BY id DESC");
?>
<h2>Danh sách người dùng</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Nhóm</th>
            <th>Trạng thái</th>
            <th>Thời gian</th>
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
                <a href="#" class="btn btn-warning">Sửa</a>
            </td>
            <td>
                <a href="#" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        <?php
                endforeach;
            endif;
?>
    </tbody>
</table>
<nav aria-label="Page navigation example" class="d-flex justify-content-end">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>