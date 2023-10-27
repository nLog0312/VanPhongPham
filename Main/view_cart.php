<style>
    <?php include 'CSS/Login.css' ?>
    <?php include 'CSS/cart.css' ?>
    <?php include 'CSS/Hotro.css' ?>
    <?php include 'CSS/header.css' ?>
</style>
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
            <div class="navbar__spacer"></div>

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
        <div class="main-giohang">
           <div style="height: 100px">
           </div>
        </div>

    </div>
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
</script>

<?php
include('Footer.php');
?>