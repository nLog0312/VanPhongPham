<?php include('header.php'); ?>

<style>
    <?php include 'CSS/user_inf.css' ?>
    <?php include 'CSS/Login.css' ?>
</style>

<div style="background-color: #F7F7F7">
    <div class="container-user">
        <div class="flex form-inf">
            <div class="left-inf">
                <div class="name-account">
                    Xin chào: Thành
                </div>
                <div class="menu">
                    <ul style="margin: 0">
                        <li class="active" onclick="showContent('info1')">
                            <div class="dropdown-item-user">Hồ sơ</div>
                        </li>
                        <li onclick="showContent('info2')">
                            <div class="dropdown-item-user">Đổi mật khẩu</div>
                        </li>
                        <li onclick="showContent('info3')">
                            <div class="dropdown-item-user">Địa chỉ</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="detail-inf">
                <div class="X09">
                        <div class="content">
                            <div id="info1" class="hidden">
                                <div class="head-hs">Hồ Sơ Của Tôi</div>
                                <div class="head-tt">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                                <div class="gach"></div>
                                <div>
                                    <table>
                                        <tr>
                                            <td class="EMH">
                                                Email đăng nhập:
                                            </td>
                                            <td class="EMHH">
                                               thanh@gmail.com
                                                <a style="margin-left: 25px" href="#">Thay đổi</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="EMH">
                                               Số điện thoại:
                                            </td>
                                            <td class="EMHH">
                                               0999999
                                                <a style="margin-left: 25px" href="#">Thay đổi</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="EMH">
                                                Địa chỉ
                                            </td>
                                            <td class="EMHH">
                                                Địa chỉ nhà
                                                <a style="margin-left: 25px" href="#">Thay đổi</a>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div id="info2" class="hidden">
                                <div class="head-hs">Đổi mật khẩu</div>
                                <div class="head-tt">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</div>
                                <div class="gach"></div>
                                <div>
                                    <table>
                                        <tr>
                                            <td class="EMH">
                                               Mật khẩu cũ
                                            </td>
                                            <td class="EMHH">
                                                <div class="TMK1">
                                                    <div class="input-container">
                                                        <input type="password" class="MK1" id="passwordInput" placeholder="Nhập mật khẩu cũ" />
                                                        <span class="toggle-password" id="togglePassword">
                                                      <i class="fa-sharp fa-solid fa-eye-slash"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="EMH">
                                                Mật khẩu mới
                                            </td>
                                            <td class="EMHH">
                                                <div class="TMK1">
                                                    <div class="input-container">
                                                        <input type="password" class="MK1" id="passwordInput2" placeholder="Nhập mật khẩu mới" />
                                                        <span class="toggle-password" id="togglePassword2">
                                                      <i class="fa-sharp fa-solid fa-eye-slash"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <button class="btn-save-mk">Lưu</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div id="info3" class="hidden">
                                    <div class="head-hs">
                                        <div class="diachicuatoi">
                                           Địa chỉ của tôi
                                        </div>
                                        <div style="flex: 1"></div>
                                        <div>
                                            <button class="btn-themdiachi" id="add-button">+ Thêm địa chỉ mới</button>
                                        </div>
                                    </div>
                                    <div class="gach"></div>
                                    <div style="padding: 25px; border-bottom: 1px solid #e8e8e8;">
                                        <div class="add-name">
                                            <div>
                                                Nguyễn Tuấn Thành
                                            </div>
                                            <div style="flex: 1"></div>
                                            <a href="#" class="link-CN" id="update-button">Cập nhật</a>
                                            <a href="#" class="link-Del">Xoá</a>
                                        </div>
                                        <div class="add-sdt">
                                            09999999999
                                        </div>
                                        <div class="add-diachi">
                                            LN - HM - HN LN - HM - HNLN - HM - HNLN - HM - HNLN - HM - HNLN - HM - HNLN - HM - HNLN - HM - HNLN
                                        </div>
                                    </div>
                                <div class="overlay"></div>
                                <div class="add-form" style="display: none;">
                                    <div style="font-size: 20px">Thêm địa chỉ</div>
                                    <div class="flex">
                                        <div style="margin-top: 20px">
                                            <div style="font-size: 13px; color: #737373;">Họ và tên</div>
                                            <input class="input-hoten">
                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="font-size: 13px; color: #737373;">Số điện thoại</div>
                                            <input class="input-sdt">
                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="font-size: 13px; color: #737373;">Địa chỉ</div>
                                            <input class="input-dc">
                                        </div>
                                        <div style="display: flex; float:right;">
                                            <button class="btn-trolai" id="add-btn-trolai">Trở lại</button>
                                            <button class="btn-hoanthanh">Hoàn thành</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="update-form" style="display: none;">
                                    <div style="font-size: 20px">Cập nhật địa chỉ</div>
                                    <div class="flex">
                                        <div style="margin-top: 20px">
                                            <div style="font-size: 13px; color: #737373;">Họ và tên</div>
                                            <input class="input-hoten">
                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="font-size: 13px; color: #737373;">Số điện thoại</div>
                                            <input class="input-sdt">
                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="font-size: 13px; color: #737373;">Địa chỉ</div>
                                            <input class="input-dc">
                                        </div>
                                        <div style="display: flex; float:right;">
                                            <button class="btn-trolai" id="btn-trolai">Trở lại</button>
                                            <button class="btn-hoanthanh">Hoàn thành</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php include 'User_infor.js' ?>
</script>

<?php include('Footer.php'); ?>
