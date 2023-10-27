<?php
    session_start();
    require_once './ShareAdmin/root/connect.php';

    $name_product = $_POST['name_product'];
    $img_product = $_POST['img_product'];
    $img_product = str_replace(' ', '', $img_product); // remove space
    if (str_contains($img_product, ',')) {
        $one_img_product = substr($img_product, 0, strpos($img_product, ','));
    }
    else {
        $one_img_product = $img_product;
    }
    $price_product = $_POST['price_product'];
    $description_product = $_POST['desc_product'];

    // ---------------- handle properties ----------------
    $lstProperties = $_POST['properties'];
    $lstProperties = str_replace(' ', '', $lstProperties); // remove space
    $id_properties = "";
    // Get id properties
    foreach ($lstProperties as $key => $value) {
        if (!str_contains($id_properties, $value))
            $id_properties .= ($value . ',');
    }
    $id_properties = substr($id_properties, 0, strlen($id_properties) - 1); // remove last comma
    // ----------------------------------------------------

    // Get quantity of product
    $quantity_product = $_POST['quantity_product'];

    // ---------------- Get count of product to create id ----------------
    $stringSQL = "SELECT COUNT(*) FROM `sanpham`";
    $result = mysqli_query($connect, $stringSQL);
    $row = mysqli_fetch_array($result);
    $count_product = $row[0];
    $id_product = "SP" . $count_product + 1;
    // -------------------------------------------------------------------

    $create_date = date('Y-m-d H:i:s'); // Get current date

    // Insert into table sanpham
    $stringSQLProduct = "INSERT INTO `sanpham`(`ma_sanpham`, `ten_sanpham`, `anh_sanpham`, `gia_sanpham`, `mota_sanpham`, `ngaytao`) VALUES ('$id_product', '$name_product','$one_img_product','$price_product', '$description_product', '$create_date')";
    $resultProduct = mysqli_query($connect, $stringSQLProduct);

    // Insert into table chitiet_sanpham
    $stringSQLDetailProduct = "INSERT INTO `chitiet_sanpham`(`ma_sanpham`, `anh_sanpham`, `ma_thuoctinh`, `soluong`) VALUES ('$id_product','$img_product','$id_properties','$quantity_product')";
    $resultDetailProduct = mysqli_query($connect, $stringSQLDetailProduct);

    if ($resultProduct && $resultDetailProduct) {
        $_SESSION['toast-success'] = "Thêm thành công";
    } else if ($resultProduct && !$resultDetailProduct) {
        $_SESSION['toast-error'] = "Thêm chi tiết thất bại";
    } else if (!$resultProduct &&$resultDetailProduct) {
        $_SESSION['toast-error'] = "Thêm sản phẩm thất bại";
    } else {
        $_SESSION['toast-error'] = "Thêm thất bại";
    }
    header("Location: ./ProductCategory.php");
