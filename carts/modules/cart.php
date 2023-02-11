<?php
$cart = getSession('cart');
?>
<h2>Giỏ hàng</h2>
<?php
if (!empty($cart)):
    ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Giá</th>
            <th width="15%">Số lượng</th>
            <th>Thành tiền</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $count = 0;
    foreach ($cart as $id => $quantity):
        $count++;
        $productInfo = getProduct($id);
        $amount = $productInfo['price'] * $quantity;

        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $productInfo['name']; ?></td>
            <td><?php echo number_format($productInfo['price']).'đ'; ?></td>
            <td><input type="number" class="form-control" value="<?php echo $quantity; ?>" /></td>
            <th>
                <?php echo number_format($amount).'đ'; ?>
            </th>
            <td>
                <button type="button" class="btn btn-danger">&times;</button>
            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
    <tfoot>
        <tr>
            <th colspan="2">Tổng</th>
            <th>12000</th>
            <th>5</th>
            <th colspan="2">12000</th>
        </tr>
    </tfoot>
</table>
<button type="button" class="btn btn-danger">Xóa giỏ hàng</button>
<button type="button" class="btn btn-primary">Cập nhật giỏ hàng</button>
<a href="?module=checkout" class="btn btn-success">Thanh toán</a>
<?php else: ?>
<?php echo getMessage('Không có sản phẩm trong giỏ hàng. <a href="index.php">Quay lại mua hàng</a>', 'danger'); ?>
<?php endif; ?>