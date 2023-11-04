<?php
    session_start();
    require_once './connect/connect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stringSQL = "SELECT * FROM `customers` WHERE (`email` = '$email' OR `phone` = '$email') AND `password` = '$password'";
    $result = mysqli_query($connect, $stringSQL);
    if (mysqli_num_rows($result) < 1) {
        $stringSQL = "SELECT * FROM `accounts` WHERE `phone` = '$email'";
        $resultAdmin = mysqli_query($connect, $stringSQL);
        if (mysqli_num_rows($resultAdmin) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['user'] = $row;
            $_SESSION['toast-success'] = "Đăng nhập thành công";
            header("Location: ../Admin/index.php");
        } else {
            $_SESSION['toast-error'] = "Đăng nhập thất bại! Kiểm tra lại thông tin";
            header("Location: ./Login.php");
        }
    } else {
        $stringSQL = "SELECT * FROM `accounts` WHERE `phone` = '$email'";
        $resultAdmin = mysqli_query($connect, $stringSQL);
        if (mysqli_num_rows($resultAdmin) > 0) {
            $_SESSION['admin'] = true;
        }
        $row = mysqli_fetch_array($result);
        $_SESSION['user'] = $row;
        $_SESSION['toast-success'] = "Đăng nhập thành công";
        header("Location: ./index.php");
    }
