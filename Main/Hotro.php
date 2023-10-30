<style>
    <?php include 'CSS/Login.css' ?>
    <?php include 'CSS/Hotro.css' ?>
    <?php include 'CSS/Footer.css' ?>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <div class="login-war1" >
        <div class="logo-icon">
            <a href="index.php" class="logo-click">
                <div class="size-logo-icon">
                    <img class="image-logo-login" src="picture/logoHH-do.png">
                </div>
            </a>
            <div class="x0102"></div>
            <div class="x0101">Trung tâm hỗ trợ</div>
        </div>
    </div >

    <div class="hotro-war1">
        <div class="hotro-xinchao-text">Xin chào, Hoàng Hà có thể giúp gì cho bạn?</div>
    </div>

    <div class="hotro-war2">
        <div style="margin-bottom: 30px">
            <div class="header-question-hotro">Câu hỏi thường gặp</div>
            <div class="question" onclick="chuyenhuongCSKH()">
                <div class="question-text">
                    Làm sao để liên hệ Chăm sóc khách hàng?
                </div>
            </div>
            <div class="question" onclick="chuyenhuongCSKH()">
                <div class="question-text">
                    CHÍNH SÁCH BẢO MẬT
                </div>
            </div>


            <div style="margin-bottom: 30px">

                <div class="header-question-hotro">Ý kiến đóng góp của khách hàng</div>
                <div class="from-donggop">
                    <textarea id="feedback" name="feedback" class="input-donggopykien" rows="5" cols="50"></textarea>
                </div>
                <div class="error-message" id="error-message"></div>
                <div class="success-message" id="success-message"></div>
                <div class="btn-donggop">
                    <button type="button" class="gui-y-kien" onclick="validateFeedback()">Gửi ý kiến đóng góp</button>
                </div>
                <script>
                    function validateFeedback() {
                        var feedback = document.getElementById("feedback").value;
                        var errorMessage = document.getElementById("error-message");
                        var successMessage = document.getElementById("success-message");

                        if (feedback.trim() === "") {
                            errorMessage.textContent = "Hãy nhập ý kiến của bạn trước khi gửi!";
                            errorMessage.style.display = "block";
                            successMessage.style.display = "none";
                        } else {
                            errorMessage.style.display = "none";
                            successMessage.textContent = "Cảm ơn bạn đã gửi ý kiến";
                            successMessage.style.display = "block";
                            // Đoạn code sau này có thể sử dụng để gửi dữ liệu đến máy chủ hoặc xử lý ý kiến đóng góp
                            // Ví dụ: gửiAjax(feedback);
                        }
                    }
                </script>
        <div class="footer-hotro">
            <div class="inf-footer-hotro">
                <div class="inf-title-footer">
                    <div style="text-align: center;">
                        Bạn muốn tìm thêm thông tin gì không?
                    </div>
                </div>
                <div class="inf-address">
                    <div class="lienhe-hotline">
                        <div class="sdt">
                            <i class="fa-solid fa-phone" style="margin-right: 5px"></i>
                            0999.999.999
                        </div>
                    </div>
                    <div class="lienhe-gmail">
                        <div class="sdt">
                            <i class="fa-solid fa-envelope" style="margin-right: 5px"></i>
                            HoanghaStationery@gmail.com
                        </div>
                    </div>
                    <div class="lienhe-diachi">
                        <div class="sdt">
                            <i class="fa-solid fa-location-dot" style="margin-right: 5px"></i>
                            123 Lĩnh Nam - Hoàng Mai - Hà Nội
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function chuyenhuongCSKH() {
        window.location.href = 'lienheCSKH.php';
    }
</script>