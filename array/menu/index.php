<?php
require 'data.php';
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Mobile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <header class="header">
        <div class="container">

            <div class="header-inner">
                <h1>Header</h1>
            </div>

            <nav class="primary-menu">
                <label for="menu-toggle" class="menu-toggle">
                    <i class="fa-solid fa-bars"></i>
                </label>
                <input type="checkbox" id="menu-toggle" />
                <?php buildMenus($menus); ?>
                <!-- <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li>
                        <a href="#">Sản phẩm</a>

                        <ul>
                            <li>
                                <a href="#">Sản phẩm 1</a>

                                <ul>
                                    <li><a href="#">Sản phẩm 1.1</a></li>
                                    <li>
                                        <a href="#">Sản phẩm 1.2</a>
                                        <ul>
                                            <li><a href="#">Sản phẩm 1.2.1</a></li>
                                            <li><a href="#">Sản phẩm 1.2.1</a></li>
                                            <li><a href="#">Sản phẩm 1.2.1</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Sản phẩm 1.3</a>
                                        <ul>
                                            <li><a href="#">Sản phẩm 1.3.1</a></li>
                                            <li><a href="#">Sản phẩm 1.3.1</a></li>
                                            <li><a href="#">Sản phẩm 1.3.1</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Sản phẩm 2</a>
                                <ul>
                                    <li><a href="#">Sản phẩm 2.1</a></li>
                                    <li><a href="#">Sản phẩm 2.2</a></li>
                                    <li><a href="#">Sản phẩm 2.3</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Sản phẩm 3</a>
                                <ul>
                                    <li><a href="#">Sản phẩm 3.1</a></li>
                                    <li><a href="#">Sản phẩm 3.2</a></li>
                                    <li><a href="#">Sản phẩm 3.3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Sản phẩm 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dịch vụ</a>
                        <ul>
                            <li><a href="#">Sản phẩm 1.1</a></li>
                            <li><a href="#">Sản phẩm 1.2</a></li>
                            <li><a href="#">Sản phẩm 1.3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul> -->
            </nav>
        </div>
    </header>

    <main>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, soluta eligendi! Neque assumenda voluptatum
        fugit. Sint nobis error praesentium quis maiores, quos excepturi? Error alias aut sint quibusdam vero ratione!
    </main>
</body>

</html>