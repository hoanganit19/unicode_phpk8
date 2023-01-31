<?php
$customers = [
    [
        'name' => 'John',
        'email' => 'john@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Maria',
        'email' =>'maria@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Sandro',
        'email' =>'sandro@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Maria',
        'email' =>'maria@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Hoàng An',
        'email' =>'hoangan@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>
                    STT
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Address
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                // if (!empty($customers)) {
                //     foreach ($customers as $index => $customer) {
                //         echo '<tr>
                //                 <td>'.($index + 1).'</td>
                //                 <td>'.$customer['name'].'</td>
                //                 <td>'.$customer['email'].'</td>
                //                 <td>'.$customer['address'].'</td>
                //             </tr>';
                //     }
                // }

                //Xử lý lọc trùng

                if (!empty($customers)):
                    $emails = [];
                    foreach ($customers as $index => $customer):
                        if (!in_array($customer['email'], $emails)):
                            $emails[] = $customer['email'];
                            ?>
            <tr>
                <td><?php echo $index+1; ?></td>
                <td><?php echo $customer['name']; ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td><?php echo $customer['address'] ?></td>
            </tr>
            <?php
                        endif;
                    endforeach;
                endif;

?>

        </tbody>
    </table>
</body>

</html>