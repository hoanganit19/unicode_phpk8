<?php

//Kiểm tra http method
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //Xử lý get
    //Lấy dữ liệu từ client
    if (!empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];

        //Xử lý dữ liệu
        //Lấy từ database

        //Trả về dữ liệu (Resonse)

        echo 'keyword = '.$keyword.'<br/>';
    }
}