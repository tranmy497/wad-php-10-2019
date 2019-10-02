<?php

/*
 * -----------------------------------------
 * Bai tap 2
 * -----------------------------------------
 */

$n = 3;

function exercise2() {
    global $n;
    if ($n == 2) {
        echo 'Thứ hai';
    } else if ($n == 3) {
        echo 'Thứ ba';
    } else if ($n == 4) {
        echo 'Thứ tư';
    } else if ($n == 5) {
        echo 'Thứ năm';
    } else if ($n == 6) {
        echo 'Thứ sáu';
    } else if ($n == 7) {
        echo 'Thứ bảy';
    } else if ($n == 8) {
        echo 'Chủ nhật';
    } else {
        echo 'Không phải ngày trong tuần';
    }
}

/*
 * -----------------------------------------
 * Bai tap 3
 * -----------------------------------------
 */
function exercise3 () {
    global $n;
    switch ($n) {
        case 2:
            echo 'Thứ hai'; break;
        case 3:
            echo 'Thứ hai'; break;
        case 4:
            echo 'Thứ hai'; break;
        case 5:
            echo 'Thứ hai'; break;
        case 6:
            echo 'Thứ hai'; break;
        case 7:
            echo 'Thứ hai'; break;
        case 8:
            echo 'Thứ hai'; break;
        default:
            echo 'Không phải ngày trong tuần'; break;
    }
}

/*
 * -----------------------------------------
 * Bai tap 4
 * -----------------------------------------
 */
function exercise4() {
    for ($i = 0; $i <= 100; $i++) {
        if ($i % 6 == 0) {
            echo "<p>$i chia hết cho 6</p>";
        } else if ($i % 2 == 0) {
            echo "<p>$i chia hết cho 2</p>";
        } else if ($i % 3 == 0) {
            echo "<p>$i chia hết cho 3</p>";
        } else {
            echo "<p>$i không chia hết cho 2, 3, 6</p>";
        }
    }
}

/*
 * -----------------------------------------
 * Bai tap 5
 * -----------------------------------------
 */
function exercise5() {
    $binhBook = 27;
    $minhBook = $binhBook / 3;
    $allBook = $binhBook + $minhBook;

    echo $binhBook - $allBook * 2 / 3;
}

/*
 * -----------------------------------------
 * Bai tap 6
 * -----------------------------------------
 */
function exercise6() {
    $money = 2000;
    $count = 0;
    while ($money >= 200) {
        $count++;
        $money -= 100;
    }

    echo $count;
}

/*
 * -----------------------------------------
 * Bai tap 7
 * -----------------------------------------
 */
function exercise7() {
    echo '$10';
}

/*
 * -----------------------------------------
 * Bai tap 8
 * -----------------------------------------
 */
function exercise8() {
    // Tỉ lệ 2 phương trình -> cộng hai phương
    echo "Bi xanh: 20<br>Bi đỏ: 30";
}

/*
 * -----------------------------------------
 * Bai tap 9
 * -----------------------------------------
 */
function exercise9() {
    echo "
    <ul>
        <li>Bi đỏ: 24</li>
        <li>Bi xanh: 36</li>
        <li>Bi vàng: 42</li>
        <li>Bi trắng: 18</li>
    </ul>
    ";
}