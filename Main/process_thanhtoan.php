<?php
    $productFromCart = $_POST['productFromCart'];
    $images = $_POST['images'];
    $properties = $_POST['properties'];
    $totalPrice = $_POST['totalPrice'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    echo json_encode($productFromCart);
    echo json_encode($images);
    echo json_encode($properties);
    echo json_encode($price);
    echo json_encode($quantity);