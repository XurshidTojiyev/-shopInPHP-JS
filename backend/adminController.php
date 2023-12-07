<?php

    include "connect.php";

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $result = $connect->query("INSERT INTO products(id, title, img, price)VALUES(NULL, '$title', '$img', '$price')");
        if($result) {
            header("Location: /");
        }
    }


?>