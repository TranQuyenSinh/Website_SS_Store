<?php
include_once 'connect.php';
include_once "return_error.php";

$sql = $_POST['sql'];
$list_more = $connect->query($sql);


if ($connect->error)
  return_error($connect->error);

$data = array();
while ($row = $list_more->fetch_array(MYSQLI_ASSOC)) {
  $data[] = $row;
}

// trả về dạng json
echo json_encode($data);
