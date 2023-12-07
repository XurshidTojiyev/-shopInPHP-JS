<?php

    include "connect.php";
    $products = array();
    $result = $connect->query("SELECT * FROM products");
    foreach($result as $product) {
        array_push($products, $product);
    }
    echo json_encode($products);
?>