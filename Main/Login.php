<style>
    <?php include 'CSS/Login.css' ?>
</style>
<div>
    <div class="login-war1" >
       <div class="logo-icon">
           <div class="size-logo-icon">
               <img class="image-logo-login" src="picture/logoHH-do.png">
           </div>
           <div class="x0102"></div>
           <div class="x0101">Đăng nhập</div>
       </div>
    </div >

    <div class="bg-img-size">
            <img class="login-pic" src="picture/bg-login@2x.png"/>
        <div class="container2">
            <div class="login form">
                <header>Login</header>
                <form action="#">
                    <input type="text" placeholder="Enter your email">
                    <input type="password" placeholder="Enter your password">
                    <a href="#">Forgot password?</a>
                    <input type="button" class="button" value="Login" name="login" onclick="chuyenHuong()">
                </form>
                <div class="signup">
        <span class="signup">Không có tài khoản?
         <label onclick="chuyenHuong2()">Đăng ký</label>
        </span>
                </div>
            </div>
        </div>
    <div class="login-war3">

    </div>
</div>


<script type="text/javascript">
    function chuyenHuong() {
        window.location.href = 'index.php';
    }
    function chuyenHuong2() {
        window.location.href = 'Register.php';
    }
</script>