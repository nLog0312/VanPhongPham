<?php
    session_start();
    require_once './ShareAdmin/root/connect.php';

    $image_product = $_POST['img_product'];
    $img_product = str_replace(', ', ',', $img_product); // remove space
    $img_product = str_replace(' ,', ',', $img_product); // remove space
    $img_product = str_replace(' , ', ',', $img_product); // remove space
    if (str_contains($img_product, ',')) {
        $one_img_product = substr($img_product, 0, strpos($img_product, ','));
    }
    else {
        $one_img_product = $img_product;
    }

    $img_product_file = $_FILES['img_product_file'];
    // handle upload image
    $folderUpload = "IMG/PhotosProduct/";
    $fileExtension = explode(".", $img_product_file["name"])[1];

    $target_file = $folderUpload . time() . '.' . $fileExtension;
    move_uploaded_file($img_product_file["tmp_name"], $target_file);

    // property
    $properties = $_POST['properties'];

    // quantity
    $quantity = $_POST['quantity_product'];

    if ($one_img_product == "") {
        $one_img_product = $target_file;
    }
    // insert chitiet_sanpham
    $stringSQL = "INSERT INTO `chitiet_sanpham`(`ma_sanpham`, `anhs_sanpham`, `ma_thuoctinh`, `soluong`) VALUES ('$id_product',null,'$value',0)";
    $result = mysqli_query($connect, $stringSQL);

    if ($result) {
        $_SESSION['toast-success'] = "Thêm thành công";
    } else {
        $_SESSION['toast-error'] = "Thêm thất bại";
    }
    header("Location: ./ProductCategory.php");
