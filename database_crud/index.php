<?php
require_once 'config.php';
require_once 'includes/connect.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php
            if (!empty($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = 'lists';
            }

            $path = 'actions/'. $action. '.php';
require_once $path;
?>
    </div>
</body>

</html>