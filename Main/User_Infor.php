<?php
    include('header.php');
?>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
    <?php include 'CSS/user_inf.css' ?>
    <?php include 'CSS/Login.css' ?>
</style>

<?php
    include 'connect/connect.php';
    $id = isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : $_SESSION['user']['customerID'];
    $stringSQL = "SELECT * FROM `customers` WHERE `customerID`='$id'";
    $result = mysqli_query($connect, $stringSQL);
    if (mysqli_num_rows($result) < 1) {
        $stringSQL = "SELECT * FROM `accounts` WHERE `id`='$id'";
        $result = mysqli_query($connect, $stringSQL);
    }
    
    $each = mysqli_fetch_array($result);
    ?>

<div style="background-color: #F7F7F7; min-height: 30rem;">
    <div class="container-user">
        <div class="flex form-inf">
            <div class="left-inf">
                <div class="name-account">
                    Xin chào: <?php echo $each['name'];?>
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
                                                Họ và tên:
                                            </td>
                                            <td class="EMHH">
                                            <?php if (empty($each['name'])) {
                                                echo 'Không có';
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changeName">Thêm mới</a>';
                                            } else {
                                                echo $each['name'];
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changeName">Thay đổi</a>';
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                    <?php if (!isset($_SESSION['user']['role'])) {?>
                                        <tr>
                                            <td class="EMH">
                                                Email:
                                            </td>
                                            <td class="EMHH">
                                            <?php if (empty($each['email'])) {
                                                echo 'Không có';
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changeEmail">Thêm mới</a>';
                                            } else {
                                                echo $each['email'];
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changeEmail">Thay đổi</a>';
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                        <tr>
                                            <td class="EMH">
                                                Số điện thoại:
                                            </td>
                                            <td class="EMHH">
                                            <?php if (empty($each['phone'])) {
                                                echo 'Không có';
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changePhone">Thêm mới</a>';
                                            } else {
                                                echo $each['phone'];
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changePhone">Thay đổi</a>';
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="EMH">
                                                Địa chỉ
                                            </td>
                                            <td class="EMHH">
                                            <?php if (empty($each['address'])) {
                                                echo 'Không có';
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changeAddress">Thêm mới</a>';
                                            } else {
                                                echo $each['address'];
                                                echo '<a style="margin-left: 25px" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#changeAddress">Thay đổi</a>';
                                            }
                                            ?>
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

<div class="toast-container position-fixed p-3" style="top: 80px; right: 50px;">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <?php
                if (isset($_SESSION['toast-success'])) {
                    echo '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" xml:space="preserve" width="24px" height="24px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#25AE88;" cx="25" cy="25" r="25"></circle> <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points=" 38,15 22,33 12,25 "></polyline> </g></svg>';
                    echo '<strong class="ms-2 me-auto">Thông báo</strong>';
                }
                if (isset($_SESSION['toast-error'])) {
                    echo '<svg fill="#ff0000" width="24px" height="24px" viewBox="0 -8 528 528" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>fail</title><path d="M264 456Q210 456 164 429 118 402 91 356 64 310 64 256 64 202 91 156 118 110 164 83 210 56 264 56 318 56 364 83 410 110 437 156 464 202 464 256 464 310 437 356 410 402 364 429 318 456 264 456ZM264 288L328 352 360 320 296 256 360 192 328 160 264 224 200 160 168 192 232 256 168 320 200 352 264 288Z"></path></g></svg>';
                    echo '<strong class="ms-2 me-auto">Lỗi</strong>';
                }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php
                if (isset($_SESSION['toast-success'])) {
                    echo $_SESSION['toast-success'];
                    unset($_SESSION['toast-success']);
                    echo '<script>
                            var toastLive = document.getElementById("liveToast")
                            var toast = new bootstrap.Toast(toastLive)
                            toast.show()
                        </script>';
                }
                if (isset($_SESSION['toast-error'])) {
                    echo $_SESSION['toast-error'];
                    unset($_SESSION['toast-error']);
                    echo '<script>
                            var toastLive = document.getElementById("liveToast")
                            var toast = new bootstrap.Toast(toastLive)
                            toast.show()
                        </script>';
                }
            ?>
        </div>
    </div>
</div>

<!-- Modal Name -->
<div class="modal fade" id="changeName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeNameLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="process_update_name.php?id=<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : $_SESSION['user']['customerID']; ?>" method="post">
                <input type="text" name="role" hidden value="<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : null; ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo empty($each['name']) ? 'Thêm tên' : 'Thay đổi tên'?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if (!empty($each['name'])) {?>
                    <label class="fs-5 form-label">Họ tên cũ: </label>
                    <span class="ms-2 fs-4"> <?php echo $each['name']; ?></span>
                    <br>
                    <label class="fs-5 form-label">Họ tên mới: </label>
                <?php } else {?>
                    <label class="fs-5 form-label">Nhập họ tên: </label>
                <?php }?>
                    <input type="text" class="form-control" id="newName" name="newName" placeholder="<?php echo empty($each['name']) ? 'Nhập họ tên' : 'Nhập họ tên mới'?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Email -->
<?php if (isset($each['email'])) {?>
<div class="modal fade" id="changeEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeEmailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="process_update_email.php?id=<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : $_SESSION['user']['customerID']; ?>" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo empty($each['email']) ? 'Thêm email' : 'Thay đổi email'?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if (!empty($each['email'])) {?>
                    <label class="fs-5 form-label">Email cũ: </label>
                    <span class="ms-2 fs-4"> <?php echo $each['email']; ?></span>
                    <br>
                    <label class="fs-5 form-label">Email mới: </label>
                <?php } else {?>
                    <label class="fs-5 form-label">Nhập email: </label>
                <?php }?>
                    <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="<?php echo empty($each['email']) ? 'Nhập email' : 'Nhập email mới'?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<!-- Modal Phone -->
<div class="modal fade" id="changePhone" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changePhoneLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="process_update_phone.php?id=<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : $_SESSION['user']['customerID']; ?>" method="post">
                <input type="text" name="role" hidden value="<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : null; ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo empty($each['phone']) ? 'Thêm số điện thoại' : 'Thay đổi số điện thoại'?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if (!empty($each['phone'])) {?>
                    <label class="fs-5 form-label">Số điện thoại cũ: </label>
                    <span class="ms-2 fs-4"> <?php echo $each['phone']; ?></span>
                    <br>
                    <label class="fs-5 form-label">Số điện thoại mới: </label>
                <?php } else {?>
                    <label class="fs-5 form-label">Nhập số điện thoại: </label>
                <?php }?>
                    <input type="number" class="form-control" id="newPhone" name="newPhone" placeholder="<?php echo empty($each['phone']) ? 'Nhập số điện thoại' : 'Nhập số điện thoại mới'?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Address -->
<div class="modal fade" id="changeAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeAddressLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="process_update_address.php?id=<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : $_SESSION['user']['customerID']; ?>" method="post">
                <input type="text" name="role" hidden value="<?php echo isset($_SESSION['user']['role']) ? $_SESSION['user']['id'] : null; ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo empty($each['address']) ? 'Thêm địa chỉ' : 'Thay đổi địa chỉ'?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if (!empty($each['address'])) {?>
                    <label class="fs-5 form-label">Địa chỉ cũ: </label>
                    <span class="ms-2 fs-4"> <?php echo $_SESSION['user']['address']; ?></span>
                    <br>
                    <label class="fs-5 form-label">Địa chỉ mới: </label>
                <?php } else {?>
                    <label class="fs-5 form-label">Nhập địa chỉ: </label>
                <?php }?>
                    <input type="text" class="form-control" id="newAddress" name="newAddress" placeholder="<?php echo empty($each['address']) ? 'Nhập địa chỉ' : 'Nhập địa chỉ mới'?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    <?php include 'User_infor.js' ?>
</script>

<?php include('Footer.php'); ?>
