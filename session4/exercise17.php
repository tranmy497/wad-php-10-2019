<?php
$server = 'localhost'; // $server = '127.0.0.1';
$username = 'root';
$password = '123123';
$database = 'wad_php_1019';
$connect = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

$result = mysqli_query($connect, 'SELECT * FROM users');
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'email' => $row['email'],
        'birthday' => $row['birthday'],
        'phone' => $row['phone'],
        'created' => $row['created'],
        'updated' => $row['updated'],
    ];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <?php foreach ($users as $user) { ?>
        <tr></tr>
    <?php } ?>
</table>
</body>
</html>
