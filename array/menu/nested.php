<?php

require_once 'functions.php';
$nested = [
    [
        'id' => 1,
        'title' => 'Trang chủ',
        'link' => '#'
    ],

    [
        'id' => 2,
        'title' => 'Giới thiệu',
        'link' => '#'
    ],

    [
        'id' => 3,
        'title' => 'Sản phẩm',
        'link' => '#',
       'children' => [
        [
                'id' => 6,
                'title' => 'Sản phẩm 1',
                'link' => '#',
                'children' => [
                    [
                        'id' => 10,
                        'title' => 'Sản phẩm 1.1',
                        'link' => '#',

                    ],

                    [
                        'id' => 11,
                        'title' => 'Sản phẩm 1.2',
                        'link' => '#',

                    ],

                    [
                        'id' => 12,
                        'title' => 'Sản phẩm 1.3',
                        'link' => '#',

                    ],
                ]
            ],

            [
                'id' => 7,
                'title' => 'Sản phẩm 2',
                'link' => '#',
                'children' => [
                    [
                        'id' => 13,
                        'title' => 'Sản phẩm 2.1',
                        'link' => '#',

                    ],

                    [
                        'id' => 14,
                        'title' => 'Sản phẩm 2.2',
                        'link' => '#',
                       'children' => [
                        [
                            'id' => 15,
                            'title' => 'Sản phẩm 2.2.1',
                            'link' => '#',

                        ],

                        [
                            'id' => 16,
                            'title' => 'Sản phẩm 2.2.2',
                            'link' => '#',

                        ],

                        [
                            'id' => 17,
                            'title' => 'Sản phẩm 2.2.3',
                            'link' => '#',

                        ],
                       ]
                    ],

                    [
                        'id' => 15,
                        'title' => 'Sản phẩm 2.3',
                        'link' => '#',

                    ],
                ]
            ],

            [
                'id' => 8,
                'title' => 'Sản phẩm 3',
                'link' => '#',

            ],

            [
                'id' => 9,
                'title' => 'Sản phẩm 4',
                'link' => '#',

            ],
       ]
    ],
    [
        'id' => 18,
        'title' => 'Front-End',
        'link' => '#',
        'parent' => 4
    ],
    [
        'id' => 19,
        'title' => 'Back-End',
        'link' => '#',
        'parent' => 4
    ],
];

echo '<pre>';
print_r($nested);
echo '</pre>';
die();
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
                <?php buildMenus2($nested);?>
            </nav>
        </div>
    </header>

    <main>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, soluta eligendi! Neque assumenda voluptatum
        fugit. Sint nobis error praesentium quis maiores, quos excepturi? Error alias aut sint quibusdam vero ratione!
    </main>
</body>

</html>