<?php
    include_once 'connect.php';

    $username =$_POST['username'];

    $sql = "select * from khachhang where TenDangNhap = '$username'";
    $result = $connect->query($sql);
    
    $data = array();
    if($result)
        $data[] = $result->fetch_array(MYSQLI_ASSOC);
    
    echo json_encode($data);
?>