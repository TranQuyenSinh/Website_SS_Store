<?php
    include_once 'connect.php';
    $idsp = $_POST['idsp'];

    $sql_xoasp = "DELETE FROM `sanpham` WHERE MaSP = $idsp";
    $connect->query($sql_xoasp);

    $connect->close();
?>