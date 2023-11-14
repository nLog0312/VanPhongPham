<style>
    <?php
        session_start();
        if (!isset($_SESSION['user'])){
            header('Location: Login.php');
            die();
        }
        include 'CSS/Login.css';
        include 'CSS/cart.css';
        include 'CSS/Hotro.css';
        include 'CSS/header.css';
        include 'CSS/Product.css';
        include 'CSS/thanhToan.css';
        
        if (isset($_POST['productFromCart'])) {
            $productFromCart = $_POST['productFromCart'];
            $images = $_POST['images'];
            $properties = $_POST['properties'];
            $totalPrice = $_POST['totalPrice'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            echo json_encode($productFromCart);
            echo json_encode($images);
            echo json_encode($properties);
            echo json_encode($price);
            echo json_encode($quantity);
        } else {
            $_SESSION['toast-error'] = "Bạn chưa chọn sản phẩm nào!";
            header('Location: view_cart.php');
            die();
        }
    ?>
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
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<div class="sticky-top">
    <div class="_header1">
        <nav class="container-header">
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
                    <span>
                        <i class="fas fa-question-circle"></i>
                    </span>
                    Liên hệ
                </a>
            </ul>
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <div class="dropdown">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; cursor: pointer;">
                        <?php echo $_SESSION['user']["name"]; ?>
                    </div>
                    <ul class="dropdown-menu">
                        <?php if (isset($_SESSION['admin'])) {?>
                            <li><a class="dropdown-item" href="../Admin/index.php">Trang Admin</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                        <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
                <?php
            } else {
                ?>
                <ul class=" flex v-center" style="margin-bottom: 0;">
                    <a class="text-color-white-ha hover" href="#register" onclick="chuyenHuong()">Đăng ký</a>
                    <span class="_span-space text-color-white-ga">|</span>
                    <a class="text-color-white-ha hover" href="#login" onclick="chuyenHuong2()">Đăng nhập</a>
                </ul>
            <?php }?>
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
        <div class="x0101">Thanh toán</div>
    </div>
</div >


<div style="background-color: #F7F7F7">
    <div class="container-thanhtoan">
        <div class="diachi-thanhtoan">
            <div style="color: #cc0621; font-size: 18px;">
                <i class="fa-solid fa-location-dot"></i>
                Địa Chỉ Nhận Hàng
            </div>
            <div class="flex">
                <div class="name-thanhtoan">
                    <div> Nguyễn Tuấn Thành</div>
                    <div> 099999999999</div>
                </div>
                <div class="address-thanhtoan">
                    Lĩnh Nam - Hoàng Mai
                </div>
                <div class="btn-thanhtoan">
                    <button class="btn-thaydoi">Thay đổi</button>
                </div>
            </div>

        </div>

        <div style="padding-bottom: 25px;">
            <div class="product-thanhtoan">
                <div class="header-thaotac2">
                    <div class="P-sanpham2">Sản phẩm</div>
                    <div class="P-dongia2">Đơn giá</div>
                    <div class="P-soluong2">Số lượng</div>
                    <div class="P-thanhtien2">Thành tiền</div>
                </div>
            </div>

            <div style="background-color: white; ">
                <div style="padding-bottom: 20px; display: flex; align-items: center">
                    <div class="img-thanhtoan">
                        <img src="picture/A4pic.jpg" style="width: 100%; height: 100%">
                    </div>
                    <div class="text-sanpham-thanhtoan">
                           Giấy A4 Chuyên in ấn
                    </div>
                    <div class="loai-thanhtoan">
                        Loại: Trắng, A4
                    </div>
                    <div class="dongia-thanhtoan">
                       100.000VND
                    </div>
                    <div class="dongia-thanhtoan">
                        1
                    </div>
                    <div class="thanhtien-thanhtoan">
                        100.000VND
                    </div>

                </div>
                <div style="border-bottom: 1px dashed rgba(0,0,0,.09);"></div>
                <div class="tinh-tongtien-thanhtoan">
                    <div class="text-tt">
                      Giá vận chuyển:
                    </div>
                    <div class="text-tt-tien">
                       20.000VND
                    </div>
                </div>
                <div style="border-bottom: 1px dashed rgba(0,0,0,.09);"></div>
                <div class="tinh-tongtien-thanhtoan">
                    <div class="text-tt">
                        Tổng tiền (1 sản phẩm):
                    </div>
                    <div class="text-tt-tien">
                        120.000VND
                    </div>
                </div>
            </div>
        </div>

        <div style="padding-bottom: 25px">
            <div class="form-thanhtoan">
                <div style=" padding: 20px; color: #cc0621; font-size: 20px">Tổng thanh toán</div>
                <div style="border-bottom: 1px dashed rgba(0,0,0,.09);"></div>
                <div class="details-thanhtoan" >
                    <div class="T01">
                        <div class="line1">Tổng tiền hàng: </div>
                        <div class="line2">100.000VND </div>
                    </div>
                    <div class="T01">
                        <div class="line1">Phí vận chuyển: </div>
                        <div class="line2">20.000VND </div>
                    </div>
                    <div class="T01">
                        <div class="line1">Tổng thanh toán: </div>
                        <div class="line3">120.000VND </div>
                    </div>
                </div>
                <div style="border-bottom: 1px dashed rgba(0,0,0,.09);"></div>
                <div style="padding: 25px; display: flex">
                    <div style="color: #737373; display: flex; align-items: center; font-size: 14px">Kiểm tra lại thông tin trước khi nhấn "Đặt Hàng"</div>
                    <div style="flex: 1"></div>
                    <button class="btn-dathang" id="btn-dathang">Đặt hàng</button>
                </div>
            </div
        </div>
        <div class="overlay2"></div>
        <div class="thongbaodathang">
            <i class="fa-regular fa-circle-check size-fa"></i>
            <div class="X012">Thông báo</div>
            <div class="X013">Gửi yêu cầu mua hàng thành công!</div>
            <button class="btn-vetrangchu" onclick="chuyenHuongTT()">Về trang chủ</button>
            <button class="btn-tieptucmuahang" onclick="chuyenHuongGH()">Tiếp tục mua hàng</button>
        </div>
    </div>
</div>

<script>
    var BtnDathang = document.querySelector('.btn-dathang');
    var thongBao = document.querySelector('.thongbaodathang');
    var overlay = document.querySelector('.overlay2');
    BtnDathang.addEventListener('click', function() {
        thongBao.style.display = 'block';
        overlay.style.display = 'block';
    });

    function chuyenHuongGH() {
        window.location.href = 'view_cart.php';
    }
    function chuyenHuongTT() {
        window.location.href = 'index.php';
    }
</script>
<?php
    include('Footer.php');
?>
