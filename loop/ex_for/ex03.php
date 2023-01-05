<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bàn cờ vua</title>
    <style>
    td {
        height: 100px;
    }

    .black {
        background-color: #333;

    }
    </style>
</head>

<body>
    <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <?php
            for ($i = 1; $i <= 8; $i++) {
                echo "<tr>";
                    for ($j = 1; $j <=8; $j++){
                        $total = $i + $j;
                        $class = $total % 2 !== 0? 'black' : '';

                        echo '<td class="'.$class.'"></td>';
                    }
                echo "</tr>";
            }

        ?>


    </table>
</body>

</html>