<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';

    if (!empty($_FILES['images']['name'][0])) {
        $count = 0;
        //Xử lý name
        foreach ($_FILES['images']['name'] as $key => $name) {
            $nameArr = explode('.', $name);
            $ext = end($nameArr);
            $ext = strtolower($ext);
            $newFile = md5(uniqid()). '.'.$ext;

            $tmpPath = $_FILES['images']['tmp_name'][$key];

            $check = move_uploaded_file($tmpPath, './uploads/'.$newFile);

            if ($check) {
                $count++;
            }
        }

        if ($count>0) {
            echo 'Đã upload '.$count.' file';
        } else {
            echo 'Upload không thành công';
        }
    } else {
        echo 'Vui lòng chọn file';
    }
}
?>
<form action="" method='post' enctype="multipart/form-data">
    <input type="file" name="images[]" multiple />
    <button type="submit">Upload</button>
</form>