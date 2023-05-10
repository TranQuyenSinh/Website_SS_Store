<?php
    include_once 'connect.php';

    $sql_laysanpham = "SELECT `MaSP`, `TenSP`, `DonGia`,`TonKho`, `SoLuongDaBan`, `TenLoaiSP` FROM sanpham sp, loaisanpham lsp WHERE sp.MaLoaiSP = lsp.MaLoaiSP";
    $list_sp = $connect->query($sql_laysanpham);
    if ($list_sp) {
        while ($sp = $list_sp->fetch_array(MYSQLI_ASSOC)) {
            echo "
                <tr>
                    <td>{$sp['TenLoaiSP']}</td>
                    <td>{$sp['MaSP']}</td>
                    <td>{$sp['TenSP']}</td>
                    <td>".number_format($sp['DonGia'])." đ</td>
                    <td>{$sp['TonKho']}</td>
                    <td>{$sp['SoLuongDaBan']}</td>
                    <td class='action-icons'>
                        <div class='action-icon-container' onclick='suaSP({$sp['MaSP']})'>
                            <div for='action-icon' class='action-icon update' >
                                <p>Sửa</p>
                            </div>
                        </div>
                        <div class='action-icon-container' onclick='xoaSP({$sp['MaSP']})'>
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