<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello World</title>
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
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        table th {
            text-align: right;
        }
        table th, table td {
            padding: 5px 10px;
            border: 2px solid #b2b2b2;
        }
    </style>
</head>
<body>
<?php
$ok = isset($_POST['submit']);
$keys = [
    'name',
    'address',
    'city',
    'gender',
    'start_date',
    'end_date',
    'start_period_electricity',
    'end_period_electricity',
];
$data = [];
$error = [];

foreach ($keys as $key) {
    $data[$key] = $_POST[$key] ?? '';
}

if (isset($_POST['submit'])) {
    foreach ($keys as $key) {
        $error[$key] = $data[$key] ? '' : 'Bạn phải nhập thông tin này';
        if (!$data[$key]) {
            $ok = false;
        }
    }
    if ($data['start_date'] && $data['end_date']) {
        $startDate = DateTime::createFromFormat('Y-m-d', $data['start_date'])->getTimestamp();
        $endDate = DateTime::createFromFormat('Y-m-d', $data['end_date'])->getTimestamp();
        if ($startDate >= $endDate) {
            $error['end_date'] = 'Dữ liệu không chính xác';
            $ok = false;
        }
    }
    if ($data['start_period_electricity'] &&
        $data['end_period_electricity'] &&
        ($data['start_period_electricity'] <= 0 || $data['start_period_electricity'] >= $data['end_period_electricity'])) {
        $error['end_period_electricity'] = 'Dữ liệu không chính xác';
        $ok = false;
    }
}
?>
<form action="" method="POST">
    <div>
        <label for="">&nbsp;</label>
        <span class="title">Bảng tính tiền điện</span>
    </div>
    <div>
        <label for="">Họ và tên</label>
        <input type="text" name="name" value="<?= $data['name'] ?>">
        <p class="error"><?= $error['name'] ?? '' ?></p>
    </div>
    <div>
        <label for="">Địa chỉ</label>
        <input type="text" name="address" value="<?= $data['address'] ?>">
        <p class="error"><?= $error['address'] ?? '' ?></p>
    </div>
    <div>
        <label for="">Tỉnh thành</label>
        <select name="city" id="">
            <option value="">Chọn tỉnh thành</option>
            <option
                    value="Đà Nẵng"
                    <?= $data['city'] == 'Đà Nẵng' ? 'selected' : '' ?>
            >
                Đà Nẵng
            </option>
            <option
                    value="Quảng Nam"
                    <?= $data['city'] == 'Quảng Nam' ? 'selected' : '' ?>
            >
                Quảng Nam
            </option>
        </select>
        <p class="error"><?= $error['city'] ?? '' ?></p>
    </div>
    <div>
        <label for="">Giới tính:</label>

        <label class="gender" for="male">Nam</label>
        <input type="radio"
               name="gender"
               value="Nam"
               <?= $data['gender'] == 'Nam' ? 'checked' : '' ?>
               id="male">

        <label class="gender" for="female">Nữ</label>
        <input type="radio"
               name="gender"
               value="Nữ"
               <?= $data['gender'] == 'Nữ' ? 'checked' : '' ?>
               id="female">

        <p class="error"><?= $error['gender'] ?? '' ?></p>
    </div>

    <div>
        <label for="">Ngày sử dụng đầu kỳ</label>
        <input type="date" name="start_date" value="<?= $data['start_date'] ?>">
        <p class="error"><?= $error['start_date'] ?? '' ?></p>
    </div>
    <div>
        <label for="">Ngày sử dụng cuối kỳ</label>
        <input type="date" name="end_date" value="<?= $data['end_date'] ?>">
        <p class="error"><?= $error['end_date'] ?? '' ?></p>
    </div>

    <div>
        <label for="">Số điện đầu kỳ</label>
        <input type="text" name="start_period_electricity" value="<?= $data['start_period_electricity'] ?>">
        <p class="error"><?= $error['start_period_electricity'] ?? '' ?></p>
    </div>
    <div>
        <label for="">Số điện cuối kỳ</label>
        <input type="text" name="end_period_electricity" value="<?= $data['end_period_electricity'] ?>">
        <p class="error"><?= $error['end_period_electricity'] ?? '' ?></p>
    </div>
    <div>
        <label for="">&nbsp;</label>
        <button name="submit">Tính</button>
    </div>
</form>

<?php if ($ok): ?>
    <?php
    $usedElectricity = $data['end_period_electricity'] - $data['start_period_electricity'];
    if ($usedElectricity <= 100) {
        $money = $usedElectricity * 1500;
    } else if ($usedElectricity <= 300) {
        $money = 1500 * 100;
        $money += ($usedElectricity - 100) * 2100;
    } else {
        $money = 1500 * 100 + 200 * 2100;
        $money += ($usedElectricity - 300) * 3500;
    }
    ?>
    <div class="bill">
        <p>================================================</p>
        <p>PHIẾU TÍNH TIỀN ĐIỆN</p>
        <table>
            <tr>
                <th><?= $data['gender'] == 'Nam' ? 'Ông' : 'Bà' ?></th>
                <td><?= $data['name'] ?></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><?= $data['address'] ?></td>
            </tr>
            <tr>
                <th>Tỉnh / thành phố</th>
                <td><?= $data['city'] ?></td>
            </tr>
            <tr>
                <th>Số điện đã sử dụng</th>
                <td><?= number_format($usedElectricity, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Thành tiền</th>
                <td><?= number_format($money, 0, ',', '.') ?>VND</td>
            </tr>
        </table>
    </div>
<?php endif ?>
</body>
</html>