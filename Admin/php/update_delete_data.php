<?php
include_once 'connect.php';
include_once "return_error.php";

$sql = $_POST['sql'];
$result = $connect->query($sql);

if ($connect->error)
  return_error($connect->error);

// trả vể dạng bool
echo $result;
