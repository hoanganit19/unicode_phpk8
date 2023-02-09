<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']['tmp_name'])) {
        $filename = $_FILES['image']['name'];
        $filenameArr = explode('.', $filename);
        $extension = end($filenameArr);
        $extension = strtolower($extension);
        $newFile = md5(uniqid()).'.'.$extension;

        $check =  move_uploaded_file($_FILES['image']['tmp_name'], './uploads/'.$newFile);
        if ($check) {
            echo 'upload thành công';
        } else {
            echo 'upload không thành công';
        }
    }
}
?>
<form action="" method='post' enctype="multipart/form-data">
    <input type="file" name="image" />
    <button type="submit">Upload</button>
</form>