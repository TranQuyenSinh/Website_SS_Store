<?php
    session_start();
		
    //HỦy bỏ SESSION
    unset($_SESSION['MaKhachHang']);
    unset($_SESSION['TenHienThi']);	
    
    Header("Location: index.php");		
?>