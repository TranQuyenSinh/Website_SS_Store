<?php
  include_once 'connect.php';
  
  // số lượng sp mỗi lần lấy
  $limit = 10;

  $start = $_POST['start'];

  $sql = "select * from SanPham LIMIT $start , $limit";
  $list_more = $connect->query($sql);
  $data = array();

  while($row = $list_more->fetch_array(MYSQLI_ASSOC)) {
    $data[] = $row;
  }

  // trả về dạng json
  echo json_encode($data);
?>