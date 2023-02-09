<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ids = $_POST['selection'];
    echo '<pre>';
    print_r($ids);
    echo '</pre>';
}
?>
<form action="" method="post">
    <table width="100%" border="1" cellpadding="0" cellpacing="0">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="checkbox" name="selection[]" value="1">
                </td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>123-456-7890</td>
                <td>Boston, MA</td>
                <td>Boston, MA</td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="selection[]" value="2">
                </td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>123-456-7890</td>
                <td>Boston, MA</td>
                <td>Boston, MA</td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="selection[]" value="3">
                </td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>123-456-7890</td>
                <td>Boston, MA</td>
                <td>Boston, MA</td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Xóa đã chọn</button>
</form>