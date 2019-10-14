<?php

$server = 'localhost'; // $server = '127.0.0.1';
$username = 'root';
$password = '123123';
$database = 'wad_php_1019';
$connect = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' .mysqli_connect_error();
}
$sql = "insert into users(name, phone, email, birthday, created, updated)
        values
            ('name1', 'phone1', 'email1@gmail.com', '2000-01-01', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
            ('name2', 'phone2', 'email2@gmail.com', '2000-01-05', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
            ('name3', 'phone3', 'email3@gmail.com', '2000-01-04', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
            ('name4', 'phone4', 'email4@gmail.com', '2000-01-03', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
            ('name5', 'phone5', 'email5@gmail.com', '2000-01-02', '2019-10-09 18:00:00', '2019-10-09 18:00:00');";
//if (mysqli_query($connect, $sql) === true) {
//
//}
//var_dump($connect);
