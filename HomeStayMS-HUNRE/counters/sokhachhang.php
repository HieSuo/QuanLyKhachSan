<?php
    include "./database.php";
    $sql = "SELECT * FROM  khachhang";
    $query = $connection->query($sql);
    echo "$query->num_rows";
?>