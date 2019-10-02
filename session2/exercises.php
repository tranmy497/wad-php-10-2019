<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>
<body>
<?php
    if (isset($_POST['register'])) {
        if ($_POST['email'] && $_POST['name'] && $_POST['password']) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            echo "
                <ul>
                    <li>Email: $email</li>
                    <li>Name: $name</li>
                    <li>Password: $password</li>
                </ul>
            ";
        }
    }
?>
<form action="" method="POST">
    <div>
        <label for="">Email: </label>
        <input type="text" name="email">
        <span><?= isset($_POST['register']) && !$_POST['email'] ? 'This field is required' : '' ?></span>
    </div>
    <div>
        <label for="">Name: </label>
        <input type="text" name="name">
        <span><?= isset($_POST['register']) && !$_POST['name'] ? 'This field is required' : '' ?></span>
    </div>
    <div>
        <label for="">Password: </label>
        <input type="password" name="password">
        <span><?= isset($_POST['register']) && !$_POST['password'] ? 'This field is required' : '' ?></span>
    </div>
    <button name="register">Register</button>
</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: tailtq
 * Date: 10/2/19
 * Time: 21:03
 */

