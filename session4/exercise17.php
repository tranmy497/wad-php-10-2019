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
var_dump($users);
