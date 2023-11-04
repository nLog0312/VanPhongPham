<?php
    session_start();
    unset($_SESSION['user']);
    // setcookie('remember', null, time() - 60*60*24*2);

    header('Location: index.php');