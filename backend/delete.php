<?php

    include "connect.php";
    if($_GET['id']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM cart WHERE id = '$id'";
        $result = $connect->query($sql);
        if($result) {
            header("Location: /cart");
        }
    } else {
        header("Location: /");
    }

?>