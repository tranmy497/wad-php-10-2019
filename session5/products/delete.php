<?php
require_once '../base/functions.php';

$id = $_GET['id'];

if (delete($id)) {
    header("Location: index.php");
}
