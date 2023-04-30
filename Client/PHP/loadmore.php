<?php
  include_once 'connect.php';
  
  $sql = $_POST['sql'];
  $list_more = $connect->query($sql);
  $data = array();

  while($row = $list_more->fetch_array(MYSQLI_ASSOC)) {
    $data[] = $row;
  }

  // trả về dạng json
  echo json_encode($data);
?>