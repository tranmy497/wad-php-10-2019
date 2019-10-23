<?php
/**
 * Created by PhpStorm.
 * User: tailtq
 * Date: 10/23/19
 * Time: 18:49
 */

require_once './Customer.php';

$user = new User();

$customer = new Customer();
$customer->pay();

echo '<br>';

$customer->viewHistory();
