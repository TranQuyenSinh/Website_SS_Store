<?php
    $servername = 'localhost';
	$username = 'root';	
	$password = 'vertrigo';
	$dbname = 'ss_store';
	
	$connect = new mysqli($servername, $username, $password, $dbname);

	if ($connect->connect_error) {
		die ("Không thể kết nối: " . $connect->connect_error);
		exit();
	}
?>