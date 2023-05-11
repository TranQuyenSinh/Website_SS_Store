<?php
    include_once 'connect.php';

    $sql = "SELECT * FROM loaisanpham";
    $list = $connect->query($sql);
    if ($list) {
        while ($loaisp = $list->fetch_array(MYSQLI_ASSOC)) {
            echo "
                <tr>
                    <td style='width:150px;'>{$loaisp['MaLoaiSP']}</td>
                    <td>{$loaisp['TenLoaiSP']}</td>
                    <td><img src='../../images/loaisp/{$loaisp['HinhAnh']}' alt=''></td>
                    
                    <td class='action-icons'>
                        <div class='action-icon-container' onclick='showModalUpdate({$loaisp['MaLoaiSP']})'>
                            <div for='action-icon' class='action-icon update' >
                                <p>Sửa</p>
                            </div>
                        </div>
                        <div class='action-icon-container' onclick='showDelete({$loaisp['MaLoaiSP']})'>
                            <div for='action-icon' class='action-icon delete'>
                                <p>Xóa</p>
                            </div>
                        </div>
                    </td>
                </tr>
            ";
        }
    }

    $connect->close();
?>