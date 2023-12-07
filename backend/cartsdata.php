<?php

    include "connect.php";
    $carts = array();
    $result = $connect->query("SELECT * FROM cart");
    foreach($result as $cart) {
        array_push($carts, $cart);
    }
    echo json_encode($carts);
?>