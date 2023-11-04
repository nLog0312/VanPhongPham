<?php
    session_start();
    require_once './connect/connect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $sql = "SELECT * FROM customers WHERE email = '$email' OR phone = '$email'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['toast-error'] = "Email hoặc số điện thoại đã tồn tại!";
    } else {
        if ($password != $repassword) {
            $_SESSION['toast-error'] = "Mật khẩu không khớp!";
        } else {
            $create_date = date('Y-m-d H:i:s');
            if (str_contains($email, '@')) {
                $username = substr($email, 0, strpos($email, '@'));
                $sql = "INSERT INTO `customers` (`email`, `password`, `name`, `createdDate`) VALUES ('$email','$password','$username','$create_date')";
            } else {
                $sql = "INSERT INTO `customers` (`phone`, `password`, `name`, `createdDate`) VALUES ('$email','$password','$email','$create_date')";
            }
            if (mysqli_query($connect, $sql)) {
                $_SESSION['toast-success'] = "Đăng ký thành công";
                header("Location: ./Login.php");
            } else {
                $_SESSION['toast-error'] = "Đăng ký thất bại";
                header("Location: ./Register.php");
            }
        }
    }
