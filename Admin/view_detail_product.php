<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết sản phẩm</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/style_main.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require_once './ShareAdmin/root/connect.php';
        require_once './ShareAdmin/root/funcion.php';
        $id = $_GET['id'];
        $stringSQL = "SELECT * FROM `sanpham` sp INNER JOIN `chitiet_sanpham` ctsp ON sp.ma_sanpham = ctsp.ma_sanpham WHERE sp.ma_sanpham = '$id'";
        $result = mysqli_query($connect, $stringSQL);
        $each = mysqli_fetch_array($result);
    ?>
    <div class="modal" id="addModal" tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <form action="ProductCategory.php" class="form-add" style="height: 100%; width: 100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-2" id="addleModalLabel">Chi tiết sản phẩm</h1>
                        <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body" style="overflow-x: hidden;">
                        <label class="fs-5 form-label" for="nameProduct">Tên sản phẩm: </label>
                        <span class="ms-2 fs-3"> <?php echo $each['ten_sanpham'] ?></span>
                        <br>

                        <label class="fs-5 form-label" for="imgProduct">Ảnh sản phẩm: </label>
                        <br>
                        <div class="image-product">
                            <div class="row row-cols-4 overflow-auto" style="max-width: 35%; max-height: 20rem;">
                                <?php
                                    $lstImg = explode(',', $each['anh_sanpham']);
                                    foreach ($lstImg as $index => $eachImg) {
                                        echo "
                                            <div class='col'>
                                                <img class='img-thumbnail' src='" . $eachImg . "' alt='image' style='max-width: 100%; max-height: 100%;'>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <br>

                        <label class="fs-5 form-label " for="priceProduct">Giá bán sản phẩm: </label>
                        <span class="ms-2 fs-4"> <?php echo product_price($each['gia_sanpham']) ?></span>
                        <br>

                        <div class="row">
                            <div class="col-3">
                                <label class="fs-5 form-label required" for="priceProduct">Thuộc tính sản phẩm: </label>
                                <br>
                                <?php
                                    $stringSQL = "SELECT * FROM `thuoctinh`";
                                    $result = mysqli_query($connect, $stringSQL);
                                    $each = mysqli_fetch_array($result);
                                    $lstProperties = explode(',', $each['ma_thuoctinh']);
                                    die(var_dump($lstProperties));
                                    foreach ($lstProperties as $index => $eachProperties) {
                                        $thuoctinh = array_search($eachProperties, $lstProperties);
                                        if ($thuoctinh !== false)
                                            echo "<span class='ms-2 fs-4'>" . $each['ten_thuoctinhcha'] . "</span>";
                                    }
                                ?>
                            </div>
                            <div class="col-3">
                                <label class="fs-5 form-label required" for="quantityProduct">5. Nhập số lượng nhập: </label>
                                <br>
                                <input id="quantityProduct" name="quantity_product" class="form-control form-control-lg" type="number" placeholder="Số lượng..." aria-label=".form-control-lg">
                            </div>
                        </div>
                        <br>

                        <div class="form-floating mt-2">
                            <textarea name="desc_product" class="form-control" placeholder="Mô tả sản phẩm..." id="descProduct" style="height: 100px"></textarea>
                            <label for="descProduct">Mô tả sản phẩm</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>