<?php

    include "connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $product = $connect->query("SELECT * FROM products WHERE id = '$id'");
        foreach($product as $pr) {
            $price = $pr['price'];
            $img = $pr['img'];
            $title = $pr['title'];
            $sql = "INSERT INTO cart(id, title, img, price)VALUES(NULL, '$title', '$img', '$price');";
            $result = $connect->query($sql);
            if($result) {
                header("Location: /");
            }
        }
    }

?>