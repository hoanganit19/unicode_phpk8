<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Lấy productId
    $addToCart = $_POST['add_to_cart'];
    $productIdArr = array_keys($addToCart);
    $productId = reset($productIdArr);

    //Lấy quantity theo productId

    $quantity = $_POST['quantity'][$productId];

    //Xử lý thêm vào giỏ hàng
    //$_SESSION['cart'][$productId] = $quantity;
    //Nếu sản phẩm chưa có trong giỏ hàng => Thêm mới, nếu đã có => Cập nhật lại số lượng

    $cart = getSession('cart');

    if (!empty($cart[$productId])) {
        $cart[$productId] += $quantity;
    } else {
        $cart[$productId] = $quantity;
    }

    setSession('cart', $cart);

    setSession('msg', 'Thêm vào giỏ hàng thành công. <a href="?module=cart">Xem giỏ hàng</a>');

    reload();
}

$msg = getFlashData('msg');

echo getMessage($msg);

?>
<h2>Danh sách sản phẩm</h2>
<form action="" method="post">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th>Giá</th>
                <th width="20%">Mua</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    if (!empty($products)):
                        foreach ($products as $key => $product):
                            ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo number_format($product['price']).'đ'; ?></td>
                <td class="d-grid">
                    <input type="number" name="quantity[<?php echo $product['id']; ?>]" class="form-control mb-2"
                        value="1" />
                    <button type="submit" name="add_to_cart[<?php echo $product['id']; ?>]" class="btn btn-danger">Thêm
                        vào giỏ</button>
                </td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</form>