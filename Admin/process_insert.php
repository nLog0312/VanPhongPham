<?php
    session_start();
    require_once './ShareAdmin/root/connect.php';

    $name_product = $_POST['name_product'];
    $img_product = $_POST['img_product'];
    if (str_contains($img_product, ',')) {
        $one_img_product = substr($img_product, 0, strpos($img_product, ','));
    }
    if (str_contains($img_product,'')) {
        $one_img_product = $img_product;
    }
    $price_product = $_POST['price_product'];

    // Get count of product
    $stringSQL = "SELECT COUNT(*) FROM `sanpham`";
    $result = mysqli_query($connect, $stringSQL);
    $row = mysqli_fetch_array($result);
    $count_product = $row[0];
    $id_product = "SP" . $count_product + 1;
    $create_date = date('Y-m-d H:i:s');

    $stringSQL = "INSERT INTO `sanpham`(`ma_sanpham`, `ten_sanpham`, `anh_sanpham`, `gia_sanpham`, `ngaytao`) VALUES ('$id_product', '$name_product','$one_img_product','$price_product', '$create_date')";
    $result = mysqli_query($connect, $stringSQL);
    if ($result) {
        $_SESSION['toast-success'] = "Thêm thành công";
    } else {
        $_SESSION['toast-error'] = "Thêm thất bại";
    }
    header("Location: ./ProductCategory.php");
