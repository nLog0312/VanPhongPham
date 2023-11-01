<style>
    <?php include 'CSS/Login.css' ?>
    <?php include 'CSS/cart.css' ?>
    <?php include 'CSS/Hotro.css' ?>
    <?php include 'CSS/header.css' ?>
    <?php include 'CSS/Product.css' ?>
</style>
<?php
    require_once './connect/connect.php';
    require_once './connect/funcion.php';
    $search = "";
    $stringSQL = "SELECT * FROM `sanpham` WHERE `ten_sanpham` LIKE '%$search%' ORDER BY `ngaytao` DESC";
    $result = mysqli_query($connect, $stringSQL);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<div class="sticky-top">
    <div class="navbar _header1">
        <nav class="container navbar">
            <div class="flex v-center">
                <div style="margin-top: 2px; margin-bottom: 2px">
                    <a class="text-color-white-ha hover">Hotline: 0999.999.999 </a>
                    <span class="_span-space text-color-white-ga">|</span>
                    <a class="text-color-white-ha hover">
                        Address: 123 Lĩnh Nam - Hoàng Mai - Hà Nội
                    </a>
                    <span class="_span-space text-color-white-ga">|</span>
                    <a class="text-color-white-ha">Kết nối: </a>
                    <a href="https://www.facebook.com" target="_blank" class="linked">
                        <i class="fab fa-facebook text-color-white-ha"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="linked">
                        <i class ="fab fa-instagram text-color-white-ha"></i>
                    </a>
                </div>

            </div>
            <div class="navbar__spacer">
            </div>
            <ul class="flex v-center">
                <a class="text-color-white-ha hover" style="cursor: pointer" onclick="chuyenHuong3()">
                    <span class="notification ">
                        <i class="fas fa-question-circle"></i>
                    </span>
                    Hỗ trợ
                </a>
            </ul>
            <ul class=" flex v-center">
                <a class="text-color-white-ha hover" href="#register" onclick="chuyenHuong()">Đăng ký</a>
                <span class="_span-space text-color-white-ga">|</span>
                <a class="text-color-white-ha hover" href="#login" onclick="chuyenHuong2()">Đăng nhập</a>
            </ul>
        </nav>
    </div>

</div>

<div class="login-war1" >
    <div class="logo-icon">
            <a href="index.php" class="logo-click">
                <div class="size-logo-icon">
                    <img class="image-logo-login" src="picture/logoHH-do.png">
                </div>
            </a>
        <div class="x0102"></div>
        <div class="x0101">Giỏ hàng</div>
    </div>
</div >
<div class="body-giohang">
    <div class="container3">
        <div class="header-thaotac">
           <div class="P-sanpham">Sản phẩm</div>
            <div class="P-dongia">Đơn giá</div>
            <div class="P-dongia">Số lượng</div>
            <div class="P-dongia">Số tiền</div>
            <div class="P-dongia">Thao tác</div>
        </div>
        <?php  foreach ($result as $index => $each) { ?>
        <div class="EOP">
            <div class="AOVV">
                <div class="AOV">
                    <div>
                        <div class="in-label">
                            <input type="checkbox" id="myCheckbox">
                            <label for="myCheckbox"></label>
                        </div>
                    </div>
                    <div class="BOV">
                        <div class="BOV">
                            <div style="width: 100px; height: 100px;   display: block; overflow: hidden;">
                                <img src="
                            <?php
                                if (str_contains($each['anh_sanpham'], 'https')){
                                    echo $each['anh_sanpham'];
                                }
                                else {
                                    echo "../Admin/" . $each['anh_sanpham'];
                                }
                                ?>" style="width: 100%; height: 100%">
                            </div>
                            <div class="ten-giohang">
                                <div class="max-text-giohang">
                                    <?php echo $each['ten_sanpham'];?>
                                </div>
                            </div>
                        </div>
                        <div class="BOV phanloai">
                            Phân loại hàng
                        </div>
                        <div class="BOV dongia">
                            <?php echo product_price($each['gia_sanpham']);?>
                        </div>
                        <div class="BOV soluong">
                            <div class="x0100">
                                <button class="button-subtr" onclick="decreaseQuantity()">-</button>
                                <input class="input-quantity" id="quantityInput" value="1">
                                <button class="button-subtr" onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                        <div class="BOV sotien">
                           100.000 VND
                        </div>
                        <div class="BOV thaotac">
                                <i class="fa-solid fa-trash-can delete-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>

        <div class="sticky-top-giohang">
            <div class="flex FOP">
                    <div class="in-label">
                         <input type="checkbox" id="myCheckbox_final">
                         <label for="myCheckbox_final"></label>
                    </div>
                   <div class="text-choose">
                      Chọn tất cả
                   </div>
                <div class="text-delete">
                     Xoá tất cả
                </div>
                <div style="flex: 1"></div>
                        <div style="margin-right: 15px">
                            Tổng thanh toán:
                        </div>
                        <div class="text-thanhtoan">
                            100.000 VND
                        </div>
                <div>
                    <button class="btn-muahang">Mua hàng</button>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    <?php include 'script_giohang.js' ?>
</script>
<?php
include('Footer.php');
?>