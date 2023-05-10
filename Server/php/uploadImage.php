<?php

    // hàm upload hình ảnh lên server và trả về tên hình ảnh sau khi upload
    // param: $file = $_FILES['HinhAnh']
    //        $path: đường dẫn lưu hình ảnh

    function uploadImage($file, $newname, $path) {
        $target_file = $path.$newname;
        $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
        // kiểm tra định dạng file
        if ($fileType != 'jpeg' && $fileType != 'jpg' && $fileType != 'png' && $fileType != 'webp') {
            echo "<h3 style='color:red;'>Lưu thất bại: Chỉ được lưu ảnh dạng .png, .jpg, .jpeg, .webp</h3>";
            exit();
        }
        move_uploaded_file($file['tmp_name'], "$target_file.$fileType");
        return "$newname.$fileType";
    }
?>