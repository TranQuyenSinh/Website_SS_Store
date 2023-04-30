<?php
    session_start();
		
    //HỦy bỏ SESSION
    unset($_SESSION['GioiTinh']);
    unset($_SESSION['DienThoai']);
    unset($_SESSION['DiaChi']);
    unset($_SESSION['Avatar']);
    unset($_SESSION['MaKhachHang']);
    unset($_SESSION['TenHienThi']);	
    
    Header("Location: ".$_SESSION['currentPage']);
