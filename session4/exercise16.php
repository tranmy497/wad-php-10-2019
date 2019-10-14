<?php
$server = 'localhost'; // $server = '127.0.0.1';
$username = 'root';
$password = '123123';
$database = 'wad_php_1019';
$connect = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

$fields = [
    'name',
    'email',
    'phone',
    'birthday',
];
$values = [];
$errors = [];
$ok = isset($_POST['register']);

foreach ($fields as $field) {
    $values[$field] = $_POST[$field] ?? '';

    $errors[$field] = $values[$field] || !isset($_POST['register']) ? '' : 'This field is required';
    if ($ok && $errors[$field]) {
        $ok = false;
    }
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
    <style>
        label:not(.gender) {
            width: 150px;
            display: inline-block;
            text-align: right;
            margin: 0 10px 0 0;
        }
        span.title {
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
            font-size: 20px;
        }
        .error {
            margin: 5px 0 15px 165px;
            color: red;
        }

        p.success {
            color: #76cf1f;
        }
    </style>
</head>
<body>
<form action="" method="POST">
    <div>
        <label for="">&nbsp;</label>
        <span class="title">Sign up</span>
    </div>
    <div>
        <label for="">Email: </label>
        <input type="text" name="email" value="<?= $values['email'] ?>">
        <p class="error"><?= $errors['email'] ?></p>
    </div>
    <div>
        <label for="">Name: </label>
        <input type="text" name="name" value="<?= $values['name'] ?>">
        <p class="error"><?= $errors['name'] ?></p>
    </div>
    <div>
        <label for="">Phone: </label>
        <input type="text" name="phone" value="<?= $values['phone'] ?>">
        <p class="error"><?= $errors['phone'] ?></p>
    </div>
    <div>
        <label for="">Birthday: </label>
        <input type="date" name="birthday" value="<?= $values['birthday'] ?>">
        <p class="error"><?= $errors['birthday'] ?></p>
    </div>
    <div>
        <label for="">&nbsp;</label>
        <button name="register">Register</button>
    </div>

    <?php
    if (isset($_POST['register']) && $ok) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $created = date('Y-m-d H:i:s');
        $sql = "insert into users(name, phone, email, birthday, created, updated)
                values('$name', '$phone', '$email', '$birthday', '$created', '$created')";
        if (mysqli_query($connect, $sql) === true) {
            echo '<p class="success" style="margin-left: 160px;">Register successfully</p>';
        } else {
            var_dump($connect->error);
        }
    }
    ?>
</form>
</body>
</html>
