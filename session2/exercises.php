<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span.error {
            color: red;
        }
        p.success {
            color: #76cf1f;
        }
    </style>
</head>
<body>
<?php $isSubmitted = isset($_POST['register']); ?>
<form action="" method="POST">
    <div>
        <label for="">Email: </label>
        <input type="text" name="email">
        <span class="error"><?= $isSubmitted && !$_POST['email'] ? 'This field is required' : '' ?></span>
    </div>
    <div>
        <label for="">Name: </label>
        <input type="text" name="name">
        <span class="error"><?= $isSubmitted && !$_POST['name'] ? 'This field is required' : '' ?></span>
    </div>
    <div>
        <label for="">Password: </label>
        <input type="password" name="password">
        <span class="error"><?= $isSubmitted && !$_POST['password'] ? 'This field is required' : '' ?></span>
    </div>
    <button name="register">Register</button>

    <?php
    if ($isSubmitted) {
        if ($_POST['email'] && $_POST['name'] && $_POST['password']) {
            echo '<p class="success">Register successfully</p>';
        }
    }
    ?>
</form>
</body>
</html>
