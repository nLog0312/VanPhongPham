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

                    alt="..." " class="product-image"/>

                </div>
            <div class="list-pic-product">
                <div class="list-pic">
                    <?php foreach($resultDetail as $item) {?>
                        <img src="<?php
                            if (str_contains($item['anhs_sanpham'], 'https')){
                                echo $item['anhs_sanpham'];
                            }
                            else {
                                echo "../Admin/" . $item['anhs_sanpham'];
                            }
                        ?>" class="list-product-image" alt="..." "/>
                    <?php }?>
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


<style>
    <?php include 'CSS/Product.css' ?>
</style>
<script>
    let maxQuantity = 0;
    const errorQuantity = document.querySelector('.message-error');
    const btnByNow = document.querySelector('.muaHang');
    const quantityInput = document.getElementById("quantityInput");
    const lstBtnProperty = document.querySelectorAll('.details-button');

    function decreaseQuantity() {
        var currentValue = parseInt(quantityInput.value);

        errorQuantity.innerHTML = '';
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
    function increaseQuantity() {
        let check = false;
        lstBtnProperty.forEach(item => {
            if (item.classList.contains('active')) {
                check = true;
            }
        });
        if (!check) {
            errorQuantity.innerHTML = `<div class="alert-danger" role="alert">Vui lòng chọn thuộc tính!</div>`;
            return;
        }
        var currentValue = parseInt(quantityInput.value);
        var maxQuantity = parseInt(quantityInput.max);
        if (currentValue >= maxQuantity) {
            errorQuantity.innerHTML = `<div class="alert-danger" role="alert">Số lượng sản phẩm không đủ!</div>`;
            return;
        }
        errorQuantity.innerHTML = '';
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

    function clickBtnProperty(e) {
        lstBtnProperty.forEach(item => {
            item.classList.remove('active');
        });
        errorQuantity.innerHTML = '';
        e.target.classList.toggle('active');
        quantityInput.value = 1;
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var result = JSON.parse(this.responseText);
                if (result > 0) {
                    maxQuantity = result;
                    quantityInput.max = maxQuantity;
                    addButton.disabled = false;
                    btnByNow.disabled = false;
                } else {
                    maxQuantity = 0;
                    errorQuantity.innerHTML = `<div class="alert-danger" role="alert">Sản phẩm đã hết hàng!</div>`;
                    addButton.disabled = true;
                    btnByNow.disabled = true;
                }
            }
        };
        xhttp.open("GET", "check_quantity.php?id=" + e.target.id, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send();
    }
</script>