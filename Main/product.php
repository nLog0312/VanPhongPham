<?php
    include('header.php');
?>
<?php
    require_once './connect/connect.php';
    require_once './connect/funcion.php';
    $search = "";
    $id = $_GET['id'];
    $stringSQL = "SELECT * FROM `sanpham` WHERE `ma_sanpham` = '$id'";
    $result = mysqli_query($connect, $stringSQL);
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

                    alt="..." " class="product-image"/>

                </div>
            <div class="list-pic-product">
                <div class="list-pic">
                    <img src="picture/1_1.jpg" class="list-product-image" alt="..." "/>
                    <img src="picture/1_1.jpg" class="list-product-image" alt="..." "/>
                    <img src="picture/1_1.jpg" class="list-product-image" alt="..." "/>
                    <img src="picture/1_1.jpg" class="list-product-image" alt="..." "/>
                </div>
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
                    <div class="color-details">
                        <div class="header-color">Màu sắc</div>
                        <div class="x099">
                            <button class="details-button">
                                Trắng
                            </button>
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

    var addButton = document.querySelector('.add-giohang');
    var thongBao = document.querySelector('.thong-bao');
    var closeBtn = document.querySelector('.close-btn');
    var okButton = document.querySelector('.ok-btn2');
    addButton.addEventListener('click', function() {
        thongBao.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        thongBao.style.display = 'none';
    });
    okButton.addEventListener('click', function() {
        thongBao.style.display = 'none';
    });

    function chuyenHuonggiohang() {
        window.location.href = 'view_cart.php';
    }
</script>