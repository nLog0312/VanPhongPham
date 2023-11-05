<?php
    include('header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<?php
    require_once './connect/connect.php';
    require_once './connect/funcion.php';
    $search = "";
    $id = $_GET['id'];
    $stringSQL = "SELECT * FROM `sanpham` WHERE `ma_sanpham` = '$id'";
    $result = mysqli_query($connect, $stringSQL);

    $stringSQL = "SELECT * FROM `chitiet_sanpham` WHERE `ma_sanpham` = '$id'";
    $resultDetail = mysqli_query($connect, $stringSQL);

    // get thuộc tính
    $stringSQL = "SELECT * FROM `thuoctinh`";
    $resultProperty = mysqli_query($connect, $stringSQL);


    $lstIDPropertyParent = array();
    $lstIDPropertyChild = array();
    // lấy ra danh sách các thuộc tính mà sản phẩm có
    foreach ($resultDetail as $index => $each) {
        foreach($resultProperty as $item) {
            if ($each['ma_thuoctinh'] == $item['ma_thuoctinh']) {
                array_push($lstIDPropertyChild, $item);
            }
        }
    }
    // lấy ra danh sách các thuộc tính cha
    $maTTParent = "";
    foreach ($lstIDPropertyChild as $itemTT) {
        if ($itemTT['ten_thuoctinhcha'] != $maTTParent) {
            $maTTParent = $itemTT['ten_thuoctinhcha'];
            $strSQL = "SELECT * FROM `thuoctinh` WHERE `ma_thuoctinh` = '$maTTParent'";
            $resultTT = mysqli_query($connect, $strSQL);
            $itemTTParent = mysqli_fetch_array($resultTT);
            array_push($lstIDPropertyParent, $itemTTParent);
        }
    }
?>
<div class="center-header"></div>
<div class="body-color-product">
    <?php  foreach ($result as $index => $each) { ?>
    <div class="container-product flex">
        <div class="picture-product">
                <div class="link-product">
                    <img src="
                    <?php
                    if (str_contains($each['anh_sanpham'], 'https')){
                        echo $each['anh_sanpham'];
                    }
                    else {
                        echo "../Admin/" . $each['anh_sanpham'];
                    }
                    ?>
                    "
                    alt="..." " class="product-image"/>

                </div>
            <div class="list-pic-product">
                <button id="prev-slide" class="slide-button" style="display: none;">
                        <i class="fa-solid fa-angle-left"></i>
                </button>
                <div class="list-pic">
                    <?php foreach($resultDetail as $item) {?>
                        <img src="<?php
                            if (str_contains($item['anhs_sanpham'], 'https')){
                                echo $item['anhs_sanpham'];
                            }
                            else {
                                echo "../Admin/" . $item['anhs_sanpham'];
                            }
                        ?>" class="list-product-image" onclick="showImg(this.src)" " />
                    <?php }?>
                </div>
                <button id="next-slide" class="slide-button">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
        <div class="details-product">
            <div class="details-header">
                <div class="text-header">
                    <?php echo $each['ten_sanpham'];?>
                </div>
                <div class="details-prices">
                    <div class="text-prices">
                        <?php echo product_price($each['gia_sanpham']);?>
                    </div>
                </div>
                <div class="details-choose">
                    <?php foreach($lstIDPropertyParent as $propertyParent) {?>
                        <div class="color-details">
                            <div class="header-color"><?php echo $propertyParent['ten_thuoctinhcha'];?></div>
                            <div class="x099">
                                <?php foreach($lstIDPropertyChild as $propertyChild) {
                                    if ($propertyChild['ten_thuoctinhcha'] == $propertyParent['ma_thuoctinh']) {?>
                                        <button id="<?php echo $propertyChild['ma_thuoctinh'];?>" class="details-button" onclick="clickBtnProperty(event)">
                                            <?php echo $propertyChild['ten_thuoctinhcon'];?>
                                        </button>
                                    <?php }
                                }?>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="details-choose">
                    <div class="color-details">
                        <div class="header-color">Số lượng</div>
                        <div class="x0100">
                            <button class="button-subtr" onclick="decreaseQuantity()">-</button>
                            <input class="input-quantity" id="quantityInput" value="1">
                            <button class="button-subtr" onclick="increaseQuantity()">+</button>
                        </div>
                        <div class="message-error"></div>
                    </div>
                </div>
                <div class="details-buy">
                    <div class="color-details">
                        <div>
                            <button class="add-giohang">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Thêm Vào Giỏ Hàng</span>
                            </button>
                            <div class="thong-bao">
                                <div class="thong-bao-header">
                                    <div class="text-giohang">Giỏ hàng</div>
                                    <div class="close-btn">&times;</div>
                                </div>
                                <p style="justify-content: center; align-items: center; display: flex;">
                                    <img src="picture/checkok.png" style="width: 35px; height: 35px; margin-right: 8px;">
                                    <span>
                                        Đã thêm vào giỏ hàng!
                                    </span>
                                </p>
                                <hr style="margin: 0"/>
                                <button class="ok-btn2">OK</button>
                                <button class="ok-btn" onclick="chuyenHuonggiohang()">Vào giỏ hàng</button>
                            </div>
                            <button class="muaHang">Mua Ngay</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php }?>
</div>
<div class="center-header"></div>
<div class="body-color-product">
    <div class="container-product flex">
        <div class="head-ttsp">
            <div class="tt-sp">THÔNG TIN SẢN PHẨM</div>
        </div>

    </div>
    <?php  foreach ($result as $index => $each) { ?>
        <div class="inf-product">
        <div class="text-inf-product">
            <?php
            if ($each['mota_sanpham'] != '') {
                echo $each['mota_sanpham'];
            } else {
                echo 'Chưa có mô tả';
            }
            ?>
        </div>
    </div>
    <?php }?>
   <div class="bottom-ttsp"></div>
</div>

<?php
    include('Footer.php');
?>
<script>
    <?php include 'product.js' ?>
</script>

<style>
    <?php include 'CSS/Product.css' ?>
</style>
