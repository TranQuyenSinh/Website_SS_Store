<?php
    session_start();
		
    //HỦy bỏ SESSION
    unset($_SESSION['MaNguoiDung']);
    unset($_SESSION['TenHienThi']);	
    unset($_SESSION['VaiTro']);
    Header("Location: index.php");
