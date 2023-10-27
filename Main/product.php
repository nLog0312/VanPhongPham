<?php
    include('header.php');
?>
<div class="center-header"></div>
<div class="body-color-product">
    <div class="container-product flex">
        <div class="picture-product">
                <div class="link-product">
                    <img src="picture/1_1.jpg" class="product-image"/>
                </div>
            <div class="list-pic-product">
                <div class="list-pic">
                    <img src="picture/1_1.jpg" class="list-product-image"/>
                    <img src="picture/1_1.jpg" class="list-product-image"/>
                    <img src="picture/1_1.jpg" class="list-product-image"/>
                    <img src="picture/1_1.jpg" class="list-product-image"/>
                </div>
            </div>
        </div>
        <div class="details-product">
            <div class="details-header">
               <div class="text-header">
                    Sản phẩm A4 Sản phẩm A4Sản phẩm A4Sản phẩm A4Sản phẩm A4Sản phẩm A4
               </div>
                <div class="details-prices">
                    <div class="text-prices">
                        120.000đ
                    </div>
                </div>
                <div class="details-choose">
                    <div class="color-details">
                        <div class="header-color">Màu sắc</div>
                        <div class="x099">
                            <button class="details-button">Trắng</button>
                        </div>
                    </div>
                </div>
                <div class="details-choose">
                    <div class="color-details">
                        <div class="header-color">Số lượng</div>
                        <div class="x0100">
                            <button class="button-subtr" onclick="decreaseQuantity()">-</button>
                            <input class="input-quantity" id="quantityInput" value="1">
                            <button class="button-subtr" onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                </div>
                <div class="details-buy">
                    <div class="color-details">
                        <div>
                            <button class="add-giohang">
                                <i class="fas fa-shopping-cart"></i>
                               <span>
                                   Thêm Vào Giỏ Hàng
                               </span>
                            </button>
                            <button class="muaHang">Mua Ngay</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="center-header"></div>
<div class="body-color-product">
    <div class="container-product flex">
        <div class="head-ttsp">
            <div class="tt-sp">THÔNG TIN SẢN PHẨM</div>
        </div>

    </div>
    <div class="inf-product">
        <div class="text-inf-product">
           Đây là thông tin sản phẩm
        </div>
    </div>
   <div class="bottom-ttsp"></div>
</div>

<?php
include('Footer.php');
?>


<style>
    <?php include 'CSS/Product.css' ?>
</style>
<script>
    function decreaseQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentValue = parseInt(quantityInput.value);

        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
</script>