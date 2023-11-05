
<style>
    <?php include 'CSS/Register.css' ?>
</style>
<div>
    <div class="register-war1">
        <div class="logo-icon">
            <div class="size-logo-icon">
                <img class="image-logo-login" src="picture/logoHH-do.png">
            </div>
            <div class="x0104"></div>
            <div class="x0103">Đăng ký</div>
        </div>
    </div >
        <div class="bg-img-size2">
            <img class="register-pic" src="picture/bg-login@2x.png"/>
    <div class="container3">
        <div class="registration form">
            <header>Register</header>
                <form action="#">
                    <input type="text" placeholder="Enter your email">
                    <input type="password" placeholder="Create a password">
                    <input type="password" placeholder="Confirm your password">
                    <input type="button" class="button" value="Signup" onclick="chuyenHuong()">
                </form>
            <div class="signup">
                    <span class="signup">Đã có tài khoản?
                        <label onclick="chuyenHuong2()">Đăng nhập</label>
                     </span>
            </div>
        </div>
    </div>
    </div>

</div>

<script type="text/javascript">
    function chuyenHuong() {
        window.location.href = 'Login.php';
    }
    function chuyenHuong2() {
        window.location.href = 'Login.php';
    }
</script>