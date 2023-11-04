<style>
    <?php include 'CSS/header.css' ?>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<title>Hoàng Hà Stationery</title>
<div class="sticky-top">
    <div class="navbar navbar-expand-sm _header1">
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
            <div class="navbar__spacer"></div>

            <ul class="flex v-center me-4" style="margin-bottom: 0;">
                <a class="text-color-white-ha hover" style="cursor: pointer" onclick="chuyenHuong3()">
                    <span class="notification ">
                        <i class="fas fa-question-circle"></i>
                    </span>
                    Hỗ trợ
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
                        <li><a class="dropdown-item" href="#">Trang Admin</a></li>
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

    <div class="navbar navbar-expand-sm _header2">
    <div class="container-fluid">
            <div class="_container-center">
                <div class="_search-img">
                    <a href="index.php">
                        <img class="logo" src="picture/logoHH.png" alt="Logo"/>
                    </a>
                </div>
                <div class="in-thanh-sp">
                        <div class="thanh_sp_header">
                                <input type="text" class="input-search" placeholder="Nhập tìm kiếm...">
                                <div class="khung-button">
                                    <button class="button-search">
                                        <i class="fa fa-search text-color-white-ha"></i>
                                    </button>
                                </div>
                        </div>

                        <div class="link_sp_header">
                            <a class="_search-text hover" href="index.php">Giấy A4</a>
                            <a class="_search-text hover" href="index.php">Kẹp sách</a>
                            <a class="_search-text hover" href="index.php">Bút các loại</a>
                            <a class="_search-text hover" href="index.php">Mực</a>
                            <a class="_search-text hover" href="index.php">Ghim</a>
                            <a class="_search-text hover" href="index.php">Máy tính</a>
                            <a class="_search-text hover" href="index.php">Ghế</a>
                            <a class="_search-text hover" href="index.php">Bàn</a>
                            <a class="_search-text hover" href="index.php">Giá sách</a>
                            <a class="_search-text hover" href="index.php">Túi vải</a>
                            <a class="_search-text hover" href="index.php">Cặp</a>
                        </div>

                </div>
                <div class="_btn-gioHang">
                    <a href="#" class="cart-icon text-color-white _gioHang hover" onclick="chuyenHuong4()">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    </nav>
</div>
<script type="text/javascript">
    function chuyenHuong2() {
        window.location.href = 'Login.php';
    }
    function chuyenHuong() {
        window.location.href = 'Register.php';
    }
    function chuyenHuong3() {
        window.location.href = 'Hotro.php';
    }
    function chuyenHuong4() {
        window.location.href = 'view_cart.php';
    }
</script>
